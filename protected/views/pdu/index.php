<?php
/* @var $this PduController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pdus',
);

$this->menu=array(
	array('label'=>'Create Pdu', 'url'=>array('create')),
	array('label'=>'Manage Pdu', 'url'=>array('admin')),
);
?>

<h1>Pdus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
