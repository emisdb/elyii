<?php

class BbController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
//	public $layout='//layouts/main_bb_wide';
	public $pageTit='';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFF00,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

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
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','views','viewo','group','glob','result','ajaxReq','ajaxReqord','captcha'),
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
	public function actionViews($id,$side)
	{
//		$this->layout='//layouts/nocolumn';
		$ffmodel=new FindForm;
		if(isset($_POST['FindForm']))
		{
			$ffmodel->attributes=$_POST['FindForm'];
			if($bb=$ffmodel->valid())
			{
				
			if (!(is_null($bb)))
				{
					header ("Location:".Yii::app()->request->baseUrl."/index.php?r=bb/views&id=".$bb[0]."&side=".$bb[1]);
					return;
				}

			}
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id,array('pics','bbsides.sides0'=>array('order'=>'sides0.ord ASC'))),
			'side'=>$side,
			'fmodel'=>$ffmodel,
		));
	}

	public function actionCreate()
	{
		$model=new Bb;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bb']))
		{
			$model->attributes=$_POST['Bb'];
			if($this->doSave($model))
			{
                                $rid=$model->getAttribute('region_id');
                                $model->unsetAttributes();  // clear any default values
                                $model->setAttribute('region_id',$rid);
				$this->render('admin',array(
							'model'=>$model
				));
				return;
                    }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bb']))
		{
			$model->attributes=$_POST['Bb'];
			
			if($this->doSave($model)) 
			{
				$this->render('viewo',array(
							'model'=>$model,
				));
				return;
			}
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
			$op_id=null;
			$r_id=0;
			if($id!=null)
			{
				$par=Bb::model()->findByPk($id);	//original value
				if($par!=null)
				{
					$op_id=$par->next;
					$r_id=$par->region_id;
					if(($r_id!=$model->region_id)||($op_id!=$model->next))
					{
						$this->saveOldNext($model,$op_id);
						$this->saveNewNext($model);
					}
				}
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
			$par=Bb::model()->find('next=:postID', array(':postID'=>$model->next));				
		else
			$par=Bb::model()->find('next IS NULL AND region_id=:postID', 
										array(':postID'=>$model->region_id));
		if($par!=null)
		{	
                    if($par->id<>$model->id)
                    {
			$par->next=$model->id;
			$par->save();
                    }

		}
	}
	private function saveOldNext($model,$next)
	{
		$par=Bb::model()->find('next=:postID', array(':postID'=>$model->id));
		if($par!=null)
		{	
			$par->next=$next;
			$par->save();
		}
	}
	public function actionDelete($id)
	{
			if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			$this->saveOldNext($model,$model->next);
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Bb');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionGroup($id)
	{

		$list=explode(",",$id);
		$model=new Bb('search');
	    $this->pageTit = $this->maketit($id); 
		$ffmodel=new FindForm;
		if(isset($_POST['FindForm']))
		{
			$ffmodel->attributes=$_POST['FindForm'];
			if($bb=$ffmodel->valid())
			{
				
			if (!(is_null($bb)))
				{
					header ("Location:".Yii::app()->request->baseUrl."/index.php?r=bb/views&id=".$bb[0]."&side=".$bb[1]);
//					Yii::app()->runController('/bb/views/id/'.$bb->id.'/side/1');
//					$this->render('end',array('model'=>$bb));/**/
					return;
				}

			}
		}
			$this->render('viewb',array(
//			'dataProvider'=>$dataProvider,
			'model'=>$model,
			'list'=>$list,
			'fmodel'=>$ffmodel,
			));

	}
	public function actionResult($id)
	{
		$list_id="";
		$list_side="";

		$list=explode(",",$id);
		for ($i=0;$i<count($list);$i++)
		{
			$tmp=explode("_",$list[$i]);
			$list_id[]=$tmp[0];
			$list_side[]=$tmp[1];
			
		}
		$strid=implode(",",$list_id);
	    $this->pageTit = $this->maketit(substr($strid,0,strlen($strid)-1),1); 
		$cfmodel=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$cfmodel->attributes=$_POST['ContactForm'];
			if($cfmodel->validate())
			{
	/*			$headers="From: {$cfmodel->email}\r\nReply-To: {$cfmodel->email}";
				mail(Yii::app()->params['adminEmail'],$cfmodel->subject,$cfmodel->body,$headers);
				Yii::app()->user->setFlash('contact','Спасибо за заказ. Ответ последует сегодня же.');
				$this->refresh();
*/
				Yii::import('ext.yii-mail.YiiMailMessage');
				$message = new YiiMailMessage;
				$message->setBody("".$cfmodel->linky."<p>".$cfmodel->body, 'text/html');
				$message->subject = "Ref: ".$cfmodel->name." /".$cfmodel->email." /".$cfmodel->subject;
				$message->addTo('emisdb@yahoo.com');
				$message->from = Yii::app()->params['adminEmail'];
				Yii::app()->mail->send($message);
				$this->render('end',array('model'=>$cfmodel));
				return;
		}
		}

		$model=new Bb('search');
		$this->render('viewr',array(
			'model'=>$model,
			'fmodel'=>$cfmodel,
			'list'=>$list_id,
			'lists'=>$list_side,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/nocolumn';
		$model=new Bb('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bb']))
			$model->attributes=$_GET['Bb'];
 		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Bb the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id,$with='')
	{
		if ($with=='')
				$model=Bb::model()->findByPk($id);
			else
				$model=Bb::model()->with($with)->findByPk($id);
				
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Bb $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bb-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
	protected function maketit($list,$group=0)
	{
		$txt="";	
		$criteria=new CDbCriteria;
//		$criteria->addInCondition('id',$list);
		$connection=Yii::app()->db; 
		if($group==0)
			$str="SELECT id, name FROM regions WHERE id IN(".$list.")";	
		else 
			$str="SELECT DISTINCTROW regions.id, regions.name FROM regions INNER JOIN bb ON regions.id=bb.region_id WHERE bb.id IN(".$list.")";	
		$command=$connection->createCommand($str);
//		$dataReader=$command->query($criteria);
		$dataReader=$command->query();
		if(!is_null($dataReader))
		{
//			foreach($dataReader as $row) { $txt.="".$row['id'].". ".$row['name']."; "; }
			foreach($dataReader as $row) { $txt.=" ".$row['name']."; "; }
		}
		return $txt;
	}
	public function actionAjaxReq()
	{
		$val1 = $_POST['val_id'];
		$tcall=strrpos($val1,".");
		$criteria=new CDbCriteria;
		$criteria->select="name,side,ptype,id";
		if($tcall>0)
		{
			$id=(int)substr($val1,2,$tcall-2);
			$side=(int)substr($val1,$tcall+1)+1;
			$criteria->condition="bb_id=$id AND (side=0 OR side=$side)";
		}
		else
		{
			$id=(int)$val1;
			$criteria->condition="bb_id=$id";
		}
		$rows=Pics::model()->findAll($criteria);
//		$bb = Bb::model()->findByPk($id);
		$res="";
		if(!($tcall>0))		$res.="<table id=\"gtw\">";
		for($ii=0;sizeof($rows)>$ii;$ii++)
		{
			if(!($tcall>0))		$res.="<tr><td>";
			if($rows[$ii]['ptype']=='image')
			{
				$res.="<img class=\"resize\" onmouseover=\"pichover(this,event)\" onmouseout=\"picout(this)\" onmousemove=\"picmove(this,event)\" src=\"".Yii::app()->request->baseUrl."/images/".$rows[$ii]['name']."\" >";
			}
			else
			{
				$res.="<img class=\"resize\" onmouseover=\"pichover(this,event)\" onmouseout=\"picout(this)\" onmousemove=\"picmove(this,event)\" src=\"//api-maps.yandex.ru/services/constructor/1.0/static/?sid=".$rows[$ii]['name']."\" alt=\"\"/>";
				}
				if(!($tcall>0))	
				{
					$res.="</td><td>".$rows[$ii]['name']."</td>";
					$res.="<td>[".$rows[$ii]['side']."];".$rows[$ii]['ptype']."</td>";
					$res.="<td class=\"button-column\">";
					$res.=CHtml::link(
					CHtml::image(Yii::app()->request->baseUrl."/css/buts/update.png","Редактировать" ),
					array("pics/update","id"=>$rows[$ii]['id']),
					array('title'=>'Редактировать','target'=>'_blank'));
					$res.=CHtml::link(
					CHtml::image(Yii::app()->request->baseUrl."/css/buts/delete.png","Удалить" ),
					array("pics/delete","id"=>$rows[$ii]['id']),
					array('class'=>'delete','title'=>'Удалить','onclick'=>'return confirm("Удаляем картинку?")'));						
					$res.="</td></tr>";
				}
		} 
		if(!($tcall>0))		$res.="</table>";

	  echo $res;
	 
	  Yii::app()->end();
	}	
		public function actionAjaxReqord()
	{
		$val1 = $_POST['p_id'];
		$val2 = $_POST['c_id'];
		$this->widget('ext.OrderlistWidget',array('model'=>Bb::model(),
								'columns'=>array('id','num','name'),
								'class'=>'nx',
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
