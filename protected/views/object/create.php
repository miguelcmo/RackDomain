<?php
/* @var $this ObjectController */
/* @var $model Object */
/* @var $modelRack Rack */

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
?>

<h1>Create Object</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'rackSpace'=>$rackSpace)); ?>

<div id="rackDetail">
<img id="rack" width="<?php echo $modelRack->rackType0->imageWidth; ?>" src="<?php echo $modelRack->rackType0->imagePath; ?>"/> 
<?php foreach($rackSpaceView as $value): ?>
	<embed 
		class="ru<?php echo $value['initialRU']?>" 
		style="left:<?php echo $modelRack->rackType0->deviceLeft; ?>px;
			top:<?php $ur=(($value['initialRU']-1)*13)+$modelRack->rackType0->deviceTop; 
				echo $ur; ?>px;"  
		src="<?php echo $value['platformImagePath']; ?>"/>
<?php endforeach; ?>
</div>
