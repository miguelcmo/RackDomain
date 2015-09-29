<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	Yii::t('viewst','Locations')=>array('index'),
	Yii::t('viewst','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Locations'), 'url'=>array('index')),
	//array('label'=>Yii::t('viewst','Manage Location'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Create Location'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>