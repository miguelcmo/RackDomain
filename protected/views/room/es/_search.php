<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'roomId'); ?>
		<?php echo $form->textField($model,'roomId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationId'); ?>
		<?php echo $form->textField($model,'locationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roomName'); ?>
		<?php echo $form->textField($model,'roomName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roomAlias'); ?>
		<?php echo $form->textField($model,'roomAlias',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roomDescription'); ?>
		<?php echo $form->textField($model,'roomDescription',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'floorLocation'); ?>
		<?php echo $form->textField($model,'floorLocation'); ?>
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