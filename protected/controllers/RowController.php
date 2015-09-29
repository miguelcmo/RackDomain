<?php

class RowController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * @var private property containing the associated Room model instance.
	 */
	private $_room = null;
	
	public $_count = null;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'roomContext + create index admin',
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
	
	public function setLocationId($id)//$id del controlador
	{
		$model = Row::model()->findByPk($id);
		$lid = $model->room->location->locationId;
		Yii::app()->user->setState('lid',$lid);
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->setLocationId($id);
		
		$rackDataProvider=new CActiveDataProvider('Rack', array(
			'criteria'=>array(
				'select'=>'tbl_rack.rackId, tbl_rack.rackName, tbl_rack_type.thumbnailPath as rackThumb',
				'alias'=>'tbl_rack',
				'with'=>'rackType0',
				'condition'=>'rowId=:rowId',
				'join'=>'INNER JOIN tbl_rack_type ON tbl_rack_type.rackTypeId=tbl_rack.rackType',
				'params'=>array(':rowId'=>$id),
				'order'=>'sortOrder ASC',
			),
			'pagination'=>false,
		));
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'rackDataProvider'=>$rackDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Row;
		
		//Assign the value of the roomId parameter before the create action
		$model->roomId = $this->_room->roomId;
		//$model->rowNameId = $this->_count;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Row']))
		{
			$model->attributes=$_POST['Row'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rowId));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Row']))
		{
			$model->attributes=$_POST['Row'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rowId));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('room/view', 'id'=>$rid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Row');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Row('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Row']))
			$model->attributes=$_GET['Row'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Row the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Row::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('controllerstranslation','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Row $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='row-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Protected method to load the associated Room model class
	 * @param integer roomId the primary identifier of the associated Room
	 * @return object the Room data model based on the primary key
	 */
	protected function loadRoom($roomId)
	{
		//if the room property is null, create it based on input id
		if($this->_room===null)
		{
			$this->_room=Room::model()->findByPk($roomId);
			if($this->_room===null)
			{
				throw new CHttpException(404,Yii::t('controllerstranslation','The requested room does not exist.'));
			}
		}
		return $this->_room;
	}
	
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper room context
	 */
	public function filterRoomContext($filterChain)
	{
		//set the room identifier based on GET input request variables
		if(isset($_GET['rid']))
		{	
			$this->loadRoom($_GET['rid']);
			//$this->getAvailableRowName($_GET['rid']);
		}
		else {
			throw new CHttpException(403, Yii::t('controllerstranslation','Must specify a room before performing this action.'));
		}
		
		$model = Room::model()->findByPk($this->_room->roomId);
		$lid = $model->location->locationId;
		Yii::app()->user->setState('lid',$lid);
		//complete the running of other filters and execute the requested action
		$filterChain->run();
	}
	
	/**
	 * Count the total number or rows created on a specific room
	 * @param integer the value of the room id
	 * @return string with the number of the rows
	 */
	public function getAvailableRowName($roomId)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'roomId=:roomId';
		$criteria->params = array(':roomId'=>$roomId);
		$this->_count = Row::model()->count($criteria) + 1;
	
		return $this->_count;
	}
}
