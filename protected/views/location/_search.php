<?php
/* @var $this LocationController */
/* @var $model Location */
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
		<?php echo $form->label($model,'cityId'); ?>
		<?php echo $form->textField($model,'cityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdivisionId'); ?>
		<?php echo $form->textField($model,'subdivisionId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationName'); ?>
		<?php echo $form->textField($model,'locationName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationAddress'); ?>
		<?php echo $form->textField($model,'locationAddress',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationNeighborhood'); ?>
		<?php echo $form->textField($model,'locationNeighborhood',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationType'); ?>
		<?php echo $form->textField($model,'locationType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationStatus'); ?>
		<?php echo $form->textField($model,'locationStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationManager'); ?>
		<?php echo $form->textField($model,'locationManager'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationOperator'); ?>
		<?php echo $form->textField($model,'locationOperator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationLongitude'); ?>
		<?php echo $form->textField($model,'locationLongitude',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationLatitude'); ?>
		<?php echo $form->textField($model,'locationLatitude',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo CHtml::submitButton(Yii::t('rdt','Search'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->