<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->departmentId), array('view', 'id'=>$data->departmentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryId')); ?>:</b>
	<?php echo CHtml::encode($data->countryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentName')); ?>:</b>
	<?php echo CHtml::encode($data->departmentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />


</div>