<?php
/* @var $this ObjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('viewst','Objects'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Create Object'), 'url'=>array('create')),
	array('label'=>Yii::t('viewst','Manage Object'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Objects'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
