<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Países'=>array('index'),
	$model->countryId=>array('view','id'=>$model->countryId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar País', 'url'=>array('index')),
	array('label'=>'Crear País', 'url'=>array('create')),
	array('label'=>'Ver País', 'url'=>array('view', 'id'=>$model->countryId)),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Actualizar País <?php echo $model->countryName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>