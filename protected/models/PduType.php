<?php

/**
 * This is the model class for table "{{pdu_type}}".
 *
 * The followings are the available columns in table '{{pdu_type}}':
 * @property integer $pduTypeId
 * @property string $pduTypeName
 * @property string $pduTypeDescription
 * @property integer $pduCircuits
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property Pdu[] $pdus
 */
class PduType extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pdu_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pduCircuits, createUserId, updateUserId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('pduTypeName', 'length', 'max'=>255),
			array('pduTypeDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pduTypeId, pduTypeName, pduTypeDescription, pduCircuits, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'pdus' => array(self::HAS_MANY, 'Pdu', 'pduTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pduTypeId' => Yii::t('modelstranslation', 'Pdu Type'),
			'pduTypeName' => Yii::t('modelstranslation', 'Pdu Type Name'),
			'pduTypeDescription' => Yii::t('modelstranslation', 'Pdu Type Description'),
			'pduCircuits' => Yii::t('modelstranslation', 'Pdu Circuits'),
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

		$criteria->compare('pduTypeId',$this->pduTypeId);
		$criteria->compare('pduTypeName',$this->pduTypeName,true);
		$criteria->compare('pduTypeDescription',$this->pduTypeDescription,true);
		$criteria->compare('pduCircuits',$this->pduCircuits);
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
	 * @return PduType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
