<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userFirstName'); ?>
		<?php echo $form->textField($model,'userFirstName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'userFirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userLastName'); ?>
		<?php echo $form->textField($model,'userLastName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'userLastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userEmail'); ?>
		<?php echo $form->textField($model,'userEmail',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'userEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model, 'password_repeat', array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model, 'password_repeat'); ?>
	</div>

	<!--
	<div class="row">
		<?php //echo $form->labelEx($model,'userType'); ?>
		<?php //echo $form->textField($model,'userType'); ?>
		<?php //echo $form->error($model,'userType'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'userProfile'); ?>
		<?php //echo $form->textField($model,'userProfile'); ?>
		<?php //echo $form->error($model,'userProfile'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->