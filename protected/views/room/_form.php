<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('viewst','Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'roomName'); ?>
		<?php echo $form->textField($model,'roomName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'roomName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roomAlias'); ?>
		<?php echo $form->textField($model,'roomAlias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'roomAlias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roomDescription'); ?>
		<?php echo $form->textArea($model,'roomDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'roomDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'floorLocation'); ?>
		<?php echo $form->textField($model,'floorLocation'); ?>
		<?php echo $form->error($model,'floorLocation'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('viewst','Create') : Yii::t('viewst','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->