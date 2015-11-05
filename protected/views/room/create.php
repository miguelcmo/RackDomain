<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	Yii::t('rdt','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Location'), 'url'=>array('location/view','id'=>$model->location->locationId)),
	//array('label'=>Yii::t('rdt','Manage Room'), 'url'=>array('admin', 'lid'=>$model->location->locationId)),
);
?>

<h1><?php echo Yii::t('rdt','Create Room'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>