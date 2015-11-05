<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view', 'id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	Yii::t('rdt','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Room'), 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	//array('label'=>Yii::t('rdt','Manage Row'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Create Row'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>