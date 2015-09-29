<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName=>array('view','id'=>$model->rowId),
	Yii::t('viewst','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Row'), 'url'=>array('view', 'id'=>$model->rowId)),
);
?>

<h1><?php echo Yii::t('viewst','Update Row '); ?><?php echo $model->rowName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>