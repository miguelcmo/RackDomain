<?php
abstract class InfraActiveRecord extends CActiveRecord
{
	/**
	 * Prepares createUserId and updateUserId attributes before saving.
	 */
	protected function beforeSave()
	{
		if(null !== Yii::app()->user)
			$id=Yii::app()->user->id;
		else
			$id=1;
		
		if($this->isNewRecord)
			$this->createUserId=$id;
		
		$this->updateUserId=$id;
		
		return parent::beforeSave();
	}
	
	/**
	 * Attaches the timestamp behavior to update our create and update times
	 */
	public function behaviors()
	{
		return array(
			'CTimestampBehavior'=>array(
				'class'=>'zii.behaviors.CTimestampBehavior',
				'createAttribute'=>'createTime',
				'updateAttribute'=>'updateTime',
				'setUpdateOnCreate'=>true,
			),
		);
	}
}