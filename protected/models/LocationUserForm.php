<?php
/**
 * LocationUserForm class.
 * LocationUserForm is the data structure for keeping
 * the form data related to adding an existing user to a location. It is used by the 'Ad-duser' action of 'LocationController'.
 */
class LocationUserForm extends CFormModel
{
	/**
	 * @var string username of the user being added to the location
	 */
	public $username;
	
	/**
	 * @var string the role to which the user will be associated within the location
	 */
	public $role; 
	
	/**
	 * @var object an instance of the Location AR model class
	 */ 
	public $location;
	
	private $_user;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated using the verify() method
	 */
	public function rules()
	{
		return array(
			// username and role are required
			array('username, role', 'required'),
			//username needs to be checked for existence 
			array('username', 'exist', 'className'=>'User'),
			array('username', 'verify'),
		);
	}

	
	/**
	 * Authenticates the existence of the user in the system.
	 * If valid, it will also make the association between the user, role and location
	 * This is the 'verify' validator as declared in rules().
	 */
	public function verify($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no other input errors are present
		{
			$user = User::model()->findByAttributes(array('username'=>$this->username));
	        if($this->location->isUserInLocation($user))
	        {
				$this->addError('username','This user has already been added to the Location.'); 
			}
			else
			{
				$this->_user = $user;
			}
		}
	}
	
	public function assign()
	{
		if($this->_user instanceof User)
		{	
	
			//assign the user, in the specified role, to the location
			$this->location->assignUser($this->_user->id, $this->role);  
			//add the association, along with the RBAC biz rule, to our RBAC hierarchy
	        $auth = Yii::app()->authManager; 
			$bizRule='return isset($params["location"]) && $params["location"]->allowCurrentUser("'.$this->role.'")';
			$auth->assign($this->role,$this->_user->id,$bizRule);
			return true;
		}
		else
		{
			$this->addError('username','Error when attempting to assign this user to the Location.'); 
			return false;
		}
		
	}
	
	/**
	 * Generates an array of usernames to use for the autocomplete
	 */
	public function createUsernameList()
	{
		$sql = "SELECT username FROM tbl_users";
		$command = Yii::app()->db->createCommand($sql);
		$rows = $command->queryAll();
		//format it for use with auto complete widget
		$usernames = array();
		foreach($rows as $row)
		{
			$usernames[]=$row['username'];
		}
		return $usernames;
		
	}
}

