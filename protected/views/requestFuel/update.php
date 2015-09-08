<?php
/* @var $this RequestFuelController */
/* @var $model RequestFuel */

$this->breadcrumbs=array(
	'Request Fuels'=>array('index'),
	$model->requestFuelId=>array('view','id'=>$model->requestFuelId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RequestFuel', 'url'=>array('index')),
	array('label'=>'Create RequestFuel', 'url'=>array('create')),
	array('label'=>'View RequestFuel', 'url'=>array('view', 'id'=>$model->requestFuelId)),
	array('label'=>'Manage RequestFuel', 'url'=>array('admin')),
);
?>

<h1>Update RequestFuel <?php echo $model->requestFuelId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>