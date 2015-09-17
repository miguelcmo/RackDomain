<?php

/**
 * This is the model class for table "{{rack}}".
 *
 * The followings are the available columns in table '{{rack}}':
 * @property integer $rackId
 * @property integer $rowId
 * @property integer $rackPosition
 * @property string $rackName
 * @property string $rackFacePosition
 * @property integer $rackType
 *
 * The followings are the available model relations:
 * @property RackType $rackType0
 * @property Row $row
 * @property Object[] $tblObjects
 */
class Rack extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{rack}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rowId, sortOrder, rackName', 'required'),
			array('rowId, sortOrder, rackType', 'numerical', 'integerOnly'=>true),
			array('rackName', 'length', 'max'=>255),
			array('rackFacePosition', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rackId, rowId, sortOrder, rackName, rackFacePosition, rackType', 'safe', 'on'=>'search'),
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
			'rackType0' => array(self::BELONGS_TO, 'RackType', 'rackType'),
			'row' => array(self::BELONGS_TO, 'Row', 'rowId'),
			'tblObjects' => array(self::MANY_MANY, 'Object', '{{rack_space}}(rackId, objectId)'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rackId' => Yii::t('modelstranslation', 'Rack'),
			'rowId' => Yii::t('modelstranslation', 'Row'),
			'sortOrder' => Yii::t('modelstranslation', 'Sort Order'),
			'rackName' => Yii::t('modelstranslation', 'Name'),
			'rackFacePosition' => Yii::t('modelstranslation', 'Rack Face Position'),
			'rackType' => Yii::t('modelstranslation', 'Rack Type'),
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

		$criteria->compare('rackId',$this->rackId);
		$criteria->compare('rowId',$this->rowId);
		$criteria->compare('sortOrder',$this->sortOrder);
		$criteria->compare('rackName',$this->rackName,true);
		$criteria->compare('rackFacePosition',$this->rackFacePosition,true);
		$criteria->compare('rackType',$this->rackType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
