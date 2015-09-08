<?php
/* @var $this ObjectController */
/* @var $model Object */
/* @var $modelRack Rack */
/* @var $rackSpaceView List of Devices */

$this->breadcrumbs=array(
	$modelRack->row->room->location->locationName=>array('location/view', 'id'=>$modelRack->row->room->location->locationId),
	$modelRack->row->room->roomName=>array('room/view', 'id'=>$modelRack->row->room->roomId),
	$modelRack->row->rowName=>array('row/view', 'id'=>$modelRack->row->rowId),
	$modelRack->rackName=>array('rack/view', 'id'=>$modelRack->rackId),
	'Create object',
);

$this->menu=array(
	array('label'=>'Back To Rack', 'url'=>array('rack/view', 'id'=>$modelRack->rackId)),
);

Yii::app()->clientScript->registerScript('rackRule', "
$('#RackSpace_initialRU').focus(function(){
	$('#rackRule').fadeIn(2000);
});
$('#RackSpace_initialRU').focusout(function(){
	$('#rackRule').fadeOut(2000);
});
");
?>

<div class="span6">
<h1>Create Object</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'rackSpace'=>$rackSpace)); ?>
</div>

<div class="span5">
<div class="rackDetail">
<?php 
 echo CHtml::image($modelRack->rackType0->imagePath);
 echo CHtml::image('images/racks/rack_numbers.png', '#',array(
	'class'=>'ru',
	'id'=>'rackRule',
	'style'=>'display:none;left:16px;top:'.$modelRack->rackType0->deviceTop.'px;'));
 
 foreach($rackSpaceView as $value)
 {
	$ur=(($value['initialRU']-1)*13)+$modelRack->rackType0->deviceTop;
	$platformPicture = CHtml::image($value['platformImagePath'], 'Platform picture', array(
		'class'=>'ru', 
		'title'=>'Click to view device details',
		'style'=>'left:'.$modelRack->rackType0->deviceLeft.'px;top:'.$ur.'px',	
	));
	echo CHtml::link($platformPicture, array('/object/view','id'=>$value['objectId']));
 }
 ?>
</div>
</div>