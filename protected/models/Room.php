<?php

/**
 * This is the model class for table "{{room}}".
 *
 * The followings are the available columns in table '{{room}}':
 * @property integer $roomId
 * @property integer $locationId
 * @property string $roomName
 * @property string $roomAlias
 * @property string $roomDescription
 * @property integer $floorLocation
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property Location $location
 */
class Room extends InfraActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Room the static model class
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
		return '{{room}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roomName, roomAlias', 'required'),
			array('locationId, floorLocation, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('roomName, roomAlias, roomDescription', 'length', 'max'=>255),
			//array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('roomId, locationId, roomName, roomAlias, roomDescription, floorLocation, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'location' => array(self::BELONGS_TO, 'Location', 'locationId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'roomId' => 'Room',
			'locationId' => 'Location',
			'roomName' => 'Room Name',
			'roomAlias' => 'Room Alias',
			'roomDescription' => 'Room Description',
			'floorLocation' => 'Floor Location',
			'createTime' => 'Create Time',
			'createUserId' => 'Create User',
			'updateTime' => 'Update Time',
			'updateUserId' => 'Update User',
			'Status' => 'Status',
			'Flag' => 'Flag',
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

		$criteria->compare('roomId',$this->roomId);
		$criteria->compare('locationId',$this->locationId);
		$criteria->compare('roomName',$this->roomName,true);
		$criteria->compare('roomAlias',$this->roomAlias,true);
		$criteria->compare('roomDescription',$this->roomDescription,true);
		$criteria->compare('floorLocation',$this->floorLocation);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);
		//addes for listing the rooms associated with an only location
		$criteria->condition='locationId=:location_ID';
		$criteria->params=array(':location_ID'=>$this->locationId);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}