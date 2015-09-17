<?php
/* @var $this AttributesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Atributos',
);

$this->menu=array(
	array('label'=>'Crear Atributos', 'url'=>array('create')),
	array('label'=>'Administrar Atributos', 'url'=>array('admin')),
);
?>

<h1>Atributos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
