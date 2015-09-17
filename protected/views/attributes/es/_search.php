<?php
/* @var $this AttributesController */
/* @var $model Attributes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'attributeId'); ?>
		<?php echo $form->textField($model,'attributeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attributeName'); ?>
		<?php echo $form->textField($model,'attributeName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attributeDescription'); ?>
		<?php echo $form->textField($model,'attributeDescription',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->label($model,'Satus'); ?>
		<?php echo $form->textField($model,'Satus',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->