<?php
/* @var $this RackController */
/* @var $model Rack */

$this->breadcrumbs=array(
	$model->row->room->location->locationName=>array('location/view','id'=>$model->row->room->location->locationId),
	$model->row->room->roomName=>array('room/view','id'=>$model->row->room->roomId),
	$model->row->rowName=>array('row/view','id'=>$model->row->rowId),
	$model->rackName=>array('view','id'=>$model->rackId),
	Yii::t('rdt','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Rack'), 'url'=>array('view', 'id'=>$model->rackId)),
);
?>

<h1><?php echo Yii::t('rdt','Update Rack # '); ?><?php echo $model->rackName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>