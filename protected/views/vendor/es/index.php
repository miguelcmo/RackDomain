<?php
/* @var $this VendorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vendedores',
);

$this->menu=array(
	array('label'=>'Crear Vendedor', 'url'=>array('create')),
	array('label'=>'Administrar Vendedor', 'url'=>array('admin')),
);
?>

<h1>Vendedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
