<?php
/* @var $this PduController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pdus',
);

$this->menu=array(
	array('label'=>'Crear Pdu', 'url'=>array('create')),
	array('label'=>'Administrar Pdu', 'url'=>array('admin')),
);
?>

<h1>Pdus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
