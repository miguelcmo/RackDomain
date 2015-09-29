<?php
/* @var $this PduController */
/* @var $data Pdu */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('pduName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pduName), array('pdu/view', 'id'=>$data->pduId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduDescription')); ?>:</b>
	<?php echo CHtml::encode($data->pduDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pduTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->pduType->pduTypeName); ?>
	<br />

</div>