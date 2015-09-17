<?php
/* @var $this RequestFuelController */
/* @var $data RequestFuel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('requestFuelId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->requestFuelId), array('view', 'id'=>$data->requestFuelId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requesterId')); ?>:</b>
	<?php echo CHtml::encode($data->requester->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requestLocationId')); ?>:</b>
	<?php echo CHtml::encode($data->requestLocation->locationName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onSiteContactId')); ?>:</b>
	<?php echo CHtml::encode($data->onSiteContact->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuelQty')); ?>:</b>
	<?php echo CHtml::encode($data->fuelQty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuelTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->fuelType->fuelTypeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requestFuelNotes')); ?>:</b>
	<?php echo CHtml::encode($data->requestFuelNotes); ?>
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