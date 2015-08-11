<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Racks',
);

$this->menu=array(
	array('label'=>'Create Rack', 'url'=>array('create')),
	array('label'=>'Manage Rack', 'url'=>array('admin')),
);
?>

<h1>Racks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
