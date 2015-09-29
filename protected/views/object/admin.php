<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	Yii::t('viewst','Objects')=>array('index'),
	Yii::t('viewst','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','List Object'), 'url'=>array('index')),
	array('label'=>Yii::t('viewst','Create Object'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#object-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('viewst','Manage Objects'); ?></h1>

<p><?php echo
Yii::t('viewst','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php echo CHtml::link(Yii::t('viewst','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'object-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'objectId',
		'platformId',
		'objectName',
		'objectAlias',
		'objectDescription',
		'createTime',
		/*
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
