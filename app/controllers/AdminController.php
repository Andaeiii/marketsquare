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
	}

	public function login(){
		return View::make('admin.pages.login')
				->with('page_title','Login To Your Account');
	}

	public function register(){
		return View::make('admin.pages.register')
				->with('states', State::all())
				->with('page_title','Register New Client | Company |Organization');

	}

	public function forgotPassword(){
		return View::make('admin.pages.forgot_password')
				//->with('states', States::all())
				->with('page_title','Forgotten Your Password');
	}

	public function verifyAccount(){
		return View::make('admin.pages.verify_account')
				//->with('states', States::all())
				->with('page_title','Step 2 :: Verify Account');
	}

	//handle input and register details... 
	public function process_login(){
		pr(Input::all());
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


	public function process_register(){
		
		//pr(Input::all(), true);
		//getverification code... 

		$v = Company::validate(Input::all());
		
		if($v->fails()){
			  
			  //pr($v->messages()); //return json_encode($validation->messages());
			  return Redirect::back()->withErrors($v)->withInput();

		}else{
			//go ahead and register.... //using SQL Transactions.... 
			//first do the login registration... 

			//$cdx = $this->getVerificationCode(10);

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

				});

				$config = array(
					'fullname' 	=> Input::get('fullname'),
					'email'		=> Input::get('email'),
					'code' 		=> $this->code
				);

				//send verification email first... 
				if($this->sendVerifyMail($config)){
					//redirect to page... 
					return Redirect::to('client/verify')->with('page_title','Verify Client Account');
					
				}
	

			}catch(\Illuminate\Database\QueryException  $e){
				echo $e->getMessage();
				//return Redirect::back()->with('page_title','Error Registering Client...');

			}

		}	//if statement... 

	}


	private function sendVerifyMail($config){  //$email, $code..

		//koborize it..
		//$amt = intval($t['amount'])/100;

		//create the message...
		$msg = View::make('emails.resp')
					->with('fullname', $config['fullname'])
					->with('vcode', $config['code'])
					->with('email', $config['email'])
					->render();

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'buynaijahq@gmail.com';                 // SMTP username
			$mail->Password = 'buynaija12345';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom($config['email'], $config['fullname']);
			
			//the To Addresses...
			$mail->addAddress('buynaija12345@gmail.com', 'BuyNaija :: Admin');     // Add a recipient
			$mail->addAddress('andaeiii@aol.com', 'Andaeiii Caleb'); 
			$mail->addAddress($config['fullname'], $config['email']);   
			
			//add custom mails here.....
			$mail->addCC('andaeiii@aol.com');
			//$mail->addBCC('andaeiii@facebook.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Buynaija.com :: Client Registration....';
			$mail->Body    =  $msg;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			   // echo 'Message could not be sent.</br>';
			   // echo 'Mailer Error: ' . $mail->ErrorInfo;
				return false;
			} else {
				return true;
			   //echo 'Message has been sent';
			}

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
