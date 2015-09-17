<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Plataformas'=>array('index'),
	$model->platformId=>array('view','id'=>$model->platformId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Plataforma', 'url'=>array('index')),
	array('label'=>'Crear Plataforma', 'url'=>array('create')),
	array('label'=>'Ver Plataforma', 'url'=>array('view', 'id'=>$model->platformId)),
	array('label'=>'Administrar Plataforma', 'url'=>array('admin')),
);
?>

<h1>Actualizar Plataforma <?php echo $model->platformName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>