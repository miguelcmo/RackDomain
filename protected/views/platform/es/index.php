<?php
/* @var $this PlatformController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plataformas',
);

$this->menu=array(
	array('label'=>'Crear Plataforma', 'url'=>array('create')),
	array('label'=>'Administrar Plataforma', 'url'=>array('admin')),
);
?>

<h1>Plataformas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
