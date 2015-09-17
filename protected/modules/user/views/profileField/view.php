<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t($model->title),
);
$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('/user/admin')),
	array('label'=>'Manage Profile Field', 'url'=>array('admin')),
	array('label'=>'Create Profile Field', 'url'=>array('create')),
	array('label'=>'Update Profile Field', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Profile Field', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
);
?>
<h1><?php echo UserModule::t('View Profile Field #').$model->varname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'itemCssClass'=>'table table-striped',
	'data'=>$model,
	'attributes'=>array(
		'id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
	),
)); ?>
