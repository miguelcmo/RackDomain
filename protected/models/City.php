<?php

/**
 * This is the model class for table "{{city}}".
 *
 * The followings are the available columns in table '{{city}}':
 * @property integer $cityId
 * @property integer $departmentId
 * @property string $cityName
 * @property string $cityLongitude
 * @property string $cityLatitude
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property Sds[] $sds
 */
class City extends InfraActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
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
		return '{{city}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cityId', 'required'),
			array('cityId, departmentId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('cityName, cityLongitude, cityLatitude', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cityId, departmentId, cityName, cityLongitude, cityLatitude, Status, Flag', 'safe', 'on'=>'search'),
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
			'department' => array(self::BELONGS_TO, 'Department', 'departmentId'),
			'sds' => array(self::HAS_MANY, 'Sds', 'cityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cityId' => Yii::t('modelstranslation', 'City'),
			'departmentId' => Yii::t('modelstranslation', 'Department'),
			'cityName' => Yii::t('modelstranslation', 'City Name'),
			'cityLongitude' => Yii::t('modelstranslation', 'City Longitude'),
			'cityLatitude' => Yii::t('modelstranslation', 'City Latitude'),
			'Status' => Yii::t('modelstranslation', 'Status'),
			'Flag' => Yii::t('modelstranslation', 'Flag'),
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

		$criteria->compare('cityId',$this->cityId);
		$criteria->compare('departmentId',$this->departmentId);
		$criteria->compare('cityName',$this->cityName,true);
		$criteria->compare('cityLongitude',$this->cityLongitude,true);
		$criteria->compare('cityLatitude',$this->cityLatitude,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Flag',$this->Flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}