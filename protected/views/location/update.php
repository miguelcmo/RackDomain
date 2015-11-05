<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	$model->locationName=>array('view','id'=>$model->locationId),
	Yii::t('rdt','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Location'), 'url'=>array('view', 'id'=>$model->locationId)),
);
?>

<h1><?php echo Yii::t('rdt','Update Location '); ?><?php echo $model->locationName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>