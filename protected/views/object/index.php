<?php
/* @var $this ObjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('rdt','Objects'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Create Object'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','Manage Object'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Objects'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
