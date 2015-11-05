<?php

/**
 * This is the model class for table "{{row}}".
 *
 * The followings are the available columns in table '{{row}}':
 * @property integer $rowId
 * @property integer $roomId
 * @property string $rowName
 * @property string $rowDescription
 * @property string $createTime
 * @property integer $createUserId
 * @property string $uodateTime
 * @property integer $updateUserId
 * @property integer $Status
 * @property integer $Flag
 */
class Row extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{row}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roomId, rowName', 'required'),
			array('roomId, createUserId, updateUserId, Status, Flag', 'numerical', 'integerOnly'=>true),
			array('rowName', 'length', 'max'=>255),
			array('rowDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rowId, roomId, rowName, rowDescription, createTime, createUserId, updateTime, updateUserId, Status, Flag', 'safe', 'on'=>'search'),
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
			'room' => array(self::BELONGS_TO, 'Room', 'roomId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rowId' => Yii::t('rdt', 'Row'),
			'roomId' => Yii::t('rdt', 'Room'),
			'rowName' => Yii::t('rdt', 'Row Name'),
			'rowDescription' => Yii::t('rdt', 'Row Description'),
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

		$criteria->compare('rowId',$this->rowId);
		$criteria->compare('roomId',$this->roomId);
		$criteria->compare('rowName',$this->rowName);
		$criteria->compare('rowDescription',$this->rowDescription,true);
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
	 * @return Row the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
