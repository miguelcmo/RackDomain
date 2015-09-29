<?php
/* @var $this RowController */
/* @var $data Row */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rowName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rowName), array('row/view', 'id'=>$data->rowId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rowDescription')); ?>:</b>
	<?php echo CHtml::encode($data->rowDescription); ?>
	<br />

</div>