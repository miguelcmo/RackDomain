<?php
/* @var $this PduController */
/* @var $model Pdu */
/* @var $modelPduCircuits PduCircuits*/
/* @var $roomOptions Room Options */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view', 'id'=>$model->room->roomId),
	$model->pduName=>array('view', 'id'=>$model->pduId),
	Yii::t('viewst','Assign Circuits'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Pdu'), 'url'=>array('view', 'id'=>$model->pduId)),
);
?>

<h1><?php echo Yii::t('viewst','Assign Circuits -> '); ?><?php echo $model->pduName; ?></h1>

<?php //var_dump($roomOptions); ?>

<?php $this->renderPartial('_assignForm', array(
	'model'=>$modelPduCircuits, 
	'modelRoom'=>$modelRoom,
	'modelRow'=>$modelRow,
	'modelRack'=>$modelRack,
)); ?>

<?php //This part visualizes the circuits table in the bus A of an PDU ?>
<table class="pduTable">
	<tr>
		<th colspan="4"><?php echo Yii::t('viewst','Bus A'); ?></th>
	</tr>
	<tr>
		<th><?php echo Yii::t('viewst','#'); ?></th>
		<th><?php echo Yii::t('viewst','Breaker Rate'); ?></th>
		<th width="200px"><?php echo Yii::t('viewst','Circuit Description'); ?></th>
		<th><?php echo Yii::t('viewst','Breaker State'); ?></th>
	</tr>
	
<?php foreach($circuitBusA as $value)
	{
		if($value->pduCircuitState==3)
		{
			$backColor='#999';
		} else
			$backColor='black';
		
		echo '<tr style="color:'.$backColor.'">';
			echo '<td>'.$value->pduCircuitNumber.'</td>';
			echo '<td style="text-align:center;">'.$value->breakerRate0->breakerRate.'</td>';
			echo '<td style="text-overflow: ellipsis;overflow: hidden;white-space:nowrap;max-width:200px">'.$value->pduCircuitDescription.'</td>';
			if($value->breakerState==0)
			{
				//echo '<td>OFF&nbsp;&nbsp;<img src="images/racks/off-breaker-state.png" width="45"></td>';
				echo '<td><img src="images/racks/off-breaker-state.png" width="45"></td>';
			}else 
				//echo '<td>ON&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/racks/on-breaker-state.png"  width="45"></td>';
				echo '<td><img src="images/racks/on-breaker-state.png"  width="45"></td>';
		echo '</tr>';
	}
?>
</table>

<?php //This part visualizes the circuits table in the bus B of an PDU ?>
<table class="pduTable">
	<tr>
		<th colspan="4"><?php echo Yii::t('viewst','Bus B'); ?></th>
	</tr>
	
	<tr>
		<th><?php echo Yii::t('viewst','#'); ?></th>
		<th><?php echo Yii::t('viewst','Breaker Rate'); ?></th>
		<th width="200px"><?php echo Yii::t('viewst','Circuit Description'); ?></th>
		<th><?php echo Yii::t('viewst','Breaker State'); ?></th>
	</tr>

<?php foreach($circuitBusB as $value)
	{
		if($value->pduCircuitState==3)
		{
			$backColor='#999';
		} else
			$backColor='black';
		
		echo '<tr style="color:'.$backColor.'">';
			echo '<td>'.$value->pduCircuitNumber.'</td>';
			echo '<td style="text-align:center;">'.$value->breakerRate0->breakerRate.'</td>';
			echo '<td style="text-overflow: ellipsis;overflow: hidden;white-space:nowrap;max-width:200px">'.$value->pduCircuitDescription.'</td>';
			if($value->breakerState==0)
			{
				//echo '<td>OFF&nbsp;&nbsp;<img src="images/racks/off-breaker-state.png" width="45"></td>';
				echo '<td><img src="images/racks/off-breaker-state.png" width="45"></td>';
			}else 
				//echo '<td>ON&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/racks/on-breaker-state.png"  width="45"></td>';
				echo '<td><img src="images/racks/on-breaker-state.png"  width="45"></td>';
		echo '</tr>';
	}
?>
</table>
