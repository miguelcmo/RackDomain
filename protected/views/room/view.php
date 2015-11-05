<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $rowDataProvider Rows in room */
/* @var $pduDataProvider PDUs in room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	$model->roomName,
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Location'), 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>Yii::t('rdt','Update Room'), 'url'=>array('update', 'id'=>$model->roomId)),
	array('label'=>Yii::t('rdt','Delete Room'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->roomId,'lid'=>$model->location->locationId),'confirm'=>Yii::t('rdt','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('rdt','Create Row'), 'url'=>array('row/create', 'rid'=>$model->roomId)),
	array('label'=>Yii::t('rdt','Create PDU'), 'url'=>array('pdu/create', 'rid'=>$model->roomId)),
);
?>

<h1><?php echo Yii::t('rdt','View Room '); ?><?php echo $model->roomName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'locationId',
			'value'=>$model->location->locationName,
		),
		'roomName',
		'roomAlias',
		'roomDescription',
	),
)); ?>

<br />
<h1><?php echo Yii::t('rdt','Room Rows'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rowDataProvider,
	'itemView'=>'/row/_view',
)); ?>

<br />
<h1><?php echo Yii::t('rdt','Room PDUs'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$pduDataProvider,
	'itemView'=>'/pdu/_view',
)); ?>



