<?php
/* @var $this RackController */
/* @var $model Rack */

$this->breadcrumbs=array(
	$model->row->room->location->locationName=>array('location/view', 'id'=>$model->row->room->location->locationId),
	$model->row->room->roomName=>array('room/view', 'id'=>$model->row->room->roomId),
	$model->row->rowName=>array('row/view', 'id'=>$model->rowId),
	$model->rackName,
);

$this->menu=array(
	array('label'=>'Back To Row', 'url'=>array('row/view', 'id'=>$model->rowId)),
	array('label'=>'Update Rack', 'url'=>array('update', 'id'=>$model->rackId)),
	array('label'=>'Delete Rack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rackId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Create Object', 'url'=>array('/object/create', 'rid'=>$model->rackId)),
);
?>

<h1>View Rack # <?php echo $model->rackName; ?></h1>

<div id="rackDetail">
<img id="rack" width="<?php echo $model->rackType0->imageWidth; ?>" src="<?php echo $model->rackType0->imagePath; ?>"/> 
<?php foreach($rackSpaceView as $value): ?>
	<embed 
		class="ru<?php echo $value['initialRU']?>" 
		style="left:<?php echo $model->rackType0->deviceLeft; ?>px;
			top:<?php $ur=(($value['initialRU']-1)*13)+$model->rackType0->deviceTop; 
				echo $ur; ?>px;" 
		src="<?php echo $value['platformImagePath']; ?>"/>
<?php endforeach; ?>
</div>








