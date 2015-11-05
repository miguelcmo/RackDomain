<?php

class RequestFuelController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
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
		//$modelDepartment=new Department;
		$model=new RequestFuel;
		
		$model->requesterId = Yii::app()->user->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestFuel']))
		{
			$_location = Location::model()->findByAttributes(array('locationName'=>$_POST['RequestFuel']['requestLocationId']));
			$_user = User::model()->findByAttributes(array('username'=>$_POST['RequestFuel']['onSiteContactId']));
			$_fuelType = FuelType::model()->findByPk($_POST['RequestFuel']['fuelTypeId']);
			$model->attributes=$_POST['RequestFuel'];
			$model->requestLocationId = $_location->locationId;
			$model->onSiteContactId = $_user->id;
			$userPhone=3143300598;
			$requestMail=$this->sendRequestMail(
				Yii::app()->user->name,
				$_POST['RequestFuel']['requestLocationId'],
				$_POST['RequestFuel']['fuelQty'],
				$_fuelType->fuelTypeName,
				$_POST['RequestFuel']['onSiteContactId'],
				$userPhone,
				$_POST['RequestFuel']['requestFuelNotes']
			);
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->requestFuelId));
		}

		$this->render('create',array(
			'model'=>$model,
			//'modelDepartment'=>$modelDepartment,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestFuel']))
		{
			$model->attributes=$_POST['RequestFuel'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->requestFuelId));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RequestFuel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestFuel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestFuel']))
			$model->attributes=$_GET['RequestFuel'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestFuel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestFuel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('rdt','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RequestFuel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-fuel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function createLocationList()
	{
		$sql = "SELECT locationId, locationName FROM tbl_location";
		$command = Yii::app()->db->createCommand($sql);
		$rows = $command->queryAll();
		//format it for use with auto complete widget
		$locations = array();
		foreach($rows as $row)
		{
			$locations[]=$row['locationName'];
		}
		return $locations;
	}
	
	public function createUsernameList()
	{
		$sql = "SELECT username FROM tbl_users";
		$command = Yii::app()->db->createCommand($sql);
		$rows = $command->queryAll();
		//format it for use with auto complete widget
		$usernames = array();
		foreach($rows as $row)
		{
			$usernames[]=$row['username'];
		}
		return $usernames;
	}	
	
	/*
	 * Returns a list of Fuel Types
	 */
	public function getFuelTypeOptions()
	{
		$fuelType = FuelType::model()->findAll();
		return CHtml::listData($fuelType, 'fuelTypeId', 'fuelTypeName');
	}
	
	/**
	 * Send an E-mail with the request to the person related
	 */
	public function sendRequestMail($requester,$location,$fuelQty,$fuelType,$onSiteContact,$contactPhone,$notes)
	{
		Yii::import('application.controllers.MailController');
		$email = 'miguel.carrillo@hotmail.com';
		$subject = 'Fuel request for location '; 
		$message = '<p>There is a fuel request by '.$requester.'</p>
			<p><b>Location name:</b> '.$location.'</p>
			<p><b>Request:</b> '.$fuelQty.' gallons of '.$fuelType.'</p>
			<p><b>On site contact:</b> Contact to '.$onSiteContact.' at mobile '.$contactPhone.'</p>
			<p><b>Request Notes:</b> '.$notes.'</p>
		';
		MailController::sendMail($email,$subject,$message);
	}
}