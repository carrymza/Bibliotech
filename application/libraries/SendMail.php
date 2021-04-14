<?php

/**
 * Created by PhpStorm.
 * User: Lordmicro
 * Date: 16/3/2019
 * Time: 7:10 PM
 */

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class SendMail
{
	public $mail;

	public function __construct()
	{
		$this->mail = new PHPMailer(); // create a new object
	}

	/**
	 * @param $data
	 * @param bool $mail_type
	 * @return mixed
	 */
	public function send_mail($data, $isHTML = FALSE)
	{
		$this->mail->isSMTP();                                            // Set mailer to use SMTP
		$this->mail->SMTPAuth   	= true;                                   // Enable SMTP authentication
		$this->mail->SMTPSecure 	= 'tsl';                                  // Enable TLS encryption, `ssl` also accepted
		$this->mail->Host       	= 'smtp.gmail.com';                       // Specify main and backup SMTP servers (smtp-gmail: smtp.gmail.com)
		$this->mail->Port       	= 467;                                    // TCP port to connect to
		$this->mail->Username   	= 'pduasd@gmail.com';                     // SMTP username
		$this->mail->Password   	= 'jesus2313';                            // SMTP password
		$this->mail->CharSet    	= 'utf-8';
		$this->mail->SMTPOptions 	= array(
			'ssl' => array(
				'verify_peer' 		=> false,
				'verify_peer_name' 	=> false,
				'allow_self_signed' => true
			)
		);
		//Recipients
		$this->mail->setFrom('info@pduasd.com', "SchoolApp");
//		$this->mail->addReplyTo('info@example.com', 'Código de validación');
		$this->mail->addAddress($data['to'], $data['to_name']);          // Add a recipient

		// Content
		$this->mail->isHTML($isHTML);                                  // Set email format to HTML
		$this->mail->Subject = $data['title'];
		$this->mail->Body    = $data['body'];

		if($this->mail->send())
		{
			return TRUE;
		}
		else
		{
//			print_d($this->mail->ErrorInfo);
			return FAlSE;
		}
	}
}
