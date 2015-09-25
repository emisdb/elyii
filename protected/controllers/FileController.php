<?php
class ItemController extends CController {
    public function actionCreate(){
        $model=new FileForm;
        if(isset($_POST['FileForm'])){
            $model->attributes=$_POST['FileForm'];
            $model->image=CUploadedFile::getInstance($model,'image');
 			var_dump($model->image);
			echo "<hr>";
			if (is_object($model->image)) {          
				echo "File yes";
			} else {
				echo "File no";
			}  
   			return;
           if($model->save()){
                $model->image->saveAs('path/to/localFile');
                // перенаправляем на страницу, где выводим сообщение об
                // успешной загрузке
            }
        }
        $this->render('create', array('model'=>$model));
    }
}
?>