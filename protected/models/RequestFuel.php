<?php

/**
 * This is the model class for table "{{request_fuel}}".
 *
 * The followings are the available columns in table '{{request_fuel}}':
 * @property integer $requestFuelId
 * @property integer $requesterId
 * @property integer $requestLocationId
 * @property integer $onSiteContactId
 * @property integer $fuelQty
 * @property integer $fuelTypeId
 * @property string $requestFuelNotes
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property FuelType $fuelType
 * @property Location $requestLocation
 * @property Users $onSiteContact
 * @property Users $requester
 */
class RequestFuel extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{request_fuel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requesterId, requestLocationId, onSiteContactId, fuelQty, fuelTypeId', 'required'),
			array('requesterId, requestLocationId, onSiteContactId, fuelQty, fuelTypeId, createUserId, updateUserId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('requestFuelNotes', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('requestFuelId, requesterId, requestLocationId, onSiteContactId, fuelQty, fuelTypeId, requestFuelNotes, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'fuelType' => array(self::BELONGS_TO, 'FuelType', 'fuelTypeId'),
			'requestLocation' => array(self::BELONGS_TO, 'Location', 'requestLocationId'),
			'onSiteContact' => array(self::BELONGS_TO, 'User', 'onSiteContactId'),
			'requester' => array(self::BELONGS_TO, 'User', 'requesterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'requestFuelId' => Yii::t('modelstranslation', 'Request Fuel'),
			'requesterId' => Yii::t('modelstranslation', 'Requester'),
			'requestLocationId' => Yii::t('modelstranslation', 'Request Location'),
			'onSiteContactId' => Yii::t('modelstranslation', 'On Site Contact'),
			'fuelQty' => Yii::t('modelstranslation', 'Fuel Qty'),
			'fuelTypeId' => Yii::t('modelstranslation', 'Fuel Type'),
			'requestFuelNotes' => Yii::t('modelstranslation', 'Request Fuel Notes'),
			'createTime' => Yii::t('modelstranslation', 'Create Time'),
			'createUserId' => Yii::t('modelstranslation', 'Create User'),
			'updateTime' => Yii::t('modelstranslation', 'Update Time'),
			'updateUserId' => Yii::t('modelstranslation', 'Update User'),
			'Status' => Yii::t('modelstranslation', 'Status'),
			'Flag' => Yii::t('modelstranslation', 'Flag'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('requestFuelId',$this->requestFuelId);
		$criteria->compare('requesterId',$this->requesterId);
		$criteria->compare('requestLocationId',$this->requestLocationId);
		$criteria->compare('onSiteContactId',$this->onSiteContactId);
		$criteria->compare('fuelQty',$this->fuelQty);
		$criteria->compare('fuelTypeId',$this->fuelTypeId);
		$criteria->compare('requestFuelNotes',$this->requestFuelNotes,true);
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
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestFuel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
