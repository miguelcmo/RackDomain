<?php
/* @var $this LocationController */
/* @var $data Location */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('locationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->locationId), array('view', 'id'=>$data->locationId)); ?>
	<br />
	*/ ?>
	
	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('locationName')); ?>: </b>
	<?php echo CHtml::link($data['locationName'], array('view', 'id'=>$data['locationId'])); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('cityId')); ?>:</b>
	<?php //echo $data->city->cityName; ?>
	<br />

	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('subdivisionId')); ?>:</b>
	<?php //echo CHtml::encode($data->subdivision->subdivisionName); ?>
	<br />

	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('locationAddress')); ?>:</b>
	<?php echo $data['locationAddress']; ?>
	<br />

	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('locationNeighborhood')); ?>:</b>
	<?php echo $data['locationNeighborhood']; ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('locationType')); ?>:</b>
	<?php echo CHtml::encode($data->locationType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationStatus')); ?>:</b>
	<?php echo CHtml::encode($data->locationStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationManager')); ?>:</b>
	<?php echo CHtml::encode($data->locationManager); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('locationOperator')); ?>:</b>
	<?php echo CHtml::encode($data->locationOperator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationLongitude')); ?>:</b>
	<?php echo CHtml::encode($data->locationLongitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationLatitude')); ?>:</b>
	<?php echo CHtml::encode($data->locationLatitude); ?>
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