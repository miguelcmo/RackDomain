<?php
/* @var $this TestLocationController */
/* @var $model TestLocation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'locationId'); ?>
		<?php echo $form->textField($model,'locationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationName'); ?>
		<?php echo $form->textField($model,'locationName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->