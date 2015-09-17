<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cityId'); ?>
		<?php echo $form->textField($model,'cityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'departmentId'); ?>
		<?php echo $form->textField($model,'departmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cityName'); ?>
		<?php echo $form->textField($model,'cityName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cityLongitude'); ?>
		<?php echo $form->textField($model,'cityLongitude',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cityLatitude'); ?>
		<?php echo $form->textField($model,'cityLatitude',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo CHtml::submitButton('Search', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->