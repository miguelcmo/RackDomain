<?php
/* @var $this RowController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('rdt','Rows'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Create Row'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','Manage Row'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Rows'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
