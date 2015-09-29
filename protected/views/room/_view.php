<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('roomName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roomName), array('room/view', 'id'=>$data->roomId)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('roomAlias')); ?>:</b>
	<?php echo CHtml::encode($data->roomAlias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomDescription')); ?>:</b>
	<?php echo CHtml::encode($data->roomDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floorLocation')); ?>:</b>
	<?php echo CHtml::encode($data->floorLocation); ?>
	<br />

</div>