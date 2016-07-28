<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	function __construct(){
		//echo 'sup dawg';
	}


	protected function setupLayout(){
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	public function removeFromArray($arr, $obj){
		$r = array();
	    foreach ($arr as $key => $value) {
	    	if(strval($key) != $obj){
	    		$r[$key] = $value;
	    	}
	    }
	    return $r;
	}

	public function sendVerifyMail($config){  //$email, $code..

		//koborize it..
		//$amt = intval($t['amount'])/100;

		//create the message...
		$msg = View::make('emails.resp')
					->with('fullname', $config['fullname'])
					->with('msg', $config['message'])
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
			$mail->addAddress($config['email'], $config['fullname']);   
			
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




}
