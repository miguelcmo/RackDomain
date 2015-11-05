<?php

/**
 * This is the model class for table "{{vendor}}".
 *
 * The followings are the available columns in table '{{vendor}}':
 * @property integer $vendorId
 * @property string $vendorName
 * @property string $vendorDescription
 * @property string $vendorSite
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Status
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property Platform[] $platforms
 */
class Vendor extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{vendor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendorName', 'required'),
			array('createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('vendorName, vendorSite, Status, Flag', 'length', 'max'=>255),
			array('vendorDescription', 'length', 'max'=>1024),
			array('vendorSite', 'url'),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vendorId, vendorName, vendorDescription, vendorSite, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'platforms' => array(self::HAS_MANY, 'Platform', 'vendorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vendorId' => Yii::t('rdt', 'Vendor'),
			'vendorName' => Yii::t('rdt', 'Vendor Name'),
			'vendorDescription' => Yii::t('rdt', 'Vendor Description'),
			'vendorSite' => Yii::t('rdt', 'Vendor Site'),
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

		$criteria->compare('vendorId',$this->vendorId);
		$criteria->compare('vendorName',$this->vendorName,true);
		$criteria->compare('vendorDescription',$this->vendorDescription,true);
		$criteria->compare('vendorSite',$this->vendorSite,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Flag',$this->Flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vendor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
