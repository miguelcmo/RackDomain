<?php
/* @var $this PduTypeController */
/* @var $data PduType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pduTypeId), array('view', 'id'=>$data->pduTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->pduTypeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduTypeDescription')); ?>:</b>
	<?php echo CHtml::encode($data->pduTypeDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduCircuits')); ?>:</b>
	<?php echo CHtml::encode($data->pduCircuits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createUserId')); ?>:</b>
	<?php echo CHtml::encode($data->createUserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<?php /*
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