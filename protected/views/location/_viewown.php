<?php
/* @var $this LocationController */
/* @var $data Location */
?>

<div class="view">
	
	<b><?php echo CHtml::encode(Location::model()->getAttributeLabel('locationName')); ?>: </b>
	<?php echo CHtml::link($data['locationName'], array('view', 'id'=>$data['locationId'])); ?>

</div>