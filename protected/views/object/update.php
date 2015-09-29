<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	Yii::t('viewst','Objects')=>array('index'),
	$model->objectName=>array('view','id'=>$model->objectId),
	Yii::t('viewst','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','List Object'), 'url'=>array('index')),
	array('label'=>Yii::t('viewst','Create Object'), 'url'=>array('create')),
	array('label'=>Yii::t('viewst','View Object'), 'url'=>array('view', 'id'=>$model->objectId)),
	array('label'=>Yii::t('viewst','Manage Object'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Update Object '); ?><?php echo $model->objectId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>