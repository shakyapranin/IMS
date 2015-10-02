<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
//'product_ids',
	),
)); ?>

<?php $data = array(); ?>
<?php if ($model->id) {
	try {
		$product_ids = json_decode($model->product_ids);
		foreach($product_ids as $product_id) {
			$database = Yii::app()->db;//Access database object
			$query = $database->createCommand()
				->select('id,name,type,price')
				->from('tbl_product p')
				->where('id=:id', array(':id' => $product_id))
				->queryAll();
			array_push($data,$query);
		}
	} catch (Exception $e) {

	}
} ?>
<br>
<div class="grid-view" id="product-grid">

	<table class="items">
		<thead>
		<tr>
			<th id="product-grid_c0"><a href="/ims/index.php/product/admin?Product_sort=id" class="sort-link">ID</a>
			</th>
			<th id="product-grid_c1"><a href="/ims/index.php/product/admin?Product_sort=name"
										class="sort-link">Product Name</a></th>
			<th id="product-grid_c2"><a href="/ims/index.php/product/admin?Product_sort=type"
										class="sort-link">Type</a></th>
			<th id="product-grid_c3"><a href="/ims/index.php/product/admin?Product_sort=quality" class="sort-link">Price</a>
			</th>
			<th id="product-grid_c6" class="button-column">&nbsp;</th>
		</tr>
		</thead>
		<tbody id="result_div">

		<?php if (!empty($data)) {
			foreach ($data as $query):;?>
				<tr>
					<td><?php echo $query[0]["id"];?></td>
					<td><?php echo $query[0]["name"];?></td>
					<td><?php echo $query[0]["type"];?></td>
					<td><?php echo $query[0]["price"];?></td>
<!--					<td class="button-column">
						<a data-rowid="<?php /*echo $model->id;*/?>" href="#" title="Remove element" class="removeProduct">
							<img alt="Delete" src="/ims/assets/44d6bae9/gridview/delete.png"></a>
					</td>-->
				</tr>
			<?php endforeach;
		} ?>

		<tr class="even">
			<td colspan="5"  <?php if(!empty($model->id)){echo 'style="display:none;"';}?> id="noProducts"><b>No products currently in the list.</b></td>
		</tr>

		</tbody>
	</table>

</div>

