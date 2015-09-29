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

	<p class="note"><?php echo Yii::t('viewst','Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$rackSpace)); ?>

	<div class="row">
		<?php echo CHtml::label('Vendor Filter', 'vendorId'); ?>
		<?php echo CHtml::dropDownList(
			'vendorId',
			'',
			$this->getVendorOptions(),
			array(
				'empty'=>Yii::t('viewst','- Choose an option -'),
				'ajax'=>array(
					'type'=>'POST',
					'url'=>$this->createUrl('platformByVendorOptions'),
					'update'=>'#Object_platformId',
				),
			)
		); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Chapter Filter', 'chapterId'); ?>
		<?php echo CHtml::dropDownList(
			'chapterId',
			'',
			$this->getChapterOptions(),
			array(
				'empty'=>Yii::t('viewst',Yii::t('viewst','- Choose an option -')),
				'ajax'=>array(
					'type'=>'POST',
					'url'=>$this->createUrl('platformByChapterOptions'),
					'update'=>'#Object_platformId',
				),
			)
		); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'platformId'); ?>
		<?php echo $form->dropDownList($model,'platformId', $this->getPlatformOptions(), array('empty'=>Yii::t('viewst','- Choose an option -'))); ?>
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
		<?php echo CHtml::label(Yii::t('viewst','Rule Order'), 'ruleOrder'); ?>
		<?php echo CHtml::dropDownList('ruleOrder','',array('0'=>Yii::t('viewst','Ascendant'),'1'=>Yii::t('viewst','Descendant'))); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($rackSpace,'initialRU'); ?>
		<?php echo $form->textField($rackSpace,'initialRU',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($rackSpace,'initialRU'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('viewst','Create') : Yii::t('viewst','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->