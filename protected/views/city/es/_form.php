<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cityId'); ?>
		<?php echo $form->textField($model,'cityId'); ?>
		<?php echo $form->error($model,'cityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentId'); ?>
		<?php echo $form->textField($model,'departmentId'); ?>
		<?php echo $form->error($model,'departmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cityName'); ?>
		<?php echo $form->textField($model,'cityName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cityName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cityLongitude'); ?>
		<?php echo $form->textField($model,'cityLongitude',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cityLongitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cityLatitude'); ?>
		<?php echo $form->textField($model,'cityLatitude',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cityLatitude'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->