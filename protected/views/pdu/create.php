<?php
/* @var $this PduController */
/* @var $model Pdu */

$this->breadcrumbs=array(
	Yii::t('rdt','Pdus')=>array('index'),
	Yii::t('rdt','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Room'), 'url'=>array('room/view', 'id'=>$model->roomId)),
);
?>

<h1><?php echo Yii::t('rdt','Create Pdu'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>