<?php

/**
 * This is the model class for table "{{department}}".
 *
 * The followings are the available columns in table '{{department}}':
 * @property integer $departmentId
 * @property integer $countryId
 * @property string $departmentName
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property City[] $cities
 * @property Country $country
 */
class Department extends InfraActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Department the static model class
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
		return '{{department}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departmentId', 'required'),
			array('departmentId, countryId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('departmentName', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('departmentId, countryId, departmentName, Status, Flag', 'safe', 'on'=>'search'),
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
			'cities' => array(self::HAS_MANY, 'City', 'departmentId'),
			'country' => array(self::BELONGS_TO, 'Country', 'countryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'departmentId' => 'Department',
			'countryId' => 'Country',
			'departmentName' => 'Department Name',
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

		$criteria->compare('departmentId',$this->departmentId);
		$criteria->compare('countryId',$this->countryId);
		$criteria->compare('departmentName',$this->departmentName,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}