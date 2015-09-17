<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Racks',
);

$this->menu=array(
	array('label'=>'Crear Rack', 'url'=>array('create')),
	array('label'=>'Administrar Rack', 'url'=>array('admin')),
);
?>

<h1>Racks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
