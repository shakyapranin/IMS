$(document).ready(function(){

    $.fn.exists = function () {
        return this.length !== 0;
    }

    $(".removeProduct").live('click',function(){
        //alert($(this).data('rowid'));
        var elements = $(this).parents("tbody").find("tr").length;
        var elementId = $(this).data('rowid');

        var productIds = $("#ProductList_product_ids").val();
        var prevIdsArr = $.map(JSON.parse(productIds), function(value, index) {
            return [value];
        });
        //Remove the current id from the array to insert
        prevIdsArr = $.grep(prevIdsArr,function(n,i){
            return n!=elementId;
        });
        $("#ProductList_product_ids").val(JSON.stringify(prevIdsArr));
        console.log(elements);
        if(elements==2){$("#noProducts").show('slow');$("#ProductList_product_ids").val('');};

        $(this).parents("tr").remove();
    });
});