<?php include('header2.php'); ?>
<script type="text/javascript" language="javascript">
    $("#submit_me").live("click",function(){
            trendy_Admin.saveProducts();
    });
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
        saveProducts : function(){
                var product_name = $.trim($("input[name='name_product']").val()),
                    product_price = $.trim($("input[name='product_price']").val()),
                    product_img = $.trim($("input[name='file_upload']").val().replace("C:\\fakepath\\","")),
                    product_category = $.trim($("select[name='product_category']").val()),
                    product_qty = $.trim($("select[name='product_qty']").val()),
                    product_desc = $.trim($("textarea[name='product_desc']").val()),
                    idx = $("#idx").val();

                var error = false;

                if (product_name == "") {
                        $("#product_name_err").addClass("error");
                        $("#name_verify").text("Product name is required");
                        error = true;
                }
                if (product_price == "") {
                        $("#price_product_err").addClass("error");
                        $("#price_verify").text("Product price is required");
                        error = true;
                }
                if (product_desc == "") {
                        $("#desc_product_err").addClass("error");
                        $("#desc_verify").text("Product description is required");
                        error = true;
                }
                if(error == false){
                        //$("form#productForm").submit();
                        $.ajax({
                            url : "<?php echo site_url(); ?>admin/saveModify",
                            dataType : "json",
                            type : "post",
                            data : {
                                    idx : idx,
                                product_name : product_name,
                                product_price : product_price,
                                product_desc : product_desc,
                                product_img : product_img,
                                product_qty : product_qty,
                                product_category : product_category            
                            },
                            success : function(data){
                                alert(data)
                                if(data == true){
                                    trendy_Admin.site_url();
                                }
                            }
                        });

                }
        },
        site_url : function()
        {
            window.location.href = "<?php echo site_url() ?>admin/products";
        }
    }
</script>  
<div class="span8">
  <!--Body content-->
    <div class="box-shadow background-clip" >                   
        <div class="hero-unit" style="padding: 30px 60px">
             <!--add popup -->
            <div id="addcontent" >
            <?php foreach ($sQuery as $key):?>
            <h2><strong>Modify Product </strong><em class="pull-right" style="color:red;display: inline-block;font-size:15px"><?php echo "Product Id : [".$key['id']."]"; ?></em></h2>
            <input type="hidden" id="idx" name="idx" value="<?php  echo $this->uri->segment(3); ?>" />
            <form class="well form-horizontal" id="productForm" method="post" action="#" enctype="multipart/form-data">
                <fieldset >
                    <div style="width:auto;display:inline-block">
                        <ul class="thumbnails" style="float:left;">
                          <li class="span3">
                            <a href="#" class="thumbnail">
                                <img src="<?php echo base_url() . 'image.php?h=280&w=440&cr=25:35&path=' . $key['product_image']; ?>" alt="">
                            </a>
                          </li>

                        </ul>

                        <div class="pull-right">
                            <div class="control-group" id="product_name_err">
                                <label class="control-label" for="input01">Product Name: </label>
                                <div class="controls">
                                    <input type="text" class="input-medium" id="input01 name_product " name="name_product" value="<?php echo $key['product_name']; ?>" />
                                    <span class="help-inline" id="name_verify"></span>
                                </div>
                            </div>
                            <div class="control-group" id="price_product_err">
                                <label class="control-label" for="appendedPrependedInput">Price: </label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <span class="add-on"> Php </span>
                                        <input type="text" class="input-mini" id="appendedPrependedInput product_price" name="product_price" value="<?php echo $key['product_price']; ?>" />
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
                                        <option value="women" <?php if($key['product_category'] == "women"){ echo "selected"; } ?>> Women </option>
                                        <option value="men" <?php if($key['product_category'] == "men"){ echo "selected"; } ?>> Men </option>
                                        <option value="teen" <?php if($key['product_category'] == "teen"){ echo "selected"; } ?>> Teen's </option>
                                        <option value="kid" <?php if($key['product_category'] == "kid"){ echo "selected"; } ?>> Kid's </option>
                                        <option value="accessories" <?php if($key['product_category'] == "accessories"){ echo "selected"; } ?>> Accessories </option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group" id="qty_product_err">
                                <label class="control-label" for="fileInput">Quantity: </label>
                                <div class="controls">
                                    <select class="span1" id="product_qty" name="product_qty"> 
                                        <?php
                                            for($i=1; $i<=10; $i++){
                                                $value = '<option value="'.$i.'"';
                                                if($key['quantity'] == $i){
                                                    $value .= "selected";
                                                }
                                                $value .= '> '.$i.' </option>';
                                                    echo $value;
                                            }
                                        ?>                                            
                                    </select>
                                </div>
                            </div>
                            <div class="control-group" id="desc_product_err">
                                <label class="control-label" for="textarea">Product Description: </label>
                                <div class="controls">
                                    <textarea class="input-large" id="textarea product_desc" name="product_desc" rows="3" name="product_desc"><?php echo $key['description']; ?> </textarea>
                                    <span class="help-inline" id="desc_verify"></span> 
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="button" name="submit_me" id="submit_me" class="btn btn-success" value="Save" />
                                <a href="<?php echo site_url(). 'admin/products'; ?>" class="btn_return" id="backtolist" name="backtolist"  title="Return to Users">Back to Product List</a>
                            </div>
                        </div>

                    </div>
                </fieldset>
            </form>
            <?php endforeach;?>
            </div>
        </div>
    </div>

</div>
