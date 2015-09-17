<?php
/* @var $this CityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ciudades',
);

$this->menu=array(
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<h1>Ciudades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemsCssClass'=>'list-view view',
	'itemView'=>'_view',
)); ?>
