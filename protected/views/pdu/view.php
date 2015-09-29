<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view', 'id'=>$model->room->roomId),
	$model->pduName,
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Room'), 'url'=>array('room/view', 'id'=>$model->roomId)),
	array('label'=>Yii::t('viewst','Update Pdu'), 'url'=>array('update', 'id'=>$model->pduId)),
	array('label'=>Yii::t('viewst','Delete Pdu'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pduId),'confirm'=>Yii::t('viewst','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('viewst','Assign Circuit to Pdu'), 'url'=>array('assignCircuit', 'id'=>$model->pduId)),
);
?>

<div class="span6">

<h1><?php echo Yii::t('viewst','View Pdu -> '); ?><?php echo $model->pduName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'roomId',
			'value'=>isset($model->room)?CHtml::encode($model->room->roomName):Yii::t('viewst','unknown'),
		),
		'pduName',
		'pduAlias',
		'pduDescription',
		array(
			'name'=>'pduTypeId',
			'value'=>isset($model->pduType)?CHtml::encode($model->pduType->pduTypeName):Yii::t('viewst','unknown'),
		),
	),
)); ?>

<?php 
$freePercent = ($freeCircuits*100)/($model->pduType->pduCircuits*2);
//$freePercent = 29;
$installedPercent = ($installedCircuits*100)/($model->pduType->pduCircuits*2);
$reservedPercent = ($reservedCircuits*100)/($model->pduType->pduCircuits*2);
?>

<h2><?php echo Yii::t('viewst','PDU Indicators'); ?></h2>

<h4><?php echo Yii::t('viewst','PDU Load'); ?></h4>
<table width="100%">
	<tr>
		<th width="50%"><?php echo Yii::t('viewst','Bus A'); ?></th>
		<th width="50%"><?php echo Yii::t('viewst','Bus B'); ?></th>
	</tr>
	<tr>
		<td><p class="pduDisplay">124,5A</p></td>
		<td><p class="pduDisplay">125,3A</p></td>
	</tr>
</table>

<h4><?php echo Yii::t('viewst','Free Circuits'); ?></h4>
<p><?php echo Yii::t('viewst','There are '); ?><?php echo $freeCircuits; ?><?php echo Yii::t('viewst',' free circuits of '); ?><?php echo $model->pduType->pduCircuits*2; ?><?php echo Yii::t('viewst',' available.'); ?></p>
	<div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
		<div class="bar" title="<?php echo $freeCircuits;?> free circuits" 
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
	
<h4><?php echo Yii::t('viewst','Installed Circuits'); ?></h4>
<p><?php echo Yii::t('viewst','There are '); ?><?php echo $installedCircuits; ?><?php echo Yii::t('viewst',' installed circuits of '); ?><?php echo $model->pduType->pduCircuits*2; ?><?php echo Yii::t('viewst',' available.'); ?></p>
    <div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
      <div class="bar" title="<?php echo $installedCircuits;?> installed circuits" style="width: <?php echo $installedPercent; ?>%;"></div>
    </div>
<h4><?php echo Yii::t('viewst','Reserved Circuits'); ?></h4>
<p><?php echo Yii::t('viewst','There are '); ?><?php echo $reservedCircuits; ?><?php echo Yii::t('viewst',' reserved circuits of '); ?><?php echo $model->pduType->pduCircuits*2; ?><?php echo Yii::t('viewst',' available.'); ?></p>
    <div class="progress progress-striped active" title="Total <?php echo $model->pduType->pduCircuits*2;?>">
      <div class="bar" title="<?php echo $reservedCircuits;?> reserved circuits" style="width: <?php echo $reservedPercent; ?>%;"></div>
    </div>
<p></p>





</div>

<div class="span5">
<?php $pduImage=CHtml::image('images/racks/pdu-300-amp-42-circuits.png', Yii::t('viewst','PDU 300 Amp 42 circuits')); ?>
<?php echo CHtml::link($pduImage, array('assignCircuit', 'id'=>$model->pduId)); ?>
</div>
