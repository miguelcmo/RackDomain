<?php

/**
 * This is the model class for table "{{object}}".
 *
 * The followings are the available columns in table '{{object}}':
 * @property integer $objectId
 * @property integer $platformId
 * @property string $objectName
 * @property string $objectAlias
 * @property string $objectDescription
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Status
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property Attributes[] $tblAttributes
 * @property Platform $platform
 * @property Rack[] $tblRacks
 * @property RackSpace $rackSpace
 */
class Object extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{object}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('platformId, objectName', 'required'),
			array('platformId, createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('objectName, objectAlias, Status, Flag', 'length', 'max'=>255),
			array('objectDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('objectId, platformId, objectName, objectAlias, objectDescription, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'tblAttributes' => array(self::MANY_MANY, 'Attributes', '{{attributes_value}}(objectId, attributeId)'),
			'platform' => array(self::BELONGS_TO, 'Platform', 'platformId'),
			'tblRacks' => array(self::MANY_MANY, 'Rack', '{{rack_space}}(objectId, rackId)'),
			'rackSpace' => array(self::HAS_ONE, 'RackSpace', 'objectId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'objectId' => 'Object',
			'platformId' => 'Platform',
			'objectName' => 'Object Name',
			'objectAlias' => 'Object Alias',
			'objectDescription' => 'Object Description',
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

		$criteria->compare('objectId',$this->objectId);
		$criteria->compare('platformId',$this->platformId);
		$criteria->compare('objectName',$this->objectName,true);
		$criteria->compare('objectAlias',$this->objectAlias,true);
		$criteria->compare('objectDescription',$this->objectDescription,true);
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
	 * @return Object the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
