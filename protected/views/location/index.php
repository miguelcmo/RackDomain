<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('viewst','Locations'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Create Location'), 'url'=>array('create')),
	//array('label'=>Yii::t('viewst','Manage Location'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Locations'); ?></h1>

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewown',
));  
?>
