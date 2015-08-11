<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cityId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cityId), array('view', 'id'=>$data->cityId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentId')); ?>:</b>
	<?php echo CHtml::encode($data->departmentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cityName')); ?>:</b>
	<?php echo CHtml::encode($data->cityName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cityLongitude')); ?>:</b>
	<?php echo CHtml::encode($data->cityLongitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cityLatitude')); ?>:</b>
	<?php echo CHtml::encode($data->cityLatitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />


</div>