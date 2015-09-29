<?php
/* @var $this RackController */
/* @var $data Rack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rackName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rackName), array('rack/view', 'id'=>$data->rackId)); ?>
	<br />

	<?php echo CHtml::image($data->rackType0->thumbnailPath,Yii::t('viewst','Rack miniature')); ?>

</div>