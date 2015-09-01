<?php
/* @var $this PlatformController */
/* @var $model Platform */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'platform-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vendorId'); ?>
		<?php echo $form->dropDownList($model,'vendorId', $this->getVendorOptions(), array('empty'=>'-- Select an option --')); ?>
		<?php echo $form->error($model,'vendorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapterId'); ?>
		<?php echo $form->dropDownList($model,'chapterId', $this->getChapterOptions(), array('empty'=>'-- Select an option --')); ?>
		<?php echo $form->error($model,'chapterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platformName'); ?>
		<?php echo $form->textField($model,'platformName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'platformName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platformDescription'); ?>
		<?php echo $form->textArea($model,'platformDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'platformDescription'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'platformImagePath'); ?>
		<?php echo $form->textField($model,'platformImagePath',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'platformImagePath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platformBackgroundTextColor'); ?>
		<?php echo $form->textField($model,'platformBackgroundTextColor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'platformBackgroundTextColor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platformRackUnits'); ?>
		<?php echo $form->textField($model,'platformRackUnits'); ?>
		<?php echo $form->error($model,'platformRackUnits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createTime'); ?>
		<?php echo $form->textField($model,'createTime'); ?>
		<?php echo $form->error($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createUserId'); ?>
		<?php echo $form->textField($model,'createUserId'); ?>
		<?php echo $form->error($model,'createUserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateTime'); ?>
		<?php echo $form->textField($model,'updateTime'); ?>
		<?php echo $form->error($model,'updateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateUserId'); ?>
		<?php echo $form->textField($model,'updateUserId'); ?>
		<?php echo $form->error($model,'updateUserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Flag'); ?>
		<?php echo $form->textField($model,'Flag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Flag'); ?>
	</div>
	*/ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->