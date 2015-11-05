<?php
/* @var $this PduController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('rdt','Pdus'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Create Pdu'), 'url'=>array('create')),
	array('label'=>Yii::t('rdt','Manage Pdu'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('rdt','Pdus'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
