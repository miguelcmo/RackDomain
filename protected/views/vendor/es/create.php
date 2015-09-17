<?php
/* @var $this VendorController */
/* @var $model Vendor */

$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Vendedor', 'url'=>array('index')),
	array('label'=>'Administrar Vendedor', 'url'=>array('admin')),
);
?>

<h1>Crear Vendedor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>