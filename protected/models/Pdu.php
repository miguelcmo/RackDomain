<?php

/**
 * This is the model class for table "{{pdu}}".
 *
 * The followings are the available columns in table '{{pdu}}':
 * @property integer $pduId
 * @property integer $roomId
 * @property string $pduName
 * @property string $pduAlias
 * @property string $pduDescription
 * @property integer $pduTypeId
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 *
 * The followings are the available model relations:
 * @property PduType $pduType
 * @property Room $room
 * @property Object[] $tblObjects
 */
class Pdu extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pdu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roomId, pduName, pduTypeId', 'required'),
			array('roomId, pduTypeId, createUserId, updateUserId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('pduName, pduAlias', 'length', 'max'=>255),
			array('pduDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pduId, roomId, pduName, pduAlias, pduDescription, pduTypeId, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'pduType' => array(self::BELONGS_TO, 'PduType', 'pduTypeId'),
			'room' => array(self::BELONGS_TO, 'Room', 'roomId'),
			'tblObjects' => array(self::MANY_MANY, 'Object', '{{pdu_circuits}}(pduId, objectId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pduId' => 'Pdu',
			'roomId' => 'Room',
			'pduName' => 'Pdu Name',
			'pduAlias' => 'Pdu Alias',
			'pduDescription' => 'Pdu Description',
			'pduTypeId' => 'Pdu Type',
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

		$criteria->compare('pduId',$this->pduId);
		$criteria->compare('roomId',$this->roomId);
		$criteria->compare('pduName',$this->pduName,true);
		$criteria->compare('pduAlias',$this->pduAlias,true);
		$criteria->compare('pduDescription',$this->pduDescription,true);
		$criteria->compare('pduTypeId',$this->pduTypeId);
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
	 * @return Pdu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
