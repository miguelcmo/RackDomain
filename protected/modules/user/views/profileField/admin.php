<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('/user/admin')),
	//array('label'=>'Manage Profile Field', 'url'=>array('admin')),
	array('label'=>'Create Profile Field', 'url'=>array('create')),
);
?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'varname',
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		'field_type',
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
		),
		//*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
