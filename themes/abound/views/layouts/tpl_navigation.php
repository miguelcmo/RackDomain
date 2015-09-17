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
						
						array('label'=>'Locations', 'url'=>array('/location/index'), 'visible'=>!Yii::app()->user->isGuest),
						
						array('label'=>'Requests', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'visible'=>!Yii::app()->user->isGuest,
						'items'=>array(
                            array('label'=>'Civil', 'url'=>array('/requestCivil')),
							array('label'=>'Fuel', 'url'=>array('/requestFuel')),
							array('label'=>'HVAC', 'url'=>array('/requestHvac')),
							array('label'=>'Power', 'url'=>array('/requestPower')),
							array('label'=>'Setup Module', 'url'=>'#', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                        )),
                        
						
						array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'visible'=>!Yii::app()->user->isGuest,
						'items'=>array(
                            array('label'=>Yii::app()->getModule('user')->t("My Profile"), 'url'=>Yii::app()->getModule('user')->profileUrl),
							array('label'=>'My Messages <span class="badge badge-warning">-</span>', 'url'=>'#'),
							array('label'=>'My Tasks <span class="badge badge-important">-</span>', 'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info">-</span>', 'url'=>'#'),//class="badge badge-info pull-right"
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
<?php /*
<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->
*/ ?>