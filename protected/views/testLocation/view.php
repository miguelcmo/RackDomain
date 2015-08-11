<?php
/* @var $this TestLocationController */
/* @var $model TestLocation */

$this->breadcrumbs=array(
	'Test Locations'=>array('index'),
	$model->locationId,
);

$this->menu=array(
	array('label'=>'List TestLocation', 'url'=>array('index')),
	array('label'=>'Create TestLocation', 'url'=>array('create')),
	array('label'=>'Update TestLocation', 'url'=>array('update', 'id'=>$model->locationId)),
	array('label'=>'Delete TestLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->locationId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestLocation', 'url'=>array('admin')),
);
?>

<h1>View TestLocation #<?php echo $model->locationId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'locationId',
		'locationName',
	),
)); ?>
