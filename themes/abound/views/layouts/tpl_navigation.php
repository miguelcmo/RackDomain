<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo Yii::app()->baseurl; ?>"><b>Rack Domain </b><small>admin version v0.1</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        
						array('label'=>'Admin <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
                        'visible'=>Yii::app()->getModule('user')->isAdmin(),
						'items'=>array(
							array('label'=>'Attributes', 'url'=>array('/attributes')),
							array('label'=>'Chapter', 'url'=>array('/chapter')),
							array('label'=>'City', 'url'=>array('/city')),
							array('label'=>'Country', 'url'=>array('/country')),
							array('label'=>'Department', 'url'=>array('/department')),
							array('label'=>'Object', 'url'=>array('/object')),
							array('label'=>'Platform', 'url'=>array('/platform')),
							array('label'=>'Rack', 'url'=>array('/rack')),
							array('label'=>'Room', 'url'=>array('/room')),
							array('label'=>'Row', 'url'=>array('/row')),
							array('label'=>'Location', 'url'=>array('/location')),
							array('label'=>'User', 'url'=>array('/user')),
							array('label'=>'Vendor', 'url'=>array('/vendor')),
							array('label'=>'Rights', 'url'=>array('/rights')),
							array('label'=>'Gii', 'url'=>array('/gii')),
							//array('label'=>'', 'url'=>array('/')),
						)),
						/*
						array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
						array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
						
						array('label'=>Yii::t('menutranslation','Locations'), 'url'=>array('/location/index'), 'visible'=>!Yii::app()->user->isGuest),
						
						array('label'=>Yii::t('menutranslation','Requests'), 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'visible'=>!Yii::app()->user->isGuest,
						'items'=>array(
                            array('label'=>Yii::t('menutranslation','Civil'), 'url'=>array('/requestCivil')),
							array('label'=>Yii::t('menutranslation','Fuel'), 'url'=>array('/requestFuel')),
							array('label'=>Yii::t('menutranslation','HVAC'), 'url'=>array('/requestHvac')),
							array('label'=>Yii::t('menutranslation','Power'), 'url'=>array('/requestPower')),
							array('label'=>Yii::t('menutranslation','Setup Module'), 'url'=>'#', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                        )),
                        
						
						array('label'=>Yii::t('menutranslation','My Account <span class="caret"></span>'), 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'visible'=>!Yii::app()->user->isGuest,
						'items'=>array(
                            array('label'=>Yii::app()->getModule('user')->t("My Profile"), 'url'=>Yii::app()->getModule('user')->profileUrl),
							array('label'=>Yii::t('menutranslation','My Messages <span class="badge badge-warning">-</span>'), 'url'=>'#'),
							array('label'=>Yii::t('menutranslation','My Tasks <span class="badge badge-important">-</span>'), 'url'=>'#'),
							array('label'=>Yii::t('menutranslation','My Invoices <span class="badge badge-info">-</span>'), 'url'=>'#'),//class="badge badge-info pull-right"
							//array('label'=>'Separated link', 'url'=>'#'),
							//array('label'=>'One more separated link', 'url'=>'#'),
                        )),
						
                        //array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        //array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
						//array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
			
						array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),

                    ),
                )); ?>
    	</div>
    </div>
	
	<!-- Language Selector Widget -->
	<div  id="language-selector">
	<?php $this->widget('application.components.widgets.LanguageSelector'); ?>
	</div>
	
	</div>
</div>