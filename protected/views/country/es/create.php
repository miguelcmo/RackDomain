<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Países'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar País', 'url'=>array('index')),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Crear País</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>