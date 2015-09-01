<?php
/* @var $this PduTypeController */
/* @var $model PduType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pduTypeId'); ?>
		<?php echo $form->textField($model,'pduTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pduTypeName'); ?>
		<?php echo $form->textField($model,'pduTypeName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pduTypeDescription'); ?>
		<?php echo $form->textField($model,'pduTypeDescription',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pduCircuits'); ?>
		<?php echo $form->textField($model,'pduCircuits'); ?>
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
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->