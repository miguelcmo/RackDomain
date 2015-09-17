<?php
/* @var $this CountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Países',
);

$this->menu=array(
	array('label'=>'Crear País', 'url'=>array('create')),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Países</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
