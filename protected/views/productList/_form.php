<div class="form">
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

    <?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl . '/js/list.js');
    $cs->registerCssFile($baseUrl . '/css/list.css');
    ?>

    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'product-list-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php
    $productModel = new Product();
    ?>

    <div class="row">
        <?php echo CHtml::activeLabel($productModel, 'Product Id'); ?>
        <?php echo CHtml::activeTextField($productModel, 'id', array('id' => 'product_id_list')); ?>
        <?php
        echo CHtml::ajaxButton('Add', Yii::app()->createUrl('ProductList/GetProduct'),
            array(
                'type' => 'POST',
                'data' => 'js:{"product_id": $("#product_id_list").val()}',
                'dataType' => 'json',
                'success' => 'js:function(string){
                /*If any error messages are returned donot execute addition of elements and display and error message*/
                if(string.message){alert(string.message);}else{

                /*If any product exists with the same id donot append that element.*/
                if($("[data-rowid="+string.product_id+"]").exists()){

                }else{
                    var productIds = $("#ProductList_product_ids").val();
                    //If previous products are listed
                    if(productIds.length!=0){
                        var prevIds = $("#ProductList_product_ids").val();
                        var prevIdsArr = $.map(JSON.parse(prevIds), function(value, index) {
                            return [value];
                        });
                        //console.log(prevIdsArr);
                        prevIdsArr.push(string.product_id);
                        $("#ProductList_product_ids").val(JSON.stringify(prevIdsArr));
                    }else{
                    //If no previous products are listed
                    var newArr = [string.product_id];
                     $("#ProductList_product_ids").val(JSON.stringify(newArr));
                    }
                 $("#noProducts").hide();//Hide message saying no products in the list
                 $("#result_div").append(string.data);

                 }
                 }
                 }'
            ), array('class' => 'someCssClass'));
        ?>
    </div>
    <div class="clear"></div>

    <!--Table for showing ajax data for creating list-->
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
                        <td class="button-column">
                            <a data-rowid="<?php echo $query[0]["id"];?>" href="#" title="Remove element" class="removeProduct">
                                <img alt="Delete" src="/ims/assets/44d6bae9/gridview/delete.png"></a>
                        </td>
                    </tr>
                <?php endforeach;
            } ?>

            <tr class="even">
                <td colspan="5"  <?php if(!empty($model->id)){echo 'style="display:none;"';}?> id="noProducts"><b>No products currently in the list.</b></td>
            </tr>

            </tbody>
        </table>

    </div>
    <!--Table for showing ajax data for creating list-->

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span
            class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'product_ids'); ?>
        <?php echo $form->hiddenField($model, 'product_ids'); ?>
        <?php //echo $form->error($model, 'product_ids'); ?>
    </div>
    <!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->