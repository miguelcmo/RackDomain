<?php
/* @var $this PduTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Pdu',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Pdu', 'url'=>array('create')),
	array('label'=>'Administrar Tipo de Pdu', 'url'=>array('admin')),
);
?>

<h1>Tipos de Pdu</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
