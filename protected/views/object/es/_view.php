<?php
/* @var $this ObjectController */
/* @var $data Object */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->objectId), array('view', 'id'=>$data->objectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformId')); ?>:</b>
	<?php echo CHtml::encode($data->platformId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectName')); ?>:</b>
	<?php echo CHtml::encode($data->objectName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectAlias')); ?>:</b>
	<?php echo CHtml::encode($data->objectAlias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectDescription')); ?>:</b>
	<?php echo CHtml::encode($data->objectDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createUserId')); ?>:</b>
	<?php echo CHtml::encode($data->createUserId); ?>
	<br />

	<?php /*
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