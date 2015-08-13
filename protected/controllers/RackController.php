<?php


class RackController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * @var private property containing the associated Row model instance.
	 */
	private $_row = null;
	
	/**
	 * @var public property containing the number of rack under a specific row
	 */
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
			'rowContext + create index admin order',
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
				'actions'=>array('create','update','order'),
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
		$rackSpaceView = Yii::app()->db->createCommand()
			->select('tbl_rack_space.objectId, tbl_rack_space.initialRU, tbl_platform.platformImagePath')
			->from('tbl_rack_space')
			->join('tbl_object', 'tbl_rack_space.objectId = tbl_object.objectId')
			->join('tbl_platform', 'tbl_object.platformId = tbl_platform.platformId')
			->where('rackId=:rackId', array(':rackId'=>$id))
			->queryAll();
			
	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'rackSpaceView'=>$rackSpaceView,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		//Load the model and create an array with all available racks in the present row
		$rackDataProvider=new CActiveDataProvider('Rack', array(
			'criteria'=>array(
				'condition'=>'rowId=:rowId',
				'params'=>array(':rowId'=>$this->_row->rowId),
				'order'=>'sortOrder ASC',
			),
			'pagination'=>false,
		));
		
		$model=new Rack;

		//Assign the value of the rowId parameter before the create action
		$model->rowId = $this->_row->rowId;
		
		//Set the value of rack position in row
		$model->sortOrder = $this->_count;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rack']))
		{
			$model->attributes=$_POST['Rack'];
			if($model->save())
				$this->redirect(array('create','rid'=>$this->_row->rowId));
		}

		$this->render('create',array(
			'model'=>$model,
			'rackDataProvider'=>$rackDataProvider,
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

		if(isset($_POST['Rack']))
		{
			$model->attributes=$_POST['Rack'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rackId));
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
		$dataProvider=new CActiveDataProvider('Rack');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Lists all models on a specific row $rid is rowId
	 */
	public function actionOrder($rid)
	{
		// Handle the POST request data submission
		if (isset($_POST['Order']))
		{
			// Since we converted the Javascript array to a string,
			// convert the string back to a PHP array
			$models = explode(',', $_POST['Order']);
	
			for ($i = 0; $i < sizeof($models); $i++)
			{
				if ($model = Rack::model()->findbyPk($models[$i]))
				{
					// Use updateByPK to avoid running model validate
					$model->updateByPk( $models[$i],array("sortOrder"=>$i) );
				}
			}
		}
		// Handle the regular model order view
		else
		{
			$dataProvider = new CActiveDataProvider('Rack', array(
				'pagination' => false,
				'criteria' => array(
					'condition' => 'rowId=:rowId',
					'params' => array(':rowId'=>$this->_row->rowId),
					'order' => 'sortOrder ASC',
				),
			));
 
			$model=Row::model()->findByPk($rid);
			$this->render('order',array(
				'dataProvider' => $dataProvider,
				'model'=>$model,
			));
		}
	}
	
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rack']))
			$model->attributes=$_GET['Rack'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
	 * Protected method to load the associated Row model class
	 * @param integer rowId the primary identifier of the associated Row
	 * @return object the Row data model based on the primary key
	 */
	public function loadRow($rowId)
	{
		//if the row property is null, create it based on input id
		if($this->_row===null)
		{
			$this->_row=Row::model()->findByPk($rowId);
			if($this->_row===null)
			{
				throw new CHttpException(404, 'The requested row does not exist.');
			}
		}
		return $this->_row;
	}
	
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper row context
	 */
	public function filterRowContext($filterChain)
	{
		//Set the row identifier based on GET input request variables
		if(isset($_GET['rid']))
		{
			$this->loadRow($_GET['rid']);
			$this->getAvailableRackCount($_GET['rid']);
		}
		else 
			throw new CHttpException(403, 'Must specify a row before performing this action.');
		
		//complete the running of the filters and execute the requested action
		$filterChain->run();
	}	
	
	/**
	 * Count the total number of racks created on a specific row
	 * @param integer the value of the row id
	 * @return string with the number of the racks
	 */
	public function getAvailableRackCount($rowId)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'rowId=:rowId';
		$criteria->params = array(':rowId'=>$rowId);
		$this->_count = Rack::model()->count($criteria) + 1;
		
		return $this->_count;
	}
	
	/*
	 * Returns a list of valid rack type available
	 */
	public function getRackTypeOptions()
	{
		$criteria=new CDbCriteria();
		$criteria->order='rackTypeName ASC';
		$rackType=RackType::model()->findAll($criteria);
		return CHtml::listData($rackType,'rackTypeId','rackTypeName');
	}
}	
