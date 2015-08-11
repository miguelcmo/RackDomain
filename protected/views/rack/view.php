<?php
/* @var $this RackController */
/* @var $model Rack */

$this->breadcrumbs=array(
	'Racks'=>array('index'),
	$model->rackId,
);

$this->menu=array(
	array('label'=>'List Rack', 'url'=>array('index')),
	array('label'=>'Create Rack', 'url'=>array('create')),
	array('label'=>'Update Rack', 'url'=>array('update', 'id'=>$model->rackId)),
	array('label'=>'Delete Rack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rackId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rack', 'url'=>array('admin')),
	array('label'=>'Create Object', 'url'=>array('/object/create', 'rid'=>$model->rackId)),
);
?>

<h1>View Rack #<?php echo $model->rackId; ?></h1>

<?php /* 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rackId',
		'rowId',
		'sortOrder',
		'rackName',
		'rackFacePosition',
		'rackType',
	),
)); */
?>

<?php echo CHtml::image('images/racks/rackModelView.png','Rack detail view'); ?>
