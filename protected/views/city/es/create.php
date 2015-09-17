<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Ciudades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Ciudad', 'url'=>array('index')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Crear Ciudad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>