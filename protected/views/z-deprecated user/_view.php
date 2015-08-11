<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userId), array('view', 'id'=>$data->userId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userFirstName')); ?>:</b>
	<?php echo CHtml::encode($data->userFirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userLastName')); ?>:</b>
	<?php echo CHtml::encode($data->userLastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userEmail')); ?>:</b>
	<?php echo CHtml::encode($data->userEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userType')); ?>:</b>
	<?php echo CHtml::encode($data->userType); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('userProfile')); ?>:</b>
	<?php echo CHtml::encode($data->userProfile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastLoginTime')); ?>:</b>
	<?php echo CHtml::encode($data->lastLoginTime); ?>
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