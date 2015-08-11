<?php
/* @var $this TestLocationController */
/* @var $data TestLocation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->locationId), array('view', 'id'=>$data->locationId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationName')); ?>:</b>
	<?php echo CHtml::encode($data->locationName); ?>
	<br />


</div>