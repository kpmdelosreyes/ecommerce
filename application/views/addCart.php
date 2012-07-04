<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trendy | Shopping Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap-responsive.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui-1.7.3.custom.css" media="screen, projection, handheld" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/buyMe.js"></script>
       
</head>

<body> 
    <input type="hidden" id="url" name="url" value="<?php echo site_url(); ?>" />
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">            
                <a class="btn btn-navbar" data-toggle="collapse" data-target="nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>"> kpmdelosreyes.com </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="<?php if($this->uri->segment(2) == "home" || $this->uri->segment(2) == null) echo "active" ?>">
                            <a href="<?php echo site_url() . 'main/'; ?>" rel="tooltip" title="Home">Home</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2) == "products") echo "active" ?>">
                            <a href="<?php echo site_url() . 'main/products';?>" rel="tooltip" title="Products" id="products_nav">Products</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2) == "about") echo "active" ?>">
                            <a href="<?php echo site_url() . 'main/about';?>" rel="tooltip" title="About">About</a>
                        </li>
                    </ul> 
                     <form class="navbar-search pull-left">
                        <input type="text" class="search-query " placeholder="Search"><i class="icon-search icon-white"></i>
                    </form>
                    <ul class="nav pull-right">
                         <li><a href="javascript: void(0);" rel="tooltip" id="email_us"><i class="icon-envelope icon-white"></i></a></li>
                         <li><a href="<?php echo site_url() . 'cart';?>" rel="tooltip" title="Shopping" ><i class="icon-shopping-cart icon-white"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="page-header">
          <ul class="breadcrumb">
              <li>
                  <i class="icon-shopping-cart"></i> <a href="<?php echo site_url() .'cart'?>" >Shop</a> <span class="divider">/</span>
              </li>

          </ul>
        </div>
    </div>
    
    
    <div class="span10 offset3" >
      <!--Body content-->
        <div class="box-shadow background-clip"  style="box-shadow: 10px 10px 5px #888888;">                   
            <div class="hero-unit" style="margin: 0 auto;padding: 30px 60px">
                <?php echo form_open('cart/updateCart'); ?>

                <table class="table table-striped table-bordered">

                    <tr>
                      <th>QTY</th>
                      <th>Item Description</th>
                      <th style="text-align:right">Item Price</th>
                      <th style="text-align:right">Sub-Total</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                            <tr>
                              <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                              <td>
                                    <?php echo $items['name']; ?>

                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                            <p>
                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                <?php endforeach; ?>
                                            </p>

                                        <?php endif; ?>

                              </td>
                              <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                              <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>

                    <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                      <td colspan="2"> </td>
                      <td class="right"><strong>Total</strong></td>
                      <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>

                </table>
                <?php  echo form_submit('', 'Update your Cart','class="btn btn-primary"'); ?>
                <a href="<?php echo site_url() . 'cart/empty_cart';?>" rel="tooltip" class="empty" title="Shopping" >Empty Cart</a>
               
            </div>
        </div>

    </div>