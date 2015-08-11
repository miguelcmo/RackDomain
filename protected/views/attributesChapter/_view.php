<?php
/* @var $this AttributesChapterController */
/* @var $data AttributesChapter */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('attributeChapterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->attributeChapterId), array('view', 'id'=>$data->attributeChapterId)); ?>
	<br />
	*/ ?>

	<b><?php //echo CHtml::encode($data->getAttributeLabel('attributeChapterName')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->attributeChapterName), array('view', 'id'=>$data->attributeChapterId)); ?>
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
	*/ ?>


</div>