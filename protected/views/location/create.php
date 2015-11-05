<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	Yii::t('rdt','Locations')=>array('index'),
	Yii::t('rdt','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Locations'), 'url'=>array('index')),
	//array('label'=>Yii::t('rdt','Manage Location'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Create Location'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>