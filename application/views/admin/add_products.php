<?php include('header2.php'); ?>
<script type="text/javascript" language="javascript">
//    $("#submit_me").live("click",function(){
//        trendy_Admin.saveProducts();
//    });
    /*file upload*/
    $("input[name='upload_btn']").live("click",function(){
        $("#file_upload").trigger('click');
    });
    $("#file_upload").live("change",function(){
        var imagepath = $(this).val().replace("C:\\fakepath\\","");

        if($.browser.msie == true || $.browser.msie != undefined){
            $('#filepath').html(imagepath);
        }else{
            $('#filepath').html(imagepath);

            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#prof_img_con').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        }
    });

    var trendy_Admin = {
//        saveProducts : function(){
//            var product_name = $.trim($("input[name='name_product']").val()),
//                product_price = $.trim($("input[name='product_price']").val()),
//                product_category = $.trim($("select[name='product_category']").val()),
//                product_img = $("input[name='file_upload']").val().replace("C:\\fakepath\\",""),
//                product_qty = $.trim($("select[name='product_qty']").val()),
//                product_desc = $.trim($("textarea[name='product_desc']").val());
//            var error = false;
//            if (product_name == "") {
//                    $("#product_name_err").addClass("error");
//                    $("#name_verify").text("Product name is required");
//                    error = true;
//            }
//            if (product_price == "") {
//                    $("#price_product_err").addClass("error");
//                    $("#price_verify").text("Product price is required");
//                    error = true;
//            }
//            if (product_desc == "") {
//                    $("#desc_product_err").addClass("error");
//                    $("#desc_verify").text("Product description is required");
//                    error = true;
//            }
//            if(error == false){
//
//            }
//        },
        site_url : function()
        {
            window.location.href = "<?php echo site_url() ?>admin/products";
        },
        doLogout : function()
        {
            window.location.href = "<?php echo site_url() ?>admin/logout";
        }
    }
</script>  
<div class="span8">
  <!--Body content-->
    <div class="box-shadow background-clip" >                   
        <div class="hero-unit" style="padding: 30px 60px">
             <!--add popup -->
            <div id="addcontent" >
            <h2><strong>Add Products</strong></h2>
            <form class="well form-horizontal" id="productForm" method="post" action="<?php echo site_url(); ?>admin/save" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group" id="product_name_err">
                        <label class="control-label" for="input01">Product Name: </label>
                        <div class="controls">
                            <input type="text" class="input-medium" id="input01 product_name " name="product_name" validate="required|minlength[6]" />
                            <span class="help-inline" id="name_verify"></span>
                        </div>
                    </div>
                    <div class="control-group" id="price_product_err">
                        <label class="control-label" for="appendedPrependedInput">Price: </label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <span class="add-on"> Php </span>
                                <input type="text" class="input-mini" id="appendedPrependedInput product_price" name="product_price" validate="required|minlength[6]" />
                                <span class="add-on"> .00 </span>
                                <span class="help-inline" id="price_verify"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="img_product_err">
                        <label class="control-label" for="fileInput">Product Image: </label>
                        <div class="controls">
                            <input type="button" value="Choose image" id="upload_btn" name="upload_btn" />
                            <span id="filepath"></span>
                            <input type="file" name="file_upload" id="file_upload" style="visibility:hidden;"  />
                            <span class="help-inline" id="img_verify"></span> 
                        </div>
                    </div>
                    <div class="control-group" id="cat_product_err">
                        <label class="control-label" for="fileInput">Category: </label>
                        <div class="controls">
                            <select class="span2" id="category" name="product_category"> 
                                <option value="women"> Women </option>
                                <option value="men"> Men </option>
                                <option value="teen"> Teen's </option>
                                <option value="kid"> Kid's </option>
                                <option value="accessories"> Accessories </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="qty_product_err">
                        <label class="control-label" for="fileInput">Quantity: </label>
                        <div class="controls">
                            <select class="span1" id="product_qty" name="product_qty"> 
                                <?php
                                    for($i=1; $i<=10; $i++){
                                        echo '<option value="'.$i.'"> '.$i.' </option>';
                                    }
                                ?>                                            
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="desc_product_err">
                        <label class="control-label" for="textarea">Product Description: </label>
                        <div class="controls">
                            <textarea class="input-large" id="textarea product_desc" name="product_desc" rows="3" name="product_desc"> </textarea>
                            <span class="help-inline" id="desc_verify"></span> 
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="submit_me" id="submit_me" class="btn btn-success" value="Add Product" />
                        <a href="<?php echo site_url() .'admin/products'?>" class="btn_return" id="backtolist" name="backtolist"  title="Return to Users" >Back to Product List</a>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>

</div>
