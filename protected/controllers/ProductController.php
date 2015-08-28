<?php

class ProductController extends GxController {

	public $layout = "//layouts/admin_layout";

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Product'),
		));
	}

	public function actionCreate() {
		$model = new Product;


		if (isset($_POST['Product'])) {
			$model->setAttributes($_POST['Product']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Product');


		if (isset($_POST['Product'])) {
			$model->setAttributes($_POST['Product']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Product')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Product');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Product('search');
		$model->unsetAttributes();

		if (isset($_GET['Product']))
			$model->setAttributes($_GET['Product']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionrender(){

		$vh65 = $_POST['h65'];
		ob_start();
		system('ipconfig /all'); 
		$mycom=ob_get_contents(); 
		ob_clean(); 

		$findme = 'Physical';
		$pmac = strpos($mycom, $findme); 
		$h65=substr($mycom,($pmac+36),17); 

		$flag = 0;

		foreach($vh65 as $val){
		if($h65 === $val){
				$flag = 1;
				break;
			}
		}

		if($flag==0){echo "0";}else{echo "1";}

	}

}