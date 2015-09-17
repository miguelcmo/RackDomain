<?php
/* @var $this AttributesController */
/* @var $model Attributes */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Atributos', 'url'=>array('index')),
	array('label'=>'Crear Atributos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#attributes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Atributos</h1>

<p>
Opcionalmente puede usar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada uno de los valores de busqueda para especificar como debe ser hecha la comparación.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attributes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'attributeId',
		'attributeName',
		'attributeDescription',
		'createTime',
		'createUserId',
		'updateTime',
		/*
		'updateUserId',
		'Satus',
		'Flag',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
