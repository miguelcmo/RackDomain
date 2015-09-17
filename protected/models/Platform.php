<?php

/**
 * This is the model class for table "{{platform}}".
 *
 * The followings are the available columns in table '{{platform}}':
 * @property integer $platformId
 * @property integer $vendorId
 * @property integer $chapterId
 * @property string $platformName
 * @property string $platformDescription
 * @property string $platformImagePath
 * @property string $platformBackgroundTextColor
 * @property integer $platformRackUnits
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Status
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property Attributes[] $tblAttributes
 * @property Object[] $objects
 * @property Chapter $chapter
 * @property Vendor $vendor
 */
class Platform extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{platform}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendorId, chapterId, platformName', 'required'),
			array('vendorId, chapterId, platformRackUnits, createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('platformName, platformImagePath, platformBackgroundTextColor, Status, Flag', 'length', 'max'=>255),
			array('platformDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('platformId, vendorId, chapterId, platformName, platformDescription, platformImagePath, platformBackgroundTextColor, platformRackUnits, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'tblAttributes' => array(self::MANY_MANY, 'Attributes', '{{attributes_map}}(platformId, attributeId)'),
			'objects' => array(self::HAS_MANY, 'Object', 'platformId'),
			'chapter' => array(self::BELONGS_TO, 'Chapter', 'chapterId'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'platformId' => Yii::t('modelstranslation', 'Platform'),
			'vendorId' => Yii::t('modelstranslation', 'Vendor'),
			'chapterId' => Yii::t('modelstranslation', 'Chapter'),
			'platformName' => Yii::t('modelstranslation', 'Platform Name'),
			'platformDescription' => Yii::t('modelstranslation', 'Platform Description'),
			'platformImagePath' => Yii::t('modelstranslation', 'Platform Image Path'),
			'platformBackgroundTextColor' => Yii::t('modelstranslation', 'Platform Background Text Color'),
			'platformRackUnits' => Yii::t('modelstranslation', 'Platform Rack Units'),
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

		$criteria->compare('platformId',$this->platformId);
		$criteria->compare('vendorId',$this->vendorId);
		$criteria->compare('chapterId',$this->chapterId);
		$criteria->compare('platformName',$this->platformName,true);
		$criteria->compare('platformDescription',$this->platformDescription,true);
		$criteria->compare('platformImagePath',$this->platformImagePath,true);
		$criteria->compare('platformBackgroundTextColor',$this->platformBackgroundTextColor,true);
		$criteria->compare('platformRackUnits',$this->platformRackUnits);
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
	 * @return Platform the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
