<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>

<div id="rights" class="container">
<div id="menu">

	<?php $this->renderPartial('/_menu'); ?>

</div>

<div class="createAuthItem">

	<h2><?php echo Rights::t('core', 'Create :type', array(
		':type'=>Rights::getAuthItemTypeName($_GET['type']),
	)); ?></h2>

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>

</div>
</div>
