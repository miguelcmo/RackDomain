<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Pdu Types'=>array('index'),
	$model->pduTypeId=>array('view','id'=>$model->pduTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List PduType', 'url'=>array('index')),
	array('label'=>'Create PduType', 'url'=>array('create')),
	array('label'=>'View PduType', 'url'=>array('view', 'id'=>$model->pduTypeId)),
	array('label'=>'Manage PduType', 'url'=>array('admin')),
);
?>

<h1>Update PduType <?php echo $model->pduTypeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>