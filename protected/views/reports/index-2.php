<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('rdt','Locations'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Create Location'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','Manage Location'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Locations'); ?></h1>

<p><?php echo CHtml::link('ver grafica de ejemplo', array('graphview')); ?></p>

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewown',
));  
?>
