<?php

/**
 * This is the model class for table "{{attributes_chapter}}".
 *
 * The followings are the available columns in table '{{attributes_chapter}}':
 * @property integer $attributeChapterId
 * @property string $attributeChapterName
 * @property string $createTime
 * @property integer $createUserId
 * @property string $updateTime
 * @property integer $updateUserId
 *
 * The followings are the available model relations:
 * @property Attributes[] $tblAttributes
 */
class AttributesChapter extends InfraActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{attributes_chapter}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attributeChapterName', 'required'),
			array('createUserId, updateUserId', 'numerical', 'integerOnly'=>true),
			array('attributeChapterName', 'length', 'max'=>255),
			array('createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('attributeChapterId, attributeChapterName, createTime, createUserId, updateTime, updateUserId', 'safe', 'on'=>'search'),
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
			'tblAttributes' => array(self::HAS_MANY, 'Attributes', 'attributeChapterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'attributeChapterId' => Yii::t('rdt','Attribute Chapter'),
			'attributeChapterName' => Yii::t('rdt','Attribute Chapter Name'),
			'createTime' => Yii::t('rdt','Create Time'),
			'createUserId' => Yii::t('rdt','Create User'),
			'updateTime' => Yii::t('rdt','Update Time'),
			'updateUserId' => Yii::t('rdt','Update User'),
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

		$criteria->compare('attributeChapterId',$this->attributeChapterId);
		$criteria->compare('attributeChapterName',$this->attributeChapterName,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('createUserId',$this->createUserId);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('updateUserId',$this->updateUserId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttributesChapter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
