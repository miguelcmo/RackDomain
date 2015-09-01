<?php
/* @var $this PduTypeController */
/* @var $model PduType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pdu-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pduTypeName'); ?>
		<?php echo $form->textField($model,'pduTypeName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pduTypeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pduTypeDescription'); ?>
		<?php echo $form->textArea($model,'pduTypeDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pduTypeDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pduCircuits'); ?>
		<?php echo $form->textField($model,'pduCircuits'); ?>
		<?php echo $form->error($model,'pduCircuits'); ?>
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
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag'); ?>
		<?php echo $form->error($model,'Flag'); ?>
	</div>
	*/ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->