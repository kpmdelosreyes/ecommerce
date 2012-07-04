<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trendy</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap-responsive.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.fancybox.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui-1.7.3.custom.css" media="screen, projection, handheld" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/buyMe.js"></script>
       
</head>

<body> 
    <input type="hidden" id="url_" name="url_" value="<?php echo site_url(); ?>" />
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
                <?php 
                  if($this->uri->segment(2) == "home" || $this->uri->segment(2) == null){
                    echo ' <i class="icon-home"></i> <a href="javascript: void(0);" > Home </a> <span class="divider">/</span> ';
                  }else if($this->uri->segment(2) == "products"){
                      if($this->uri->segment(3) != null){
                          echo ' <i class="icon-tags"></i> <a href="javascript: void(0);" >' . ucwords($this->uri->segment(2)) . ' </a> <span class="divider">/ '.ucwords($this->uri->segment(3)).'</span> ';
                      }else{
                         echo ' <i class="icon-tags"></i> <a href="javascript: void(0);" >' . ucwords($this->uri->segment(2)) . ' </a> <span class="divider">/</span> '; 
                      }                    
                  }else if($this->uri->segment(2) == "about"){
                    echo ' <i class="icon-book"></i> <a href="javascript: void(0);" >' . ucwords($this->uri->segment(2)) . ' </a> <span class="divider">/</span> ';  
                  }
                ?>
              </li>

          </ul>
        </div>
    </div>
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="span2">
              <!--Sidebar content-->  
                <div class="hero-unit" style="padding: 30px 60px">
                    <ul class="nav nav-list" style="padding-left: 0; padding-right: 0">
                        <h2>Clothing</h2>
                        <li class="divider"></li>
                        <p>Features</p>
                        <li><a href="<?php echo site_url() . 'main';?>" rel="tooltip" title="New Arrivals"><abbr>New Arrivals</abbr></a></li>
                        <li><a href="<?php echo site_url() . 'main';?>" rel="tooltip" title="Top 10 Dresses">Top 10 Dresses</a></li>
                                                
                        <li class="divider"></li>
                        <p>Category</p>
                        <li><a href="<?php echo site_url() . 'main/products/men';?>" rel="tooltip" title="Men's Wear">Men's Wear</a></li>
                        <li><a href="<?php echo site_url() . 'main/products/women';?>" rel="tooltip" title="Women's Wear">Women's Wear</a></li>
                        <li><a href="<?php echo site_url() . 'main/products/teen';?>" rel="tooltip" title="Teen's Wear">Teen's Wear</a></li>
                        <li><a href="<?php echo site_url() . 'main/products/kid';?>" rel="tooltip" title="Kid's Wear">Kid's Wear</a></li>
                        <li><a href="<?php echo site_url() . 'main/products/accessories';?>" rel="tooltip" title="Accessories">Accessories</a></li>
                        
                    </ul>
                </div>            
            </div>
<!--            <form id="form_email" name="form_email" class="form-horizontal" method="post">
                <div class="row">
                    <div class="span4">
                        <div class="btn-toolbar" style="margin-bottom:9px">
                            <div class="control-group">
                                <textarea class="input-xlarge"></textarea>
                            </div>
                            <div class="control-group">
                                <textarea class="input-xlarge"></textarea>
                            </div>
                        </div>
                    </div>    
                    
                </div>
                
            </form>-->
