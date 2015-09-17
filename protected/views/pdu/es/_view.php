<?php
/* @var $this PduController */
/* @var $data Pdu */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pduId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pduId), array('view', 'id'=>$data->pduId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomId')); ?>:</b>
	<?php echo CHtml::encode($data->roomId); ?>
	<br />
	*/?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('pduName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pduName), array('pdu/view', 'id'=>$data->pduId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduDescription')); ?>:</b>
	<?php echo CHtml::encode($data->pduDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->pduType->pduTypeName); ?>
	<br />
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pduAlias')); ?>:</b>
	<?php echo CHtml::encode($data->pduAlias); ?>
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