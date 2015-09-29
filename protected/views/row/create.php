<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	Yii::t('viewst','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Room'), 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	//array('label'=>Yii::t('viewst','Manage Row'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Create Row'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>