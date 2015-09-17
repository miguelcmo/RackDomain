<?php
/* @var $this VendorController */
/* @var $model Vendor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vendorId'); ?>
		<?php echo $form->textField($model,'vendorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendorName'); ?>
		<?php echo $form->textField($model,'vendorName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendorDescription'); ?>
		<?php echo $form->textField($model,'vendorDescription',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendorSite'); ?>
		<?php echo $form->textField($model,'vendorSite',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->textField($model,'Status',array('size'=>60,'maxlength'=>255)); ?>
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