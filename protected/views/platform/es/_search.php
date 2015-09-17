<?php
/* @var $this PlatformController */
/* @var $model Platform */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'platformId'); ?>
		<?php echo $form->textField($model,'platformId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendorId'); ?>
		<?php echo $form->textField($model,'vendorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chapterId'); ?>
		<?php echo $form->textField($model,'chapterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platformName'); ?>
		<?php echo $form->textField($model,'platformName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platformDescription'); ?>
		<?php echo $form->textField($model,'platformDescription',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platformImagePath'); ?>
		<?php echo $form->textField($model,'platformImagePath',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platformBackgroundTextColor'); ?>
		<?php echo $form->textField($model,'platformBackgroundTextColor',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platformRackUnits'); ?>
		<?php echo $form->textField($model,'platformRackUnits'); ?>
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