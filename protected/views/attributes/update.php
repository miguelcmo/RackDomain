<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	Yii::t('viewst','Attributes')=>array('index'),
	$model->attributeId=>array('view','id'=>$model->attributeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Attributes', 'url'=>array('index')),
	array('label'=>'Create Attributes', 'url'=>array('create')),
	array('label'=>'View Attributes', 'url'=>array('view', 'id'=>$model->attributeId)),
	array('label'=>'Manage Attributes', 'url'=>array('admin')),
);
?>

<h1>Update Attributes <?php echo $model->attributeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>