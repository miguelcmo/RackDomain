<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	Yii::t('viewst','Pdus')=>array('index'),
	Yii::t('viewst','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Room'), 'url'=>array('room/view', 'id'=>$model->roomId)),
);
?>

<h1><?php echo Yii::t('viewst','Create Pdu'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>