<?php
/* @var $this RackController */
/* @var $model Rack */
/* @var $rackDataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->row->rowName=>array('row/view','id'=>$model->row->rowId),
	//'Racks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Back To Row', 'url'=>array('row/view', 'id'=>$model->row->rowId)),
	array('label'=>'Order Rack', 'url'=>array('order', 'rid'=>$model->row->rowId)),
	array('label'=>'Manage Rack', 'url'=>array('admin', 'rid'=>$model->row->rowId)),
);
?>

<h1>Create Rack</h1>

<?php 
//print_r($rackDataProvider);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<br />
<h1>Row Racks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rackDataProvider,
	'itemView'=>'/rack/_rackview',
	'htmlOptions'=>array('class'=>'list-view-horizontal'),
)); ?>