<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'requestFuelId'); ?>
		<?php echo $form->textField($model,'requestFuelId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requesterId'); ?>
		<?php echo $form->textField($model,'requesterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requestLocationId'); ?>
		<?php echo $form->textField($model,'requestLocationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'onSiteContactId'); ?>
		<?php echo $form->textField($model,'onSiteContactId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuelQty'); ?>
		<?php echo $form->textField($model,'fuelQty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuelTypeId'); ?>
		<?php echo $form->textField($model,'fuelTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requestFuelNotes'); ?>
		<?php echo $form->textField($model,'requestFuelNotes',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createTime'); ?>
		<?php echo $form->textField($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createUserId'); ?>
		<?php echo $form->textField($model,'createUserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updateTime'); ?>
		<?php echo $form->textField($model,'updateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updateUserId'); ?>
		<?php echo $form->textField($model,'updateUserId'); ?>
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