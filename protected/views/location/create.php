<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Back To Locations', 'url'=>array('index')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>Create Location</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>