<?php
/* @var $this ObjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Objetos',
);

$this->menu=array(
	array('label'=>'Crear Objeto', 'url'=>array('create')),
	array('label'=>'Administrar Objeto', 'url'=>array('admin')),
);
?>

<h1>Objetos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
