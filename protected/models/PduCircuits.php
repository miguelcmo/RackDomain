<?php

/**
 * This is the model class for table "{{pdu_circuits}}".
 *
 * The followings are the available columns in table '{{pdu_circuits}}':
 * @property integer $pduCircuitId
 * @property integer $pduId
 * @property integer $objectId
 * @property string $pduCircuitBus
 * @property integer $pduCircuitNumber
 * @property integer $pduCircuitState
 * @property integer $breakerRate
 * @property integer $breakerState
 * @property string $pduCircuitDescription
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property BreakerRate $breakerRate0
 */
class PduCircuits extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pdu_circuits}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pduId, objectId, pduCircuitBus, pduCircuitNumber, pduCircuitState, breakerRate, breakerState, pduCircuitDescription', 'required'),
			array('pduId, objectId, pduCircuitNumber, pduCircuitState, breakerRate, breakerState, createUserId, updateUserId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('pduCircuitBus', 'length', 'max'=>255),
			array('pduCircuitDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pduCircuitId, pduId, objectId, pduCircuitBus, pduCircuitNumber, pduCircuitState, breakerRate, breakerState, pduCircuitDescription, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
				'breakerRate0' => array(self::BELONGS_TO, 'BreakerRate', 'breakerRate'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pduCircuitId' => Yii::t('rdt', 'Pdu Circuit'),
			'pduId' => Yii::t('rdt', 'Pdu'),
			'objectId' => Yii::t('rdt', 'Object'),
			'pduCircuitBus' => Yii::t('rdt', 'Pdu Circuit Bus'),
			'pduCircuitNumber' => Yii::t('rdt', 'Pdu Circuit Number'),
			'pduCircuitState' => Yii::t('rdt', 'Pdu Circuit State'),
			'breakerRate' => Yii::t('rdt', 'Breaker Rate'),
			'breakerState' => Yii::t('rdt', 'Breaker State'),
			'pduCircuitDescription' => Yii::t('rdt', 'Pdu Circuit Description'),
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
		
		$criteria->compare('pduCircuitId',$this->pduCircuitId);
		$criteria->compare('pduId',$this->pduId);
		$criteria->compare('objectId',$this->objectId);
		$criteria->compare('pduCircuitBus',$this->pduCircuitBus,true);
		$criteria->compare('pduCircuitNumber',$this->pduCircuitNumber);
		$criteria->compare('pduCircuitState',$this->pduCircuitState);
		$criteria->compare('breakerRate',$this->breakerRate);
		$criteria->compare('breakerState',$this->breakerState);
		$criteria->compare('pduCircuitDescription',$this->pduCircuitDescription,true);
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
	 * @return PduCircuits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
