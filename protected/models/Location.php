<?php

/**
 * This is the model class for table "{{location}}".
 *
 * The followings are the available columns in table '{{location}}':
 * @property integer $locationId
 * @property integer $departmentId
 * @property integer $cityId
 * @property integer $divisionId
 * @property integer $subdivisionId
 * @property string $locationName
 * @property string $locationAddress
 * @property string $locationNeighborhood
 * @property string $locationDescriptionNotes
 * @property string $locationManager
 * @property string $locationOperator
 * @property integer $locationType
 * @property integer $locationStatus
 * @property string $locationLongitude
 * @property string $locationLatitude
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property City $city
 * @property Department $department
 * @property Division $division
 * @property LocationStatus $locationStatus0
 * @property LocationType $locationType0
 * @property Subdivision $subdivision
 * @property Users[] $tblUsers
 * @property Room[] $rooms
 */
class Location extends InfraActiveRecord
{
	public $city_name;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Location the static model class
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
		return '{{location}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departmentId, cityId, divisionId, subdivisionId, locationName, locationAddress', 'required'),
			array('locationName', 'unique', 'message'=>'This Location Name already exists.'),
			array('departmentId, cityId, divisionId, subdivisionId, locationType, locationStatus, locationManager, locationOperator, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('locationName, locationAddress, locationNeighborhood, locationLongitude, locationLatitude', 'length', 'max'=>255),
			array('locationDescriptionNotes', 'length', 'max'=>1024),
			//array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('locationId, departmentId, cityId, divisionId, subdivisionId, locationName, locationAddress, locationNeighborhood, locationType, locationStatus, locationManager, locationLongitude, locationLatitude, createTime, createUserId, updateTime, updateUserId, Status, Flag, city_name', 'safe', 'on'=>'search'),
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
			'rooms' => array(self::HAS_MANY, 'Room', 'locationId'),
			'city' => array(self::BELONGS_TO, 'City', 'cityId'),
			'department' => array(self::BELONGS_TO, 'Department', 'departmentId'),
			'division' => array(self::BELONGS_TO, 'Division', 'divisionId'),
			'locationStatus0'=>array(self::BELONGS_TO, 'LocationStatus', 'locationStatus'),
			'subdivision' => array(self::BELONGS_TO, 'Subdivision', 'subdivisionId'),
			'locationType0' => array(self::BELONGS_TO, 'LocationType', 'locationType'),
			'users' => array(self::MANY_MANY, 'User', '{{location_user_assignment}}(locationId, userId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'locationId' => Yii::t('modelstranslation', 'Location'),
			'departmentId' => Yii::t('modelstranslation', 'Department'),
			'cityId' => Yii::t('modelstranslation', 'City'),
			'divisionId' => Yii::t('modelstranslation', 'Division'),
			'subdivisionId' => Yii::t('modelstranslation', 'Subdivision'),
			'locationName' => Yii::t('modelstranslation', 'Location Name'),
			'locationAddress' => Yii::t('modelstranslation', 'Location Address'),
			'locationNeighborhood' => Yii::t('modelstranslation', 'Location Neighborhood'),
			'locationType' => Yii::t('modelstranslation', 'Location Type'),
			'locationStatus' => Yii::t('modelstranslation', 'Location Status'),
			'locationManager' => Yii::t('modelstranslation', 'Location Manager'),
			'locationOperator' => Yii::t('modelstranslation', 'Location Operator'),
			'locationLongitude' => Yii::t('modelstranslation', 'Location Longitude'),
			'locationLatitude' => Yii::t('modelstranslation', 'Location Latitude'),
			'createTime' => Yii::t('modelstranslation', 'Create Time'),
			'createUserId' => Yii::t('modelstranslation', 'Create User'),
			'updateTime' => Yii::t('modelstranslation', 'Update Time'),
			'updateUserId' => Yii::t('modelstranslation', 'Update User'),
			'Status' => Yii::t('modelstranslation', 'Status'),
			'Flag' => Yii::t('modelstranslation', 'Flag'),
			'city_name' => Yii::t('modelstranslation', 'City Name'),
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
		
		$criteria->with=array('city');

		$criteria->compare('locationId',$this->locationId);
		$criteria->compare('departmentId',$this->departmentId);
		$criteria->compare('city.cityName',$this->city_name,true);
		$criteria->compare('divisionId',$this->divisionId);
		$criteria->compare('subdivisionId',$this->subdivisionId);
		$criteria->compare('locationName',$this->locationName,true);
		$criteria->compare('locationAddress',$this->locationAddress,true);
		$criteria->compare('locationNeighborhood',$this->locationNeighborhood,true);
		$criteria->compare('locationType',$this->locationType);
		$criteria->compare('locationStatus',$this->locationStatus);
		$criteria->compare('locationManager',$this->locationManager);
		$criteria->compare('locationOperator',$this->locationOperator);
		$criteria->compare('locationLongitude',$this->locationLongitude,true);
		$criteria->compare('locationLatitude',$this->locationLatitude,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);
		
		//$criteria->alias = 'tbl_location';
		//$criteria->with = array('users');
		//$criteria->join = 'INNER JOIN tbl_location_user_assignment ON tbl_location_user_assignment.locationId = tbl_location.locationId';
		//$criteria->condition = 'tbl_location_user_assignment.userId=:userId';
		//$criteria->params = array(':userId'=>Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'city_name'=>array(
						'asc'=>'city.cityName',
						'desc'=>'city.cityName DESC',
					),
					'*',
				),
			),
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchOwn($userId)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('locationId',$this->locationId);
		$criteria->compare('departmentId',$this->departmentId);
		$criteria->compare('cityId',$this->cityId);
		$criteria->compare('divisionId',$this->divisionId);
		$criteria->compare('subdivisionId',$this->subdivisionId);
		$criteria->compare('locationName',$this->locationName,true);
		$criteria->compare('locationAddress',$this->locationAddress,true);
		$criteria->compare('locationNeighborhood',$this->locationNeighborhood,true);
		$criteria->compare('locationType',$this->locationType);
		$criteria->compare('locationStatus',$this->locationStatus);
		$criteria->compare('locationManager',$this->locationManager);
		$criteria->compare('locationOperator',$this->locationOperator);
		$criteria->compare('locationLongitude',$this->locationLongitude,true);
		$criteria->compare('locationLatitude',$this->locationLatitude,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);
		
		$criteria->join = 'INNER JOIN tbl_location_user_assignment ON tbl_location_user_assignment.locationId = tbl_location.locationId';
		$criteria->alias = 'tbl_location';
		$criteria->with = 'users';
		
		$criteria->condition = 'tbl_location_user_assignment.userId=:userId';
		$criteria->params = array(':userId'=>$userId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Public method that take a role, location and user and create an association
	 */
	public function assignUser($userId, $role)
	{
		$command = Yii::app()->db->createCommand();
		$command->insert('tbl_location_user_assignment', array(
			'locationId'=>$this->locationId,
			'userId'=>$userId,
			'role'=>$role,
		));
	}
	
	/**
	 * Public method that remove the association between a role, location and user
	 */
	public function removeUser($userId)
	{
		$command = Yii::app()->db->createCommand();
		$command->delete(
			'tbl_location_user_assignment',
			'userId=:userId AND locationId=:locationId',
			array(':userId'=>$userId, ':locationId'=>$this->locationId));
	}
	
	/**
	 * Public method that determines whether or not a given user is associated with a role within the project
	 */
	public function allowCurrentUser($role)
	{
		$sql = "SELECT * FROM tbl_location_user_assignment WHERE locationId=:locationId AND userId=:userId AND role=:role";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":locationId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", Yii::app()->user->getId, PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute()==1;
	}
	
	/**
	 * Returns an array of available roles in which a user can be placed when being added to a location
	 */
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(), 'name', 'name');
	}
	
	/**
	 * Determines whether or not a user is already part of a location
	 */
	public function isUserInLocation($user)
	{
		$sql = "SELECT userId FROM tbl_location_user_assignment WHERE locationId=:locationId AND userId=:userId";
		$command = Yii::App()->db->createCommand($sql);
		$command->bindValue(":locationId", $this->locationId, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute()==1;
	}
	
	/**
	 * Determines whether or not a user is already part of a location for CheckAccess Purposes
	 */
	public function isUserOnLocation($userId, $locationId)
	{
		$sql = "SELECT userId FROM tbl_location_user_assignment WHERE locationId=:locationId AND userId=:userId";
		$command = Yii::App()->db->createCommand($sql);
		$command->bindValue(":locationId", $locationId, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		return $command->execute()==1;
	}
	
	/**
	 * Return an array of the location associated to an specific user
	 */
	public function getOwnLocation($userId)
	{
		$command = Yii::app()->db->createCommand();
		$command->select('tbl_location.*');
		$command->from('tbl_location');
		$command->join('tbl_location_user_assignment', 'tbl_location.locationId=tbl_location_user_assignment.locationId');
		$command->where('tbl_location_user_assignment.userId=:userId', array(':userId'=>$userId));
		$result=$command->queryAll();
		
		return $result;
	}
}