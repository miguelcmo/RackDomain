<?php
/* @var $this TestUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Users',
);

$this->menu=array(
	array('label'=>'Create TestUser', 'url'=>array('create')),
	array('label'=>'Manage TestUser', 'url'=>array('admin')),
);
?>

<h1>Test Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
