<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('/user/admin')),
	array('label'=>'Manage Profile Field', 'url'=>array('admin')),
	array('label'=>'Create Profile Field', 'url'=>array('create')),
	array('label'=>'View Profile Field', 'url'=>array('view','id'=>$model->id)),
);
?>

<h1><?php echo UserModule::t('Update ProfileField ').$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>