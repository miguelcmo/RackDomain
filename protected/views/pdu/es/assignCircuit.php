<?php
/* @var $this PduController */
/* @var $model Pdu */
/* @var $modelPduCircuits PduCircuits*/
/* @var $roomOptions Room Options */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view', 'id'=>$model->room->roomId),
	$model->pduName=>array('view', 'id'=>$model->pduId),
	'Asignar Circuitos',
);

$this->menu=array(
	array('label'=>'Volver a PDU', 'url'=>array('view', 'id'=>$model->pduId)),
);
?>

<h1>Asignar Circuitos a <?php echo $model->pduName; ?></h1>

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
		<th colspan="4">Bus A</th>
	</tr>
	<tr>
		<th>#</th>
		<th>Tasa Breaker</th>
		<th width="200px">Descripción del Circuito</th>
		<th>Estado Breaker</th>
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
		<th colspan="4">Bus B</th>
	</tr>
	
	<tr>
		<th>#</th>
		<th>Tasa Breaker</th>
		<th width="200px">Descripción del Circuito</th>
		<th>Estado Breaker</th>
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
