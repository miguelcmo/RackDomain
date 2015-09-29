<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
$this->menu=array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin'), 'visible'=>UserModule::isAdmin()),
	array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'), 'visible'=>UserModule::isAdmin()),
);
?>

<div id="user">
<h1><?php echo UserModule::t("List User"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
	),
)); ?>
</div>
