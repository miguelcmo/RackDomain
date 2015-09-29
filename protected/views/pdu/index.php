<?php
/* @var $this PduController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('viewst','Pdus'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Create Pdu'), 'url'=>array('create')),
	array('label'=>Yii::t('viewst','Manage Pdu'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Pdus'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
