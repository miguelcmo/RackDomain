<?php
/* @var $this RowController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('viewst','Rows'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Create Row'), 'url'=>array('create')),
	array('label'=>Yii::t('viewst','Manage Row'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Rows'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
