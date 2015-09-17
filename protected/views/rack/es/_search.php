<?php
/* @var $this RackController */
/* @var $model Rack */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rackId'); ?>
		<?php echo $form->textField($model,'rackId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rowId'); ?>
		<?php echo $form->textField($model,'rowId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rackPosition'); ?>
		<?php echo $form->textField($model,'rackPosition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rackName'); ?>
		<?php echo $form->textField($model,'rackName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rackFacePosition'); ?>
		<?php echo $form->textField($model,'rackFacePosition',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rackType'); ?>
		<?php echo $form->textField($model,'rackType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->