<?php
/* @var $this AttributesController */
/* @var $model Attributes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attributes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'attributeName'); ?>
		<?php echo $form->textField($model,'attributeName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'attributeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attributeDescription'); ?>
		<?php echo $form->textArea($model,'attributeDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'attributeDescription'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'createTime'); ?>
		<?php echo $form->textField($model,'createTime'); ?>
		<?php echo $form->error($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createUserId'); ?>
		<?php echo $form->textField($model,'createUserId'); ?>
		<?php echo $form->error($model,'createUserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateTime'); ?>
		<?php echo $form->textField($model,'updateTime'); ?>
		<?php echo $form->error($model,'updateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateUserId'); ?>
		<?php echo $form->textField($model,'updateUserId'); ?>
		<?php echo $form->error($model,'updateUserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Satus'); ?>
		<?php echo $form->textField($model,'Satus',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Satus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Flag'); ?>
	</div>
	*/ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->