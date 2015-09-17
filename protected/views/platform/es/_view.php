<?php
/* @var $this PlatformController */
/* @var $data Platform */
?>

<div class="view">

	<?php /* 
	<b><?php echo CHtml::encode($data->getAttributeLabel('platformId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->platformId), array('view', 'id'=>$data->platformId)); ?>
	<br />
	*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendorId')); ?>:</b>
	<?php echo CHtml::encode($data->vendor->vendorName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapterId')); ?>:</b>
	<?php echo CHtml::encode($data->chapter->chapterName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->platformName), array('view', 'id'=>$data->platformId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformDescription')); ?>:</b>
	<?php echo CHtml::encode($data->platformDescription); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('platformImagePath')); ?>:</b>
	<?php echo CHtml::encode($data->platformImagePath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformBackgroundTextColor')); ?>:</b>
	<?php echo CHtml::encode($data->platformBackgroundTextColor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformRackUnits')); ?>:</b>
	<?php echo CHtml::encode($data->platformRackUnits); ?>
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