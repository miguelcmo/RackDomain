<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-fuel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<p><?php //echo Yii::app()->user->id; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($modelDepartment, 'departmentId'); ?>
		<?php echo $form->textField($modelDepartment, 'departmentId'); ?>
		<?php echo $form->error($modelDepartment, 'departmentId'); ?>
	</div>
	*/ ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'requestLocationId',array('label'=>'Location')); ?>
		<?php //echo $form->textField($model,'requestLocationId'); 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'requestLocationId',
				'source'=>$this->createLocationList(),
				'model'=>$model,
				'attribute'=>'requestLocationId',
				'options'=>array(
					'minlength'=>'2',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;',
					'placeholder'=>'-- Write the Location name --',
				),
			));
		?>
		<?php echo $form->error($model,'requestLocationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'onSiteContactId'); ?>
		<?php //echo $form->textField($model,'onSiteContactId');
			$this->widget('zii.widgets.jiu.CJuiAutoComplete', array(
				'name'=>'onSiteContactId',
				'source'=>$this->createUsernameList(),
				'model'=>$model,
				'attribute'=>'onSiteContactId',
				'options'=>array(
					'minlength'=>'2',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;',
					'placeholder'=>'-- Write the contact in site --',
				),
			));
		?>
		<?php echo $form->error($model,'onSiteContactId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuelQty'); ?>
		<?php echo $form->textField($model,'fuelQty',array('placeholder'=>'-- Number of gallons needed --')); ?>
		<?php echo $form->error($model,'fuelQty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuelTypeId'); ?>
		<?php echo $form->dropDownList($model,'fuelTypeId',$this->getFuelTypeOptions(),array('empty'=>'-- Select an option --')); ?>
		<?php echo $form->error($model,'fuelTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requestFuelNotes'); ?>
		<?php echo $form->textArea($model,'requestFuelNotes',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'requestFuelNotes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->