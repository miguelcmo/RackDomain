<?php

/**
 * This is the model class for table "{{rack_type}}".
 *
 * The followings are the available columns in table '{{rack_type}}':
 * @property integer $rackTypeId
 * @property string $rackTypeName
 * @property string $thumbnailPath
 * @property string $imagePath
 * @property integer $imageWidth
 * @property integer $imageHeight
 * @property integer $rulePath
 * @property integer $ruleLeft
 * @property integer $deviceTop
 * @property integer $deviceLeft
 * @property integer $rackUnits
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Status
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property Rack[] $racks
 */
class RackType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{rack_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rackTypeName', 'required'),
			array('imageWidth, imageHeight, rulePath, ruleLeft, deviceTop, deviceLeft, rackUnits, createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('rackTypeName, thumbnailPath, imagePath, Status, Flag', 'length', 'max'=>255),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rackTypeId, rackTypeName, thumbnailPath, imagePath, imageWidth, imageHeight, rulePath, ruleLeft, deviceTop, deviceLeft, rackUnits, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'racks' => array(self::HAS_MANY, 'Rack', 'rackType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rackTypeId' => Yii::t('rdt', 'Rack Type'),
			'rackTypeName' => Yii::t('rdt', 'Rack Type Name'),
			'thumbnailPath' => Yii::t('rdt', 'Thumbnail Path'),
			'imagePath' => Yii::t('rdt', 'Image Path'),
			'imageWidth' => Yii::t('rdt', 'Image Width'),
			'imageHeight' => Yii::t('rdt', 'Image Height'),
			'rulePath' => Yii::t('rdt', 'Rule Path'),
			'ruleLeft' => Yii::t('rdt', 'Rule Left'),
			'deviceTop' => Yii::t('rdt', 'Device Top'),
			'deviceLeft' => Yii::t('rdt', 'Device Left'),
			'rackUnits' => Yii::t('rdt', 'Rack Units'),
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

		$criteria->compare('rackTypeId',$this->rackTypeId);
		$criteria->compare('rackTypeName',$this->rackTypeName,true);
		$criteria->compare('thumbnailPath',$this->thumbnailPath,true);
		$criteria->compare('imagePath',$this->imagePath,true);
		$criteria->compare('imageWidth',$this->imageWidth);
		$criteria->compare('imageHeight',$this->imageHeight);
		$criteria->compare('rulePath',$this->rulePath);
		$criteria->compare('ruleLeft',$this->ruleLeft);
		$criteria->compare('deviceTop',$this->deviceTop);
		$criteria->compare('deviceLeft',$this->deviceLeft);
		$criteria->compare('rackUnits',$this->rackUnits);
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
	 * @return RackType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
