<?php
/* @var $this PduController */
/* @var $model Pdu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pdu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php Yii::t('rdt','Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pduName'); ?>
		<?php echo $form->textField($model,'pduName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pduName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pduAlias'); ?>
		<?php echo $form->textField($model,'pduAlias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pduAlias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pduDescription'); ?>
		<?php echo $form->textArea($model,'pduDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pduDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pduTypeId'); ?>
		<?php echo $form->dropDownList($model,'pduTypeId', $this->getAvailablePduTypeOptions(), array('empty'=>Yii::t('rdt','- Choose an option -'))); ?>
		<?php echo $form->error($model,'pduTypeId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('rdt','Create') : Yii::t('rdt','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->