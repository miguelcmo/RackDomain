<?php
/* @var $this PduTypeController */
/* @var $model PduType */

$this->breadcrumbs=array(
	'Tipos de Pdu'=>array('index'),
	$model->pduTypeId=>array('view','id'=>$model->pduTypeId),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Pdu', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Pdu', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Pdu', 'url'=>array('view', 'id'=>$model->pduTypeId)),
	array('label'=>'Administrar Tipo de Pdu', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Pdu <?php echo $model->pduTypeName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>