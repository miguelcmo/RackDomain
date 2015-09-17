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

	<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'roomId'); ?>
		<?php //echo $form->textField($model,'roomId'); ?>
		<?php //echo $form->error($model,'roomId'); ?>
	</div>
	-->
	
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

	<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'createTime'); ?>
		<?php //echo $form->textField($model,'createTime'); ?>
		<?php //echo $form->error($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'createUserId'); ?>
		<?php //echo $form->textField($model,'createUserId'); ?>
		<?php //echo $form->error($model,'createUserId'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'uodateTime'); ?>
		<?php //echo $form->textField($model,'uodateTime'); ?>
		<?php //echo $form->error($model,'uodateTime'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'updateUserId'); ?>
		<?php //echo $form->textField($model,'updateUserId'); ?>
		<?php //echo $form->error($model,'updateUserId'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'Status'); ?>
		<?php //echo $form->textField($model,'Status'); ?>
		<?php //echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'Flag'); ?>
		<?php //echo $form->textField($model,'Flag'); ?>
		<?php //echo $form->error($model,'Flag'); ?>
	</div>
	-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->