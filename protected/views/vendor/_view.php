<?php
/* @var $this VendorController */
/* @var $data Vendor */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vendorId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vendorId), array('view', 'id'=>$data->vendorId)); ?>
	<br />
	*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendorName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vendorName), array('view', 'id'=>$data->vendorId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendorDescription')); ?>:</b>
	<?php echo CHtml::encode($data->vendorDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendorSite')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vendorSite), CHtml::encode($data->vendorSite)); ?>
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