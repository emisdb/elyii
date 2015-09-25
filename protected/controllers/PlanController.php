<?php

class PlanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
//	public $layout='//layouts/nocolumn';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ajaxReqord'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
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
	}

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
		$model=new Plan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Plan']))
		{
			$model->attributes=$_POST['Plan'];
//			if($model->save())
//				$this->render('end',array('model'=>$model));
			if($this->doSave($model))
				$this->render('end',array('model'=>$model,'ii'=>true));
//				$this->redirect(array('view','id'=>$model->id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Plan']))
		{
			$model->attributes=$_POST['Plan'];

//			if($model->save())
			if($this->doSave($model)) 
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
	));
		}
	private function doSave($model)
	{
		$transaction=$model->dbConnection->beginTransaction();
		try
		{
			$id=$model->id;
			$np=$model->next;
			$op_id=null;
			$r_id=0;
			$criteria=new CDbCriteria;
//			print_r($model);			echo	"<hr>";
			if($id!=null)
			{
				$par=Plan::model()->findByPk($id);	//original value
				if($par!=null)
				{
					$op_id=$par->next;
					$r_id=$par->region_id;
				}
				if($model->ptype=='line')
				{
					$this->saveOldNext($model,$op_id);
					$this->saveNewNext($model);
				}
	//			return;
				$ii=$model->save();
			}
			else
			{
				$ii=$model->save();
				$this->saveNewNext($model);
			}
			$transaction->commit();
			return true;
		}
		catch(Exception $e)
		{
			$transaction->rollback();
			return false;
		}
	}
	private function saveNewNext($model)
	{
		if($model->next!=null)
			$par=Plan::model()->find('next=:postID', array(':postID'=>$model->next));				
		else
			$par=Plan::model()->find('next IS NULL AND region_id=:postID', 
										array(':postID'=>$model->region_id));
		if($par!=null)
		{	
//			print_r($par);			echo	"<hr>";			return;
			$par->next=$model->id;
			$par->save();

		}
	}
	private function saveOldNext($model,$next)
	{
		$par=Plan::model()->find('next=:postID', array(':postID'=>$model->id));
		if($par!=null)
		{	
			$par->next=$next;
			$par->save();
//			print_r($par);			echo	"<hr>";			return;
		}
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again. POstreq:<br>'.print_r(Yii::app()->request));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Plan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/nocolumn';
		$model=new Plan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Plan']))
			$model->attributes=$_GET['Plan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Plan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='plan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
		public function actionAjaxReqord()
	{
		$val1 = $_POST['p_id'];
		$val2 = $_POST['c_id'];
		$this->widget('ext.OrderlistWidget',array('model'=>Plan::model(),
								'columns'=>array('id','coox','cooy'),
								'class'=>'nx',
								'filter'=>'ptype="line"',
								'id'=>'id',
								'togo'=>'##',
								'next'=>'next',
								'par_id'=>$val1,
								'cur_id'=>$val2,
								'par'=>'region_id',
								'level'=>1));

	 
	  Yii::app()->end();
	}
}
