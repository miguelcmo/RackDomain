<?php
/* @var $this RackController */
/* @var $model Rack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rack-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('rdt','Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'rowId'); ?>
		<?php echo $form->textField($model,'rowId'); ?>
		<?php echo $form->error($model,'rowId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rackPosition'); ?>
		<?php echo $form->textField($model,'rackPosition'); ?>
		<?php echo $form->error($model,'rackPosition'); ?>
	</div>
	*/ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rackName'); ?>
		<?php echo $form->textField($model,'rackName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rackName'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'rackFacePosition'); ?>
		<?php echo $form->textField($model,'rackFacePosition',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'rackFacePosition'); ?>
	</div>
	*/ ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rackType'); ?>
		<?php echo $form->dropDownList($model,'rackType', $this->getRackTypeOptions()); ?>
		<?php echo $form->error($model,'rackType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('rdt','Create') : Yii::t('rdt','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->