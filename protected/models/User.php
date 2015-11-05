<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $userId
 * @property string $userFirstName
 * @property string $userLastName
 * @property string $username
 * @property string $userEmail
 * @property string $password
 * @property integer $userType
 * @property integer $userProfile
 * @property string $lastLoginTime
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property Sds[] $sds
 * @property Sds[] $tblSds
 */
class User extends InfraActiveRecord
{
	public $password_repeat;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userFirstName, userLastName, username, userEmail, password, password_repeat', 'required'),
			array('userType, userProfile, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('userFirstName, userLastName, username, userEmail, password', 'length', 'max'=>255),
			//array('lastLoginTime, createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userId, userFirstName, userLastName, username, userEmail, password, userType, userProfile, lastLoginTime, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
			array('userEmail, username', 'unique'),
			array('userEmail', 'email'),
			array('password', 'compare'),
			array('password_repeat', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sds' => array(self::HAS_MANY, 'Sds', 'sdsManager'),
			'tblSds' => array(self::MANY_MANY, 'Sds', '{{sds_user_assignment}}(userId, sdsId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userId' => Yii::t('rdt', 'User'),
			'userFirstName' => Yii::t('rdt', 'User First Name'),
			'userLastName' => Yii::t('rdt', 'User Last Name'),
			'username' => Yii::t('rdt', 'Username'),
			'userEmail' => Yii::t('rdt', 'User Email'),
			'password' => Yii::t('rdt', 'Password'),
			'userType' => Yii::t('rdt', 'User Type'),
			'userProfile' => Yii::t('rdt', 'User Profile'),
			'lastLoginTime' => Yii::t('rdt', 'Last Login Time'),
			'createTime' => Yii::t('rdt', 'Create Time'),
			'createUserId' => Yii::t('rdt', 'Create User'),
			'updateTime' => Yii::t('rdt', 'Update Time'),
			'updateUserId' => Yii::t('rdt', 'Update User'),
			'Status' => Yii::t('rdt', 'Status'),
			'Flag' => Yii::t('rdt', 'Flag'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userId',$this->userId);
		$criteria->compare('userFirstName',$this->userFirstName,true);
		$criteria->compare('userLastName',$this->userLastName,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('userEmail',$this->userEmail,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('userType',$this->userType);
		$criteria->compare('userProfile',$this->userProfile);
		$criteria->compare('lastLoginTime',$this->lastLoginTime,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * apply a hash on the password before we store it in the database
	 */
	protected function afterValidate()
	{
		parent::afterValidate();
		if(!$this->hasErrors())
			$this->password=$this->hashPassword($this->password);
	}
	
	/**
	 * Generates the password hash.
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
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean wheter the password is valid
	 */
	public function validatePassword($password,$hash)
	{
		//return $this->hashPassword($password)===$this->password;
		return CPasswordHelper::verifyPassword($password,$hash);// for yii 1.1.14 or superior
	}
}
