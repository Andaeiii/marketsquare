<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	private $code; 		//users codex... 

	function __construct(){
		//register ...
		$this->code = $this->getVerificationCode(10);

		//if the user is logged out... 
		if(!Auth::check()){
			//return Redirect::to('/client/login');
		}
		//exit;
	}

	public function login(){
		return View::make('admin.pages.login')
				->with('page_title','Login To Your Account');
	}

	public function register(){
		return View::make('admin.pages.register')
				->with('states', State::all())
				->with('page_title','Register Company, Product and Services');

	}

	public function forgotPassword(){
		if(isset($_SESSION['pass_reset'])){
			echo 'true true.... ';
			exit;
		}
		return View::make('admin.pages.forgot_password')
				//->with('states', States::all())
				->with('page_title','Forgotten Your Password');
	}

	public function verifyAccount(){
		return View::make('admin.pages.verify_account')
				//->with('states', States::all())
				->with('page_title','Verify Your Account');
	}

	//handle input and register details... 
	public function process_login(){
		//pr(Input::all());
		//authenticate the users... 
		$ar = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
		if (Auth::attempt($ar)){   //return Redirect::intended('dashboard');
			return Redirect::route('admin');
		}else{
			return Redirect::back()->with('msg','errorx');
		}
	}


	/*
			[_token] => vCRGAzWA8L2jcvIxakSyytTsXkHriMCxWx0xUUPP
		    [fullname] => SlydeInteractive
		    [email] => slydeinteractive@gmail.com
		    [address] => 15 wuse zone 5, Abuja 
		    [state_optn] => 1
		    [lga_optn] => 6
		    [username] => slydecity
		    [password] => slyde12345
		    [confirm_password] => slyde12345
		    [hearaboutus] => we heard about you from our associates... 
		    [tnc] => on
	*/

    public function forgotPass(){

    	$vx = Admin::validate(Input::all());

    	if($vx->fails()){

    		return Redirect::back()->withErrors($vx);

    	}else{	
    			//generate a random character... 
    			$rval = stripslashes($this->getRandChar());


    			//retrieve the user object from the company object... 
    			$details = Company::where('email', Input::get('qpass'))->first();
    			$u = User::find($details->user_id); 
    			$u->reset_pass = $rval;		//then save to the database...

    			$u->save();
    				//echo 'success, i have been saved... <br/>';
    				//echo 'click on this link to reset your password <a href="http://www.buynaija.com/client/reset_password/'. $rval .'"> [[ reset password ]] <a>';

		//pr($details, true);
    		    
    		    $config = array(
					'fullname' 	=>  $details->name,
					'email'		=> Input::get('qpass'),
					'message' 	=> 'click on this link to reset your password <a href="http://www.buynaija.com/client/reset_password/'.$rval.'"> [[ reset password ]] <a><br/>'
				);

				//send verification email first... 
				if(parent::sendVerifyMail($config)){
					//redirect to page... 
					$_SESSION['pass_reset']  = 'true';
					return Redirect::back()->with('nmsg','iztrue');					
				}
    	}

    }


    public function resetPasswordVal($v){
    	//return the view with the code...
    	return View::make('admin.pages.reset_password')
    					->with('page_title', 'Enter New Password')
    					->with('xcode', $v);
    }

    public function setPassword(){
    	pr(Input::all());
    	$usr = User::where('reset_pass', Input::get('xc'))->first();	//retrieve user object...
    	$usr->password = Hash::make(Input::get('npval'));
    	$usr->reset_pass = '';
    	$usr->save();	//save the password and then move to new route...
    	return Redirect::to('client/login');
    }


	public function process_register(){
		
		//pr(Input::all(), true);
		//getverification code... 

		$v = Company::validate(Input::all());
		
		if($v->fails()){
			  
			  //pr($v->messages()); //return json_encode($validation->messages());
			  return Redirect::back()->withErrors($v)->withInput();

		}else{

			try{
				

				DB::transaction(function(){

					//save the user first... 
					$u = new User;

					$u->username = Input::get('username');
					$u->password = Hash::make(Input::get('password'));
					//the type could either be client or admin //users..
					$u->type = 'client';

					//store code here...
					$u->code = $this->code;

					$u->save();

					//update profile.... 
					$c = new Company;
					$c->user_id = $u->id;	//get the id from the userinput... 
					$c->name = Input::get('fullname');
					$c->address = Input::get('address');
					$c->phone = Input::get('phone');
					$c->email = Input::get('email');
					$c->lga_id = Input::get('lga_optn');
					$c->verified = false;
					$c->save();

					//after registering... automatically register the person.... 
					//automatically login in the user... 
					Auth::login($u);

				});

				


			}catch(\Illuminate\Database\QueryException  $e){
				echo $e->getMessage();
				//return Redirect::back()->with('page_title','Error Registering Client...');
			}
			

			return Redirect::to('/admin');

		}	//if statement... 

	}


	public function verifyAcc(){
		$config = array(
			'fullname' 	=> Auth::user()->entity()->pluck('name'),
			'email'		=> Auth::user()->entity()->pluck('email'),
			'message' 	=> 'Your Verification Code is  ' . $this->code . '  !!!'
		);
		parent::sendVerifyMail($config);
		return Redirect::to('client/verify')->with('page_title','Verify Client Account');
	}


	//handle the ajax functions.... only export the options... 
	public function getLgas($v){
		$lgs = State::find($v)->lgas;
		$o = ''; //<select>';		
		foreach($lgs as $lg){
			$o .= '<option value="'.$lg->id.'">' . $lg->lg_name .'</option>';
		}
		echo $o; // . '</select>';
	}


	//function to retrieve verification code....	
	public function getVerificationCode($length=10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$xcode = '';

		for ($i = 1; $i <= $length; $i++) {
			$xcode .= $characters[rand(0, $charactersLength - 1)];
		}		
		//check if code exists....
		$c = User::where('code', $xcode)->count(); //firstOrFail();

		//makesure code is unique....
		if($c == 0){
			return 'BUY-0120-'.strtoupper($xcode); 	
		}else{
			//repeat process until code is unique..
			$this->getVerificationCode(10);
		}
	}



	//function to retrieve Random Code for password retrieval......	
	public function getRandChar($length=70) {
		$characters = '0123456789abcdefghijklmnopqrstu@_vwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$xc = '';

		for ($i = 1; $i <= $length; $i++) {
			$xc .= $characters[rand(0, $charactersLength - 1)];
		}		

		//check if code exists....
		$cr = User::where('reset_pass', $xc)->count(); //firstOrFail();

		//makesure code is unique....
		if($cr == 0){
			return strtolower($xc); 	//makesure code is unique....
		}else{
			$this->getRandChar();	//repeat process until code is unique..
		}	
	}



	public function verifyCode(){


		$v = Code::validate(Input::all());

		if($v->fails()){
			//pr($v->errors());
			return Redirect::back()->withErrors($v);

		}else{

			$usr = User::where('code', Input::get('vcode'))->first();

			$ct = count($usr); 

			if($ct > 0){
				//update the profie of the user...
				$p = $usr->entity()->first();
				$p->verified = 1;
				$p->save();		//update the database... 
				$p->touch();	//update the counters...	

				return Redirect::route('login_client')->with('page_title','Login To Your Account');
			}else{
				return Redirect::back()->with('msgg','Wrong Verification Code, try again...');
			}


		}
	}


	public function logout(){
		Auth::logout();
		return Redirect::route('homepage');
	}



}
