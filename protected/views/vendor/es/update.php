<?php
/* @var $this VendorController */
/* @var $model Vendor */

$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	$model->vendorId=>array('view','id'=>$model->vendorId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Vendedor', 'url'=>array('index')),
	array('label'=>'Crear Vendedor', 'url'=>array('create')),
	array('label'=>'Ver Vendedor', 'url'=>array('view', 'id'=>$model->vendorId)),
	array('label'=>'Administrar Vendedor', 'url'=>array('admin')),
);
?>

<h1>Actualizar Vendedor <?php echo $model->vendorName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>