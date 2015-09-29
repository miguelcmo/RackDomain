<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	$model->rackSpace->rack->row->room->location->locationName=>array('location/view','id'=>$model->rackSpace->rack->row->room->location->locationId),
	$model->rackSpace->rack->row->room->roomName=>array('room/view','id'=>$model->rackSpace->rack->row->room->roomId),
	$model->rackSpace->rack->row->rowName=>array('row/view','id'=>$model->rackSpace->rack->row->rowId),
	$model->rackSpace->rack->rackName=>array('rack/view','id'=>$model->rackSpace->rack->rackId),
	$model->objectName,
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Rack'), 'url'=>array('rack/view','id'=>$model->rackSpace->rackId)),
	array('label'=>Yii::t('viewst','Update Object'), 'url'=>array('update', 'id'=>$model->objectId)),
	array('label'=>Yii::t('viewst','Delete Object'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->objectId),'confirm'=>Yii::t('viewst','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('viewst','Other Action'), 'url'=>'#'),
);
?>

<h1><?php echo Yii::t('viewst','View Object # '); ?><?php echo $model->objectName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'platformId',
			'value'=>$model->platform->platformName,
		),
		'objectName',
		'objectAlias',
		'objectDescription',
	),
)); ?>
