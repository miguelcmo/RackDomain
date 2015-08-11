<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'countryId'); ?>
		<?php echo $form->textField($model,'countryId'); ?>
		<?php echo $form->error($model,'countryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countryName'); ?>
		<?php echo $form->textField($model,'countryName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'countryName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countryAbbreviation'); ?>
		<?php echo $form->textField($model,'countryAbbreviation',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'countryAbbreviation'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->