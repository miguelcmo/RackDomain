<?php
/**
 * Yii-User module
 * 
 * @author Mikhail Mangushev <mishamx@gmail.com> 
 * @link http://yii-user.googlecode.com/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version $Id: UserModule.php 105 2011-02-16 13:05:56Z mishamx $
 */

class UserModule extends CWebModule
{	
	/**
	 * @var int
	 * @desc items on page
	 */
	public $user_page_size = 10;
	
	/**
	 * @var int
	 * @desc items on page
	 */
	public $fields_page_size = 10;
	
	/**
	 * @var string
	 * @desc hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
	 */
	public $hash='md5';
	
	/**
	 * @var boolean
	 * @desc use email for activation user account
	 */
	public $sendActivationMail=true;
	
	/**
	 * @var boolean
	 * @desc allow auth for is not active user
	 */
	public $loginNotActiv=false;
	
	/**
	 * @var boolean
	 * @desc activate user on registration (only $sendActivationMail = false)
	 */
	public $activeAfterRegister=false;
	
	/**
	 * @var boolean
	 * @desc login after registration (need loginNotActiv or activeAfterRegister = true)
	 */
	public $autoLogin=true;
	
	public $registrationUrl = array("/user/registration");
	public $recoveryUrl = array("/user/recovery/recovery");
	public $loginUrl = array("/user/login");
	public $logoutUrl = array("/user/logout");
	public $profileUrl = array("/user/profile");
	public $returnUrl = array("/user/profile");
	public $returnLogoutUrl = array("/user/login");
	
	public $fieldsMessage = 'es';
	
	/**
	 * @var array
	 * @desc User model relation from other models
	 * @see http://www.yiiframework.com/doc/guide/database.arr
	 */
	public $relations = array();
	
	/**
	 * @var array
	 * @desc Profile model relation from other models
	 */
	public $profileRelations = array();
	
	/**
	 * @var boolean
	 */
	public $captcha = array('registration'=>true);
	
	/**
	 * @var boolean
	 */
	//public $cacheEnable = false;
	
	public $tableUsers = '{{users}}';
	public $tableProfiles = '{{profiles}}';
	public $tableProfileFields = '{{profiles_fields}}';
	
	static private $_user;
	static private $_admin;
	static private $_admins;
	
	/**
	 * @var array
	 * @desc Behaviors for models
	 */
	public $componentBehaviors=array();
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}
	
	public function getBehaviorsFor($componentName){
        if (isset($this->componentBehaviors[$componentName])) {
            return $this->componentBehaviors[$componentName];
        } else {
            return array();
        }
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	/**
	 * @param $str
	 * @param $params
	 * @param $dic
	 * @return string
	 */
	public static function t($str='',$params=array(),$dic='user') {
		return Yii::t("UserModule.".$dic, $str, $params);
	}
	
	/**
	 * @return hash string.
	 */
	public static function encrypting($string="") {
		$hash = Yii::app()->getModule('user')->hash;
		if ($hash=="md5")
			return md5($string);
		if ($hash=="sha1")
			return sha1($string);
		else
			return hash($hash,$string);
	}
	
	/**
	 * @param $place
	 * @return boolean 
	 */
	public static function doCaptcha($place = '') {
		if(!extension_loaded('gd'))
			return false;
		if (in_array($place, Yii::app()->getModule('user')->captcha))
			return Yii::app()->getModule('user')->captcha[$place];
		return false;
	}
	
	/**
	 * Return admin status.
	 * @return boolean
	 */
	public static function isAdmin() {
		if(Yii::app()->user->isGuest)
			return false;
		else {
			if (!isset(self::$_admin)) {
				if(self::user()->superuser)
					self::$_admin = true;
				else
					self::$_admin = false;	
			}
			return self::$_admin;
		}
	}

	/**
	 * Return admins.
	 * @return array syperusers names
	 */	
	public static function getAdmins() {
		if (!self::$_admins) {
			$admins = User::model()->active()->superuser()->findAll();
			$return_name = array();
			foreach ($admins as $admin)
				array_push($return_name,$admin->username);
			self::$_admins = $return_name;
		}
		return self::$_admins;
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
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function user($id=0) {
		if ($id) 
			return User::model()->active()->findbyPk($id);
		else {
			if(Yii::app()->user->isGuest) {
				return false;
			} else {
				if (!self::$_user)
					self::$_user = User::model()->active()->findbyPk(Yii::app()->user->id);
				return self::$_user;
			}
		}
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public function users() {
		return User;
	}
	
	/**
	 * apply a hash on the password before we store it in the database --- Added By MAC
	 */
	protected function afterValidate()
	{
		parent::afterValidate();
		if(!$this->hasErrors())
			$this->password=$this->hashPassword($this->password);
	}
	
	/**
	 * Generates the password hash.       ----- Added By MAC
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		// uses the default PHP method for hashing passwords
		// actually (22/04/2015) is bcrypt for php5.5 
		//return password_hash($password, PASSWORD_DEFAULT);
		//return md5($password);
		return CPasswordHelper::hashPassword($password);// for yii 1.1.14 or superior
	}
	
	/**
	 * Checks if the given password is correct.         ------ Added By MAC
	 * @param string the password to be validated
	 * @return boolean wheter the password is valid
	 */
	public function validatePassword($password,$hash)
	{
		//return $this->hashPassword($password)===$this->password;
		return CPasswordHelper::verifyPassword($password,$hash);// for yii 1.1.14 or superior
	}
}
