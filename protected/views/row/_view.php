<?php
/* @var $this RowController */
/* @var $data Row */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rowId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rowId), array('view', 'id'=>$data->rowId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomId')); ?>:</b>
	<?php echo CHtml::encode($data->roomId); ?>
	<br />
	*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('rowName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rowName), array('row/view', 'id'=>$data->rowId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rowDescription')); ?>:</b>
	<?php echo CHtml::encode($data->rowDescription); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createUserId')); ?>:</b>
	<?php echo CHtml::encode($data->createUserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateUserId')); ?>:</b>
	<?php echo CHtml::encode($data->updateUserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />

	*/ ?>

</div>