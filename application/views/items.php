<?php include 'header.php'; ?>
<div class="span8">
  <!--Body content-->
    <div class="box-shadow background-clip" >                   
        <div class="hero-unit">
            <ul class="thumbnails media-grid">
                <?php foreach($products as $index): ?>
                <li class="span3 ">
                    <a href="<?php echo site_url() . 'main/products/'.strtolower($index['product_category']);?>" style="width: 185px;height: 245px;"><img src="<?php echo base_url() . 'image.php?h=268&w=360&path=' .$index['product_image']; ?>"></a>
                    <div class="caption">
                        <h5><?php echo ucwords($index['product_category']); ?></h5>
                        <h6>$<?php echo $index['product_price']; ?></h6>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>    
      
        </div>
    </div>
</div>