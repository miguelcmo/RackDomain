<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	$model->locationName=>array('view','id'=>$model->locationId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('view', 'id'=>$model->locationId)),
);
?>

<h1>Actualizar Locación <?php echo $model->locationName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>