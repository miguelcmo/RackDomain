<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Ciudad'=>array('index'),
	$model->cityId=>array('view','id'=>$model->cityId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Ciudad', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Ver Ciudad', 'url'=>array('view', 'id'=>$model->cityId)),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Actualizar Ciudad <?php echo $model->cityId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>