<?php
/* @var $this RoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	'Salas',
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>'Crear Sala ', 'url'=>array('create')),
	array('label'=>'Administrar Sala', 'url'=>array('admin')),
);
?>

<h1>Salas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
