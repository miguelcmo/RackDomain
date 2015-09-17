<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Departamento', 'url'=>array('index')),
	array('label'=>'Administrar Departamento', 'url'=>array('admin')),
);
?>

<h1>Crear Departamento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>