<?php
/* @var $this ChapterController */
/* @var $data Chapter */
?>

<div class="view">

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('chapterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->chapterId), array('view', 'id'=>$data->chapterId)); ?>
	<br />
	*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapterName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->chapterName), array('view', 'id'=>$data->chapterId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapterDescription')); ?>:</b>
	<?php echo CHtml::encode($data->chapterDescription); ?>
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