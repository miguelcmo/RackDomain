<?php
/* @var $this RowController */
/* @var $model Row */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'row-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	<!--
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	-->
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rowName'); ?>
		<?php echo $form->textField($model,'rowName'); ?>
		<?php echo $form->error($model,'rowName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rowDescription'); ?>
		<?php echo $form->textArea($model,'rowDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rowDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('rdt','Create') : Yii::t('rdt','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->