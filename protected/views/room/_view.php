<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">

	<!--
	<b><?php //echo CHtml::encode($data->getAttributeLabel('roomId')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->roomId), array('room/view', 'id'=>$data->roomId)); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('sdsId')); ?>:</b>
	<?php //echo CHtml::encode($data->sds->sdsName); ?>
	<br />
	

	<b><?php //echo CHtml::encode($data->getAttributeLabel('roomName')); ?>:</b>
	<?php //echo CHtml::encode($data->roomName); ?>
	<br />
	-->
	
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

	<!--
	<b><?php //echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php //echo CHtml::encode($data->createTime); ?>
	<br />
 
	<b><?php //echo CHtml::encode($data->getAttributeLabel('createUserId')); ?>:</b>
	<?php //echo CHtml::encode($data->createUserId); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php //echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('updateUserId')); ?>:</b>
	<?php //echo CHtml::encode($data->updateUserId); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php //echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php //echo CHtml::encode($data->Flag); ?>
	<br />
	-->
</div>