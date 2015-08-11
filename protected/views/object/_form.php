<?php
/* @var $this ObjectController */
/* @var $model Object */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'object-form',
	//'htmlOptions'=>array('class'=>'objectForm'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model,$rackSpace)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'platformId'); ?>
		<?php echo $form->dropDownList($model,'platformId', $this->getPlatformOptions(), array('empty'=>'-- Select an option --')); ?>
		<?php echo $form->error($model,'platformId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objectName'); ?>
		<?php echo $form->textField($model,'objectName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'objectName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objectAlias'); ?>
		<?php echo $form->textField($model,'objectAlias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'objectAlias'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($rackSpace,'initialRU'); ?>
		<?php echo $form->textField($rackSpace,'initialRU',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($rackSpace,'initialRU'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'objectDescription'); ?>
		<?php echo $form->textField($model,'objectDescription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'objectDescription'); ?>
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