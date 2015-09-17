<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Plataformas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Plataforma', 'url'=>array('index')),
	array('label'=>'Crear Plataforma', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#platform-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Plataformas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'platform-grid',
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'platformId',
		array('name'=>'vendorId', 'value'=>'$data->vendor->vendorName'),
		array('name'=>'chapterId', 'value'=>'$data->chapter->chapterName'),
		'platformName',
		'platformDescription',
		/*
		'platformImagePath',
		'platformBackgroundTextColor',
		'platformRackUnits',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
