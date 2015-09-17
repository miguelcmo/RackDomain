<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view', 'id'=>$model->room->roomId),
	$model->pduName,
);

$this->menu=array(
	array('label'=>'Volver a Sala', 'url'=>array('room/view', 'id'=>$model->roomId)),
	array('label'=>'Actualizar Pdu', 'url'=>array('update', 'id'=>$model->pduId)),
	array('label'=>'Eliminar Pdu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pduId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Asignar Circuito a PDU', 'url'=>array('assignCircuit', 'id'=>$model->pduId)),
);
?>

<div class="span6">

<h1>Ver Pdu -> <?php echo $model->pduName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'roomId',
			'value'=>isset($model->room)?CHtml::encode($model->room->roomName):'Desconocido',
		),
		'pduName',
		'pduAlias',
		'pduDescription',
		array(
			'name'=>'pduTypeId',
			'value'=>isset($model->pduType)?CHtml::encode($model->pduType->pduTypeName):'Desconocido',
		),
	),
)); ?>

<?php 
$freePercent = ($freeCircuits*100)/($model->pduType->pduCircuits*2);
//$freePercent = 29;
$installedPercent = ($installedCircuits*100)/($model->pduType->pduCircuits*2);
$reservedPercent = ($reservedCircuits*100)/($model->pduType->pduCircuits*2);
?>

<h2>Indicadores PDU</h2>

<h4>Carga PDU</h4>
<table width="100%">
	<tr>
		<th width="50%">Bus A</th>
		<th width="50%">Bus B</th>
	</tr>
	<tr>
		<td><p class="pduDisplay">124,5A</p></td>
		<td><p class="pduDisplay">125,3A</p></td>
	</tr>
</table>

<h4>Circuitos Libres</h4>
<p>Actualmente hay <?php echo $freeCircuits; ?> circuitos libres de <?php echo $model->pduType->pduCircuits*2; ?> disponibles.</p>
	<div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
		<div class="bar" title="<?php echo $freeCircuits;?> circuitos libres" 
			style="width: <?php echo $freePercent; ?>%;
				   background-color:<?php 
						if($freePercent>60)
							echo '#33D633';
						 elseif ($freePercent>30&&$freePercent<=60)
							echo '#E6E600';
						 elseif ($freePercent>10&&$freePercent<=30)
							echo '#FFAD33';
						 elseif ($freePercent<=10)
							echo '#FF1919';
				   ?>;	
			"></div> 
    </div>
	
<h4>Circuitos Instalados</h4>
<p>Hay <?php echo $installedCircuits; ?> circuitos instalados de <?php echo $model->pduType->pduCircuits*2; ?> disponibles.</p>
    <div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
      <div class="bar" title="<?php echo $installedCircuits;?> circuitos instalados" style="width: <?php echo $installedPercent; ?>%;"></div>
    </div>
<h4>Circuitos Reservados</h4>
<p>Hay <?php echo $reservedCircuits; ?> circuitos reservados de <?php echo $model->pduType->pduCircuits*2; ?> disponibles.</p>
    <div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
      <div class="bar" title="<?php echo $reservedCircuits;?> cricuitos reservados" style="width: <?php echo $reservedPercent; ?>%;"></div>
    </div>
<p></p>





</div>

<div class="span5">
<?php //<img src="images/racks/pdu-300-amp-42-circuits.png" alt="PDU 300 Amp 42 circuits"> ?>
<?php $pduImage=CHtml::image('images/racks/pdu-300-amp-42-circuits.png', 'PDU 300 Amp 42 circuits'); ?>
<?php echo CHtml::link($pduImage, array('assignCircuit', 'id'=>$model->pduId)); ?>
</div>
