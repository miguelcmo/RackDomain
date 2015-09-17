<?php

/**
 * This is the model class for table "{{attributes}}".
 *
 * The followings are the available columns in table '{{attributes}}':
 * @property integer $attributeId
 * @property integer $attributeChapterId
 * @property string $attributeName
 * @property string $attributeDescription
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 * @property string $Satus
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property AttributesChapter $attributeChapter
 * @property Platform[] $tblPlatforms
 * @property Object[] $tblObjects
 */
class Attributes extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{attributes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attributeName', 'required'),
			array('attributeChapterId, createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('attributeName, Satus, Flag', 'length', 'max'=>255),
			array('attributesDescription', 'length', 'max'=>1024),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('attributeId, attributeChapterId, attributeName, attributeDescription, createTime, createUserId, updateTime, updateUserId, Satus, Flag', 'safe', 'on'=>'search'),
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
			'attributeChapter' => array(self::BELONGS_TO, 'AttributesChapter', 'attributeChapterId'),
			'tblPlatforms' => array(self::MANY_MANY, 'Platform', '{{attributes_map}}(attributeId, platformId)'),
			'tblObjects' => array(self::MANY_MANY, 'Object', '{{attributes_value}}(attributeId, objectId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'attributeId' => Yii::t('modelstranslation', 'Attribute'),
			'attributeChapterId' => Yii::t('modelstranslation', 'Attribute Chapter'),
			'attributeName' => Yii::t('modelstranslation', 'Attribute Name'),
			'attributeDescription' => Yii::t('modelstranslation', 'Attribute Description'),
			'createTime' => Yii::t('modelstranslation', 'Create Time'),
			'createUserId' => Yii::t('modelstranslation', 'Create User'),
			'updateTime' => Yii::t('modelstranslation', 'Update Time'),
			'updateUserId' => Yii::t('modelstranslation', 'Update User'),
			'Satus' => Yii::t('modelstranslation', 'Satus'),
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

		$criteria->compare('attributeId',$this->attributeId);
		$criteria->compare('attributeChapterId',$this->attributeChapterId);
		$criteria->compare('attributeName',$this->attributeName,true);
		$criteria->compare('attributeDescription',$this->attributeDescription,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);
		$criteria->compare('Satus',$this->Satus,true);
		$criteria->compare('Flag',$this->Flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Attributes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
