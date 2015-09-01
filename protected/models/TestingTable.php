<?php

/**
 * This is the model class for table "{{testing_table}}".
 *
 * The followings are the available columns in table '{{testing_table}}':
 * @property integer $testingTableId
 * @property string $testingTableName
 * @property string $testingTableAlias
 * @property string $testingTableDescriptionShort
 * @property string $testingTableDescriptionLong
 * @property string $testingForeignFieldId
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Status
 * @property string $Flag
 */
class TestingTable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{testing_table}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('testingTableName, testingTableAlias, testingForeignFieldId', 'required'),
			array('createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('testingTableName, testingTableAlias, testingForeignFieldId, Status, Flag', 'length', 'max'=>255),
			array('testingTableDescriptionShort', 'length', 'max'=>1024),
			array('testingTableDescriptionLong, createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('testingTableId, testingTableName, testingTableAlias, testingTableDescriptionShort, testingTableDescriptionLong, testingForeignFieldId, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'testingTableId' => 'Testing Table',
			'testingTableName' => 'Testing Table Name',
			'testingTableAlias' => 'Testing Table Alias',
			'testingTableDescriptionShort' => 'Testing Table Description Short',
			'testingTableDescriptionLong' => 'Testing Table Description Long',
			'testingForeignFieldId' => 'Testing Foreign Field',
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

		$criteria->compare('testingTableId',$this->testingTableId);
		$criteria->compare('testingTableName',$this->testingTableName,true);
		$criteria->compare('testingTableAlias',$this->testingTableAlias,true);
		$criteria->compare('testingTableDescriptionShort',$this->testingTableDescriptionShort,true);
		$criteria->compare('testingTableDescriptionLong',$this->testingTableDescriptionLong,true);
		$criteria->compare('testingForeignFieldId',$this->testingForeignFieldId,true);
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
	 * @return TestingTable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
