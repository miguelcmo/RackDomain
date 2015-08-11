<?php

/**
 * This is the model class for table "{{subdivision}}".
 *
 * The followings are the available columns in table '{{subdivision}}':
 * @property integer $subdivisionId
 * @property integer $divisionId
 * @property string $subdivisionName
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property Sds[] $sds
 * @property Division $division
 */
class Subdivision extends InfraActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subdivision the static model class
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
		return '{{subdivision}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('divisionId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('subdivisionName', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subdivisionId, divisionId, subdivisionName, Status, Flag', 'safe', 'on'=>'search'),
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
			'sds' => array(self::HAS_MANY, 'Sds', 'subdivisionId'),
			'division' => array(self::BELONGS_TO, 'Division', 'divisionId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subdivisionId' => 'Subdivision',
			'divisionId' => 'Division',
			'subdivisionName' => 'Subdivision Name',
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

		$criteria->compare('subdivisionId',$this->subdivisionId);
		$criteria->compare('divisionId',$this->divisionId);
		$criteria->compare('subdivisionName',$this->subdivisionName,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}