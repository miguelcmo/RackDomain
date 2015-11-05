<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName=>array('view','id'=>$model->rowId),
	Yii::t('rdt','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Row'), 'url'=>array('view', 'id'=>$model->rowId)),
);
?>

<h1><?php echo Yii::t('rdt','Update Row '); ?><?php echo $model->rowName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>