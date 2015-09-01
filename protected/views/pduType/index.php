<?php
/* @var $this PduTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pdu Types',
);

$this->menu=array(
	array('label'=>'Create PduType', 'url'=>array('create')),
	array('label'=>'Manage PduType', 'url'=>array('admin')),
);
?>

<h1>Pdu Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
