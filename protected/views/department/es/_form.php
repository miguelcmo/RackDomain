<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'department-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentId'); ?>
		<?php echo $form->textField($model,'departmentId'); ?>
		<?php echo $form->error($model,'departmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countryId'); ?>
		<?php echo $form->textField($model,'countryId'); ?>
		<?php echo $form->error($model,'countryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentName'); ?>
		<?php echo $form->textField($model,'departmentName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'departmentName'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->