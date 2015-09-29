<?php
$this->pageTitle=Yii::app()->name . Yii::t('viewst',' - Add User To Location');
$this->breadcrumbs=array(
	$model->location->locationName=>array('view','id'=>$model->location->locationId),
	Yii::t('viewst','Add User'),
);
$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Location'), 'url'=>array('view','id'=>$model->location->locationId)),
);
?>

<h1><?php echo Yii::t('viewst','Add User To '); ?><?php echo $model->location->locationName; ?></h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="successMessage">
<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<p class="note"><?php echo Yii::t('viewst','Fields with <span class="required">*</span> are required.'); ?></p>

<div class="row">
	<?php echo $form->labelEx($model,'username',array('label'=>Yii::t('viewst','Username'))); ?>
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'username',
		'source'=>$model->createUsernameList(),
		'model'=>$model,
		'attribute'=>'username',
		'options'=>array(
			'minLength'=>'2',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
	));
	?>
	<?php echo $form->error($model,'username'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'role', array('label'=>Yii::t('viewst','Role'))); ?>
	<?php echo $form->dropDownList($model,'role', Location::getUserRoleOptions()); ?>
	<?php echo $form->error($model,'role'); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('viewst','Add User'), array('class'=>'btn')); ?>
</div>

<?php $this->endWidget(); ?>
</div>

<h1><?php echo Yii::t('viewst','Active Users in this Location'); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locationUsers-grid',
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$locationUsers,
	'columns'=>array(
		array(
			'name'=>'userId',
			'value'=>'$data->user->username',
		),
		'role',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
				'delete' => array(
					'label'=>'Delete',     // text label of the button
					'url'=>'Yii::app()->createUrl("location/removeUser",array("lid"=>"$data->locationId","id"=>"$data->userId"))',
				),
			),
			//'afterDelete'=>'function(link,success,data){ if(error) $("#statusMsg").html(data); }',
		),
	),
)); ?>
