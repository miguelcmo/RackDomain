<?php
/* @var $this VendorController */
/* @var $model Vendor */

$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	$model->vendorId,
);

$this->menu=array(
	array('label'=>'Listar Vendedor', 'url'=>array('index')),
	array('label'=>'Crear Vendedor', 'url'=>array('create')),
	array('label'=>'Actualizar Vendedor', 'url'=>array('update', 'id'=>$model->vendorId)),
	array('label'=>'Eliminar Vendedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vendorId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Vendedor', 'url'=>array('admin')),
);
?>

<h1>Ver Vendedor #<?php echo $model->vendorName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vendorId',
		'vendorName',
		'vendorDescription',
		'vendorSite',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
