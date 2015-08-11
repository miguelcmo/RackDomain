<?php
/* @var $this AttributesController */
/* @var $data Attributes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('attributeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->attributeId), array('view', 'id'=>$data->attributeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attributeName')); ?>:</b>
	<?php echo CHtml::encode($data->attributeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attributeDescription')); ?>:</b>
	<?php echo CHtml::encode($data->attributeDescription); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Satus')); ?>:</b>
	<?php echo CHtml::encode($data->Satus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flag')); ?>:</b>
	<?php echo CHtml::encode($data->Flag); ?>
	<br />

	*/ ?>

</div>