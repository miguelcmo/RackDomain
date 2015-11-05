<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('rdt','Racks'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Create Rack'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','Manage Rack'), 'url'=>array('admin')),
);
?>

<h1><?php Yii::t('rdt','Racks'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
