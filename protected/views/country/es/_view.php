<?php
/* @var $this CountryController */
/* @var $data Country */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->countryId), array('view', 'id'=>$data->countryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryName')); ?>:</b>
	<?php echo CHtml::encode($data->countryName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryAbbreviation')); ?>:</b>
	<?php echo CHtml::encode($data->countryAbbreviation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />


</div>