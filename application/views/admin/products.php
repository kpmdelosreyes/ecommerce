<?php include('header2.php'); ?>
<script type="text/javascript" language="javascript">
    //delete products
    $("#delete_products").live("click", function(){

        var fields = $(".input_chk").serializeArray();
        var idx = "";
        $.each(fields,function(i,field){
                idx += field.value + ",";
        });

        $.ajax({
            url : "<?php echo site_url();?>admin/delete",
            type: "POST",
            data : {'idx' : idx},
            success : function(data) {

                trendy_Admin.site_url();
            }
        });
    });

    //search items
    $("#search_btn").live("click", function(){

        var keyword = $("#search_item").val();
        $.ajax({
            url : "<?php echo site_url();?>admin/search",
            type: "POST",
            data : {'keyword' : keyword},
            success : function() {
                $('#div_list').load('<?php echo site_url();?>admin/search/', {keyword: keyword});
            }
        });
    });



var trendy_Admin = {
    addProducts : function()
    {
        window.location.href = "<?php echo site_url() ?>admin/add";
    },
    success : function()
    {
        $(".alert-success").show().fadeOut(10000);
    },
    site_url : function()
    {
        window.location.href = "<?php echo site_url() ?>admin/products";
    },

    deleteThis : function()
    {
        var fields = $(".input_chk").serializeArray();
        var idx = "";
        $.each(fields,function(i,field){
                idx += field.value + ",";
        });
        if(idx == "")
        {   
            $("#err_msg").show().fadeOut(5000);
            $("#err_msg").addClass("alert-error");
            $("#err_msg").html("<strong> Warning! </strong> No selected item(s).");

        }
        else{

            $("#err_msg").removeClass("alert-error");
            $("#test").dialog({
                modal: true,
                buttons: {
                    Delete: function() {
                        var fields = $(".input_chk").serializeArray();
                        var idx = "";
                        $.each(fields,function(i,field){
                                idx += field.value + ",";
                        });

                        $.ajax({
                            url : "<?php echo site_url();?>admin/delete",
                            type: "POST",
                            data : {'idx' : idx},
                            success : function(data) {

                                trendy_Admin.site_url();
                            }
                        });
                    },
                    Cancel: function() {
                        $( this ).dialog("destroy");
                    }
                }
            });
        }

    },

    checkAll : function(selector)
    {
        if ($(selector).is(":checked") === true){
            $.browser.msie ? $(".event_mouse_over input:checkbox").prop("checked", "checked") : $(".event_mouse_over input:checkbox").attr("checked", "checked");
        }
        else {
            $.browser.msie ? $(".event_mouse_over input:checkbox").removeProp("checked") : $(".event_mouse_over input:checkbox").removeAttr("checked");
        }
    },

    modifyThis : function(idx)
    {

        $.ajax({
                url : "<?php echo site_url();?>admin/modify",
                type: "POST",
                dataType : "html",
                data : {'idx' : idx},
                success : function(data) {
                   window.location.href = "<?php echo base_url(); ?>admin/modify";
                }
        });
    },

    doLogout : function()
    {
        window.location.href = "<?php echo site_url(); ?>admin/logout";
    }
}
</script>  

<div class="span8">
  <!--Body content-->
    <div class="box-shadow background-clip" >                   
        <div class="hero-unit" style="padding: 30px 60px">
            <div class="alert" id="err_msg" style="display:none;text-align: center;"></div>

            <div id="container">
                <div class="apply_action" style="width:auto;display:inline-block">
                    <a href="javascript: void(0);" class="btn btn-danger" onclick="javascript: trendy_Admin.deleteThis();"><i class="icon-trash icon-white" ></i></a>
                    <a href="javascript: void(0);" onclick="javascript: trendy_Admin.addProducts();" class="btn btn-success" ><i class="icon-plus icon-white" ></i></a>
                </div>
                <!--
                <ul class="sort_view" style="list-style:none">
                    <li class="active all"><a href="#" >All (9)</a></li>
                    <li><a href="javascript: void(0);">Women (5)</a></li>
                    <li><a href="javascript: void(0);">Men (0)</a></li>
                    <li><a href="javascript: void(0);">Teens (2)</a></li>
                    <li><a href="javascript: void(0);">Kids (2)</a></li>
                </ul>
                -->
                <div class="show_rows  pull-right"><i>Show Rows</i>
                    <select id="showRows" class="span1" onchange="javascript : window.location.href = '<?php echo site_url() . 'admin/products/'; ?>' + $('#showRows').val();">
                        <option <?php if($rows == "10"){ echo "selected"; } ?>>10</option>
                        <option <?php if($rows == "20"){ echo "selected"; } ?>>20</option>
                        <option <?php if($rows == "50"){ echo "selected"; } ?>>50</option>                                   
                    </select> 
                </div>                      
            </div>  

            <table class="table table-striped table-bordered"  >
                <thead>
                  <tr>
                    <th><input type="checkbox" class="input_chk check_all" onchange="javascript: trendy_Admin.checkAll(this);"/></th>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Price (PHP)</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
              <?php if($data == false){ 
                     echo '<tr class="event_mouse_over"><td colspan="7" style="text-align:center"> No record(s) found.</td></tr>';
                }
                else
                {
                  $listcount = count($data);
                  foreach ($data as $val){ ?>  
                  <tr class="event_mouse_over">
                    <td><input type="checkbox" class="input_chk" name="checkThis" value="<?php echo $val['id']; ?>" /></td>
                    <td><?php echo $listcount; ?></td>
                    <td><a href="<?php echo site_url(). "admin/modify/". $val['id']; ?>" id="modifyIdx"><?php echo ucwords($val['product_name']); ?></a></td>
                    <td><?php echo $val['product_price']; ?></td>
                    <td><?php echo $val['product_category']; ?></td>
                    <td><?php echo $val['quantity']; ?></td>
                    <td><?php echo date("Y/m/d H:i:s",$val['date_created']); ?></td>
                  </tr>
                  <?php $listcount--; }} ?>
                </tbody>
            </table>
            <div class="apply_action" style="width:auto;display:inline-block">
                <a href="javascript: void(0);" class="btn btn-danger" onclick="javascript: trendy_Admin.deleteThis();"><i class="icon-trash icon-white" ></i></a>
                <a href="javascript: void(0);" onclick="javascript: trendy_Admin.addProducts();" class="btn btn-success" ><i class="icon-plus icon-white" ></i></a>
            </div>
            <?php echo $paginate; ?>

        </div>
    </div>

</div>

            
