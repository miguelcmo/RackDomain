<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('viewst','Racks'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Create Rack'), 'url'=>array('create')),
	array('label'=>Yii::t('viewst','Manage Rack'), 'url'=>array('admin')),
);
?>

<h1><?php Yii::t('viewst','Racks'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
