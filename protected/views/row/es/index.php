<?php
/* @var $this RowController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Filas',
);

$this->menu=array(
	array('label'=>'Crear Fila', 'url'=>array('create')),
	array('label'=>'Administrar Fila', 'url'=>array('admin')),
);
?>

<h1>Filas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
