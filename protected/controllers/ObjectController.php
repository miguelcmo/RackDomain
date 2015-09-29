<?php

class ObjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * @var private property containing the associated Row model instance.
	 */
	private $_rack = null;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'rackContext + create index admin',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	} */
	
	public function setLocationId($id)
	{
		$model = Object::model()->findByPk($id);
		$lid = $model->rackSpace->rack->row->room->location->locationId;
		Yii::app()->user->setState('lid',$lid);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->setLocationId($id);
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{	
		//Generates a list of available objects on a specific rack, to use in the graphical rack rendering in the view file
		$rackSpaceView = Yii::app()->db->createCommand()
			->select('tbl_rack_space.objectId, tbl_rack_space.initialRU, tbl_platform.platformImagePath')
			->from('tbl_rack_space')
			->join('tbl_object', 'tbl_rack_space.objectId = tbl_object.objectId')
			->join('tbl_platform', 'tbl_object.platformId = tbl_platform.platformId')
			->where('rackId=:rackId', array(':rackId'=>$this->_rack->rackId))
			->queryAll();
	
		$model=new Object;
		$modelRack=Rack::model()->findByPk($this->_rack->rackId);
		$rackSpace=new RackSpace;
		
		//$this->performAjaxValidation(array($model,$rackSpace));
		
		if(isset($_POST['Object'], $_POST['RackSpace']))
		{
			//populate input data to $model and $rackSpace
			$model->attributes = $_POST['Object'];
			
			$endRU=Platform::model()->findByPk($_POST['Object']['platformId']);
			//FK objectId has a temporary value as zero to validate
			$rackSpace->objectId=0;
			$rackSpace->rackId=$this->_rack->rackId;
			if($_POST['ruleOrder']==1){
				$rackSpace->initialRU=($modelRack->rackType0->rackUnits+1)-$_POST['RackSpace']['initialRU'];
			} else{
				$rackSpace->initialRU=$_POST['RackSpace']['initialRU'];
			}
			$rackSpace->endRU=$rackSpace->initialRU+$endRU->platformRackUnits-1;
			
			$valid = $model->validate();
			$valid = $rackSpace->validate() && $valid;
			//$valid = $this->validateAvailableSpace($initialRU=$_POST['RackSpace']['initialRU'],$endRU=$_POST['RackSpace']['initialRU']+$endRU->platformRackUnits) && $valid;
			$valid = $this->validateAvailableSpace($rackSpace->initialRU,$rackSpace->initialRU+$endRU->platformRackUnits,$modelRack->rackType0->rackUnits) && $valid;
			
			if($valid)
			{
				//use false parameter to disable validation
				if($model->save())
				{
					$rackSpace->objectId=$model->objectId;
					$rackSpace->save();
					if($rackSpace->save())
					{
						$this->redirect(array('create','rid'=>$this->_rack->rackId));
					}
				}
			} else 
				throw new CHttpException(409,Yii::t('controllerstranslation','The requested space for the new object is not available.'));
		}
		$this->render('create',array(
			'model'=>$model,
			'modelRack'=>$modelRack,
			'rackSpace'=>$rackSpace,
			'rackSpaceView'=>$rackSpaceView,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->setLocationId($id);
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Object']))
		{
			$model->attributes=$_POST['Object'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->objectId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$rid)
	{
		$this->setLocationId($id);
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('rack/view', 'id'=>$rid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Object');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Object('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Object']))
			$model->attributes=$_GET['Object'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Object the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Object::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('controllerstranslation','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Object $model the model to be validated
	 */
	protected function performAjaxValidation($models)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='object-form')
		{
			echo CActiveForm::validate($models);
			Yii::app()->end();
		}
	}
	
	/**
	 * Protected method to load the associated Rack model class
	 * @param integer rackId the primary identifier of the associated Rack
	 * @return object the Rack data model based on the primary key
	 */
	public function loadRack($rackId)
	{
		//if the row property is null, create it based on input id
		if($this->_rack===null)
		{
			$this->_rack=Rack::model()->findByPk($rackId);
			if($this->_rack===null)
			{
				throw new CHttpException(404, Yii::t('controllerstranslation','The requested row does not exist.'));
			}
		}
		return $this->_rack;
	}
	
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper rack context
	 */
	public function filterRackContext($filterChain)
	{
		//Set the row identifier based on GET input request variables
		if(isset($_GET['rid']))
		{
			$this->loadRack($_GET['rid']);
		}
		else {
			throw new CHttpException(403, Yii::t('controllerstranslation','Must specify a row before performing this action.'));
		}
		
		$model = Rack::model()->findByPk($this->_rack->rackId);
		$lid = $model->row->room->location->locationId;
		Yii::app()->user->setState('lid',$lid);
		//complete the running of the filters and execute the requested action
		$filterChain->run();
	}
	
	public function getPlatformOptions()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'platformName ASC';
		$platform = Platform::model()->findAll($criteria);
		return CHtml::listData($platform,'platformId','platformName');
	}
	
	public function validateAvailableSpace($initialRU,$endRU,$rackUnits) 
	{
		if($endRU<=($rackUnits+1))
		{
			$criteria = new CDbCriteria();
			$criteria->select = 'initialRU, endRU';
			$criteria->condition = 'rackId=:rackId';
			$criteria->params = array(':rackId'=>$this->_rack->rackId);
			$criteria->order = 'initialRU ASC';
			$usedSpace=RackSpace::model()->findAll($criteria);
		
			foreach ($usedSpace as $value){
				for($i=$initialRU;$i<$endRU;$i++){
					if($i>=$value['initialRU'] && $i<=$value['endRU']){
						return false;
					}
				}
			}
			return true;
		} else{
			return false;
		}
	}
	
	public function getVendorOptions()
	{
		$model = Vendor::model()->findAll();
		return CHtml::listData($model,'vendorId','vendorName');
	}
	
	public function actionPlatformByVendorOptions()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'vendorId=:vendorId';
		$criteria->params = array(':vendorId'=>$_POST['vendorId']);
		$model = Platform::model()->findAll($criteria);
		$platform = CHtml::listData($model,'platformId','platformName');
		foreach($platform as $value=>$platformName)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($platformName),true);
		}
	}
	
	public function getChapterOptions()
	{
		$model = Chapter::model()->findAll();
		return CHtml::listData($model,'chapterId','chapterName');
	}
	
	public function actionPlatformByChapterOptions()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'chapterId=:chapterId';
		$criteria->params = array(':chapterId'=>$_POST['chapterId']);
		$model = Platform::model()->findAll($criteria);
		$platform = CHtml::listData($model,'platformId','platformName');
		foreach($platform as $value=>$platformName)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($platformName),true);
		}
	}
}
