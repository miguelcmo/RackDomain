<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Plataformas'=>array('index'),
	$model->platformId,
);

$this->menu=array(
	array('label'=>'Listar Plataforma', 'url'=>array('index')),
	array('label'=>'Crear Plataforma', 'url'=>array('create')),
	array('label'=>'Actualizar Plataforma', 'url'=>array('update', 'id'=>$model->platformId)),
	array('label'=>'Eliminar Plataforma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->platformId),'confirm'=>'Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Plataforma', 'url'=>array('admin')),
);
?>

<h1>Ver Plataforma <?php echo $model->platformName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'platformId',
		array(
			'name'=>'vendorId',
			'value'=>isset($model->vendor)?CHtml::encode($model->vendor->vendorName):"Desconocido"
		),
		array(
			'name'=>'chapterId',
			'value'=>isset($model->chapter)?CHtml::encode($model->chapter->chapterName):"Desconocido"
		),
		'platformName',
		'platformDescription',
		//'platformImagePath',
		//'platformBackgroundTextColor',
		//'platformRackUnits',
		//'createTime',
		//'createUserId',
		//'updateTime',
		//'updateUserId',
		//'Status',
		//'Flag',
	),
)); ?>
