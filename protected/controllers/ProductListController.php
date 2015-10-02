<?php

class ProductListController extends GxController {

	public $layout = "//layouts/admin_layout";
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ProductList'),
		));
	}

	public function actionCreate() {
		$model = new ProductList;


		if (isset($_POST['ProductList'])) {
			$model->setAttributes($_POST['ProductList']);

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
		$model = $this->loadModel($id, 'ProductList');


		if (isset($_POST['ProductList'])) {
			$model->setAttributes($_POST['ProductList']);

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
			$this->loadModel($id, 'ProductList')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ProductList');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ProductList('search');
		$model->unsetAttributes();

		if (isset($_GET['ProductList']))
			$model->setAttributes($_GET['ProductList']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	//Function to return a row element with product information for ajax call
	public function actionGetProduct(){
		if(isset($_POST['product_id'])&&!empty($_POST['product_id'])){

			$row['product_id'] = $_POST['product_id'];
			try{
				$database = Yii::app()->db;//Access database object
				$query = $database->createCommand()
					->select('name,type,price')
					->from('tbl_product p')
					->where('id=:id', array(':id' => $row['product_id']))
					->queryRow();

				if(count($query)==1){
					$row['message'] = 'No product found under this product id';
				}
				else{
					$row['message'] = '';
				}
				$row['count'] = count($query);
				$row['data'] = '<tr>
            <td>'.$row['product_id'].'</td>
            <td>'.$query["name"].'</td>
            <td>'.$query["type"].'</td>
            <td>'.$query["price"].'</td>
            <td class="button-column">
                <a data-rowid="'.$row['product_id'].'" href="#" title="Remove element" class="removeProduct">
                    <img alt="Delete" src="/ims/assets/44d6bae9/gridview/delete.png"></a>
            </td>
        </tr>';
				echo  json_encode($row);//Return a row with data of products.
			}catch(Exception $e){
				return false;//Return invalid if query execution fails.
			}
		}else{

			$row['message'] = 'Please enter a product id';
			echo json_encode($row);
			return true;//Return invalid if post data not set.
		}

	}

}