<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);
$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'List User', 'url'=>array('/user')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Manage Profile Field', 'url'=>array('profileField/admin')),
);
?>

<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php 
	$attributes = array(
		//'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		//'password',
		'email',
		//'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'itemCssClass'=>'table table-striped',
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
