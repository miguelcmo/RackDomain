<?php
/* @var $this RackController */
/* @var $model Rack */

$this->breadcrumbs=array(
	'Racks'=>array('index'),
	$model->rackId=>array('view','id'=>$model->rackId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rack', 'url'=>array('index')),
	array('label'=>'Create Rack', 'url'=>array('create')),
	array('label'=>'View Rack', 'url'=>array('view', 'id'=>$model->rackId)),
	array('label'=>'Manage Rack', 'url'=>array('admin')),
);
?>

<h1>Update Rack <?php echo $model->rackId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>