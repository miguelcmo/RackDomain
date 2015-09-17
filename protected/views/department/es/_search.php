<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'departmentId'); ?>
		<?php echo $form->textField($model,'departmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countryId'); ?>
		<?php echo $form->textField($model,'countryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'departmentName'); ?>
		<?php echo $form->textField($model,'departmentName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->