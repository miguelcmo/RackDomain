<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->departmentId=>array('view','id'=>$model->departmentId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Departamento', 'url'=>array('index')),
	array('label'=>'Crear Departamento', 'url'=>array('create')),
	array('label'=>'Ver Departamento', 'url'=>array('view', 'id'=>$model->departmentId)),
	array('label'=>'Administrar Departamento', 'url'=>array('admin')),
);
?>

<h1>Actualizar Departamento <?php echo $model->departmentName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>