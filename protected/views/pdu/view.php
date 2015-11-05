<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view', 'id'=>$model->room->roomId),
	$model->pduName,
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Room'), 'url'=>array('room/view', 'id'=>$model->roomId)),
	array('label'=>Yii::t('rdt','Update Pdu'), 'url'=>array('update', 'id'=>$model->pduId)),
	array('label'=>Yii::t('rdt','Delete Pdu'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pduId,'rid'=>$model->roomId),'confirm'=>Yii::t('rdt','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('rdt','Assign Circuit to Pdu'), 'url'=>array('assignCircuit', 'id'=>$model->pduId)),
);
?>

<div class="span6">

<h1><?php echo Yii::t('rdt','View Pdu -> '); ?><?php echo $model->pduName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'roomId',
			'value'=>isset($model->room)?CHtml::encode($model->room->roomName):Yii::t('rdt','unknown'),
		),
		'pduName',
		'pduAlias',
		'pduDescription',
		array(
			'name'=>'pduTypeId',
			'value'=>isset($model->pduType)?CHtml::encode($model->pduType->pduTypeName):Yii::t('rdt','unknown'),
		),
	),
)); ?>

<?php 
$total = $model->pduType->pduCircuits*$model->pduType->pduBuses;
$freePercent = ($freeCircuits*100)/($model->pduType->pduCircuits*$model->pduType->pduBuses);
$installedPercent = ($installedCircuits*100)/($model->pduType->pduCircuits*$model->pduType->pduBuses);
$reservedPercent = ($reservedCircuits*100)/($model->pduType->pduCircuits*$model->pduType->pduBuses);
?>

<h2><?php echo Yii::t('rdt','PDU Indicators'); ?></h2>

<h4><?php echo Yii::t('rdt','PDU Load'); ?></h4>
<table width="100%">
	<tr>
		<th width="50%"><?php echo Yii::t('rdt','Bus A'); ?></th>
		<?php if($model->pduType->pduBuses==2){ ?>
		<th width="50%"><?php echo Yii::t('rdt','Bus B'); ?></th>
		<?php } ?>
	</tr>
	<tr>
		<td><p class="pduDisplay">124,5A</p></td>
		<?php if($model->pduType->pduBuses==2){ ?>
		<td><p class="pduDisplay">125,3A</p></td>
		<?php } ?>
	</tr>
</table>

<h4><?php echo Yii::t('rdt','Free Circuits'); ?></h4>
<p><?php echo Yii::t('rdt','There are '); ?><?php echo $freeCircuits; ?><?php echo Yii::t('rdt',' free circuits of '); ?><?php echo $total; ?><?php echo Yii::t('rdt',' available.'); ?></p>
	<div class="progress progress-striped active" title="Total <?php echo $total;?>">
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
	
<h4><?php echo Yii::t('rdt','Installed Circuits'); ?></h4>
<p><?php echo Yii::t('rdt','There are '); ?><?php echo $installedCircuits; ?><?php echo Yii::t('rdt',' installed circuits of '); ?><?php echo $total; ?><?php echo Yii::t('rdt',' available.'); ?></p>
    <div class="progress progress-striped active" title="Total <?php echo $total;?>">
      <div class="bar" title="<?php echo $installedCircuits;?> installed circuits" style="width: <?php echo $installedPercent; ?>%;"></div>
    </div>
<h4><?php echo Yii::t('rdt','Reserved Circuits'); ?></h4>
<p><?php echo Yii::t('rdt','There are '); ?><?php echo $reservedCircuits; ?><?php echo Yii::t('rdt',' reserved circuits of '); ?><?php echo $total; ?><?php echo Yii::t('rdt',' available.'); ?></p>
    <div class="progress progress-striped active" title="Total <?php echo $total;?>">
      <div class="bar" title="<?php echo $reservedCircuits;?> reserved circuits" style="width: <?php echo $reservedPercent; ?>%;"></div>
    </div>
<p></p>





</div>

<div class="span5">
<?php $pduImage=CHtml::image('images/racks/pdu-300-amp-42-circuits.png', Yii::t('rdt',$model->pduType->pduTypeName)); ?>
<?php echo CHtml::link($pduImage, array('assignCircuit', 'id'=>$model->pduId)); ?>
</div>
