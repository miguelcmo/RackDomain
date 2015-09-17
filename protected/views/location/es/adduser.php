<?php
$this->pageTitle=Yii::app()->name . ' - Agregar Usuario a Locación';
$this->breadcrumbs=array(
	$model->location->locationName=>array('view','id'=>$model->location->locationId),
	'Agregar Usuario',
);
$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('view','id'=>$model->location->locationId)),
);
?>

<h1>Agregar Usuario a <?php echo $model->location->locationName; ?></h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="successMessage">
<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

<div class="row">
	<?php echo $form->labelEx($model,'username'); ?>
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
	<?php echo $form->labelEx($model,'role'); ?>
	<?php echo $form->dropDownList($model,'role', Location::getUserRoleOptions()); ?>
	<?php echo $form->error($model,'role'); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Agregar Usuario', array('class'=>'btn')); ?>
</div>

<?php $this->endWidget(); ?>
</div>

<h1>Usuarios activos en esta Locación</h1>

<?php //var_dump($locationUsers); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locationUsers-grid',
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$locationUsers,
	//'filter'=>$model,
	'columns'=>array(
		'username',
		'role',
	),
)); ?>
