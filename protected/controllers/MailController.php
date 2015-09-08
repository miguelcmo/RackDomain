<?php

class MailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Send mail method
	 */
	public static function sendMail($email,$subject,$message) {
		$notificationEmail = Yii::app()->params['notificationEmail'];
		$senderName = Yii::app()->name.' Admin';
	    $headers = "MIME-Version: 1.0\r\nFrom: $notificationEmail\r\nReply-To: $notificationEmail\r\nContent-Type: text/html; charset=utf-8";
	    $message = wordwrap($message, 70);
	    $message = str_replace("\n.", "\n..", $message);
	    //return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
		
		
		// Yii Mailer Sample sending mail with gmail account
		$mail = new YiiMailer();
		$mail->setFrom($notificationEmail, $senderName);
		$mail->setTo($email);
		$mail->setSubject('=?UTF-8?B?'.base64_encode($subject).'?=');
		$mail->setBody($message);
		return $mail->send();
		
	}
	
}