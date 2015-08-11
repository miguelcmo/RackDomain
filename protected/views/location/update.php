<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Location'=>array('index'),
	$model->locationName=>array('view','id'=>$model->locationId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Location', 'url'=>array('index')),
	array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'View Location', 'url'=>array('view', 'id'=>$model->locationId)),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>Update Location <?php echo $model->locationId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>