<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->pduName=>array('view','id'=>$model->pduId),
	Yii::t('rdt','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Pdu'), 'url'=>array('view','id'=>$model->pduId)),
);
?>

<h1><?php echo Yii::t('rdt','Update Pdu -> '); ?><?php echo $model->pduName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>