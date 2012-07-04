<?php include 'header.php'; ?>
<div class="span8">
  <!--Body content-->
    <div class="box-shadow background-clip" >                   
        <div class="hero-unit">
            <ul class="thumbnails media-grid">
                <?php foreach($products as $index): ?>
                <li class="span3" id="test">
                    
                    <a class="thumbnail" style="width: 185px;height: 245px;" href="<?php echo base_url() . 'image.php?h=365&w=400&path=' .$index['product_image']; ?>" title="<?php echo ucwords($index['description']); ?>">
                        <img src="<?php echo base_url() . 'image.php?h=268&w=360&path=' .$index['product_image']; ?>" alt="" />
                    </a>
                    <div class="caption" style="display: inline-block;">
                        <h5 ><?php echo ucwords($index['product_name']); ?></h5>
                        <h6 >$<?php echo $index['product_price']; ?></h6> 
                    </div>
                    <div style="float:right;margin-right: 75px;margin-top:5px;position:relative;">
                        <select class="span1" id="quantity_num" onchange="$('#quantity_num').val();">
                            <?php  for($i=1; $i <= $index['quantity']; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>            
                        <a class="btn btn-danger" href="javascript: void(0);" onclick="javascript: womenProducts.buyMe(<?php echo $index['id']; ?>,$('#quantity_num').val(), <?php echo $index['product_price']; ?>,'<?php echo $index['product_name']; ?>');"><i class="icon-shopping-cart icon-white"></i></a>                 
                    </div>
                    
                </li>
                <?php endforeach; ?>
            </ul>    
      
        </div>
    </div>
</div>