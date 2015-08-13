<?php
/* @var $this RackController */
/* @var $model Rack */
/* @var $rackDataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->row->room->location->locationName=>array('location/view','id'=>$model->row->room->location->locationId),
	$model->row->room->roomName=>array('room/view','id'=>$model->row->room->roomId),
	$model->row->rowName=>array('row/view','id'=>$model->row->rowId),
	'Create',
);

$this->menu=array(
	array('label'=>'Back To Row', 'url'=>array('row/view', 'id'=>$model->row->rowId)),
);
?>

<h1>Create Rack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<br />
<h1>Row Racks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rackDataProvider,
	'itemView'=>'/rack/_rackview',
	'htmlOptions'=>array('class'=>'list-view-horizontal'),
)); ?>