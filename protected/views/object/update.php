<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	Yii::t('rdt','Objects')=>array('index'),
	$model->objectName=>array('view','id'=>$model->objectId),
	Yii::t('rdt','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','List Object'), 'url'=>array('index')),
	array('label'=>Yii::t('rdt','Create Object'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','View Object'), 'url'=>array('view', 'id'=>$model->objectId)),
	array('label'=>Yii::t('rdt','Manage Object'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Update Object '); ?><?php echo $model->objectId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>