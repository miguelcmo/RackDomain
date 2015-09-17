<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->departmentId,
);

$this->menu=array(
	array('label'=>'Listar Departamento', 'url'=>array('index')),
	array('label'=>'Crear Departamento', 'url'=>array('create')),
	array('label'=>'Actualizar Departamento', 'url'=>array('update', 'id'=>$model->departmentId)),
	array('label'=>'Eliminar Departamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->departmentId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Departamento', 'url'=>array('admin')),
);
?>

<h1>Ver Departamento <?php echo $model->departmentName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'departmentId',
		'countryId',
		'departmentName',
		'Status',
		'Flag',
	),
)); ?>
