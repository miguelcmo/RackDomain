<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->departmentId=>array('view','id'=>$model->departmentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'View Department', 'url'=>array('view', 'id'=>$model->departmentId)),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<h1>Update Department <?php echo $model->departmentId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>