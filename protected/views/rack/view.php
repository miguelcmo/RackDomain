<?php
/* @var $this RackController */
/* @var $model Rack */
/* @var $rackSpaceView RackSpace */

$this->breadcrumbs=array(
	$model->row->room->location->locationName=>array('location/view', 'id'=>$model->row->room->location->locationId),
	$model->row->room->roomName=>array('room/view', 'id'=>$model->row->room->roomId),
	$model->row->rowName=>array('row/view', 'id'=>$model->rowId),
	$model->rackName,
);

$this->menu=array(
	array('label'=>'Back To Row', 'url'=>array('row/view', 'id'=>$model->rowId)),
	array('label'=>'Update Rack', 'url'=>array('update', 'id'=>$model->rackId)),
	array('label'=>'Delete Rack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rackId,'rid'=>$model->row->rowId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Create Object', 'url'=>array('/object/create', 'rid'=>$model->rackId)),
);
?>

<?php 
$usedRU = $devices;
foreach($rackSpaceView as $value)
{
	$usedRU = $value['platformRackUnits']+$usedRU;
}
if($usedRU>42){
	$usedRU = 42;
}
$freeSpace = 100-($usedRU*100/42);
//$freeSpace = 0;
if($freeSpace==0){
	$freeSpace = 1;
}
?>

<div class="span6">
<h1>View Rack # <?php echo $model->rackName; ?></h1>
<h2>Rack Indicators</h2>
<h4>Free Space</h4>
<p>There are <?php echo (42-$usedRU);?> free rack units</p>
<?php //var_dump($rackSpaceView); ?>
<div class="progress progress-striped active" title="Total 42 Rack Units">
	<div class="bar" title="<?php echo (42-$usedRU);?> free Rack Units" 
		style="width: <?php echo $freeSpace; ?>%;
			   background-color:<?php 
					if($freeSpace>60)
						echo '#33D633';
					 elseif ($freeSpace>30&&$freeSpace<=60)
						echo '#E6E600';
					 elseif ($freeSpace>10&&$freeSpace<=30)
						echo '#FFAD33';
					 elseif ($freeSpace<=10)
						echo '#FF1919';
				?>;	
	"></div>
</div>

<h4>Installed Objects</h4>
<p>There are <?php echo $devices; ?> objects installed, having <?php echo $usedRU?> rack units in use.</p>
<table class="table table-hover" width="60%">
	<thead>
		<tr>
			<th width="40%">Object Name</th>
			<th width="40%">Object Attribute</th>
			<th width="20%">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rackSpaceView as $value): ?>
		<tr>
			<td><?php echo $value['objectName']; ?></td>
			<td></td>
			<td><?php 
				$view = CHtml::image('/RackDomain/assets/4ee46d47/gridview/view.png', 'view');
				echo CHtml::link($view, array('/object/view', 'id'=>$value['objectId']));
				$update = CHtml::image('/RackDomain/assets/4ee46d47/gridview/update.png', 'update');
				echo CHtml::link($update, array('/object/update', 'id'=>$value['objectId']));
				$delete = CHtml::image('/RackDomain/assets/4ee46d47/gridview/delete.png', 'delete');
				echo CHtml::link($delete, '#', array('submit'=>array('/object/delete','id'=>$value['objectId'],'rid'=>$value['rackId']),'confirm'=>'Are you sure you want to delete this item?'));
			?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</div>


<div class="span5">
<div class="rackDetail">
<?php 
 echo CHtml::image($model->rackType0->imagePath); 
 
 foreach($rackSpaceView as $value)
 {
	$ur=(($value['initialRU']-1)*13)+$model->rackType0->deviceTop;
	$platformPicture = CHtml::image($value['platformImagePath'], 'Platform picture', array(
		'class'=>'ru', 
		'title'=>$value['objectName'],
		'style'=>'left:'.$model->rackType0->deviceLeft.'px;top:'.$ur.'px',	
	));
	echo CHtml::link($platformPicture, array('/object/view','id'=>$value['objectId']));
 }
 ?>
 </div>
 </div>