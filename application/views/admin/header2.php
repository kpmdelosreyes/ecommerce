<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trendy | Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/own.css" media="screen, projection, handheld" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui-1.7.3.custom.css" media="screen, projection, handheld" />

    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui-1.7.3.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<body> 
    <div id="test" style="display:none;" title="Delete"> Are you sure you want to remove this file? </div>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">            
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo site_url(). 'admin/home'; ?>"> kpmdelosreyes.com </a>
                <div class="nav-collapse">
                    <ul class="nav">
                         <li class="<?php if($this->uri->segment(2) == "home" || $this->uri->segment(2) == null) echo "active" ?>">
                            <a href="<?php echo site_url() . 'admin/'; ?>" rel="tooltip" title="Home">Home</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2) == "products") echo "active" ?>">
                            <a href="<?php echo site_url() . 'admin/products';?>" rel="tooltip" title="Products" id="products_nav">Products</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2) == "about") echo "active" ?>">
                            <a href="<?php echo site_url() . 'admin/about';?>" rel="tooltip" title="About">About</a>
                        </li>
                    </ul> 
                     <form class="navbar-search pull-left">
                        <input type="text" class="search-query " placeholder="Search"><i class="icon-search icon-white"></i>
                    </form>
                    <ul class="nav pull-right">
                       
                        <li ><a href="#"><i class="icon-user icon-white"></i><?php echo $this->session->userdata('email'); ?></a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="<?php echo site_url(). 'admin/logout'; ?>" rel="tooltip" title="Login" >Logout</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="page-header">
          <ul class="breadcrumb">
              <li>
                  <?php echo ($this->uri->segment(2) == "home") ?  "<i class='icon-home'></i>" : "<i class='icon-tags'></i> ";  ?>
                  <a href="<?php echo site_url(). 'admin/' . $this->uri->segment(2); ?>" ><?php echo ucfirst($this->uri->segment(2)); ?></a> 
                  <span class="divider">/</span>
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
                        <li><a href="#" rel="tooltip" title="New Arrivals">New Arrivals</a></li>
                        <li><a href="#" rel="tooltip" title="Top 10 Dresses">Top 10 Dresses</a></li>
                                                
                        <li class="divider"></li>
                        <p>Category</p>
                        <li><a href="#" rel="tooltip" title="Men's Wear">Men's Wear</a></li>
                        <li><a href="#" rel="tooltip" title="Women's Wear">Women's Wear</a></li>
                        <li><a href="#" rel="tooltip" title="Teen's Wear">Teen's Wear</a></li>
                        <li><a href="#" rel="tooltip" title="Kid's Wear">Kid's Wear</a></li>
                        <li><a href="#" rel="tooltip" title="Accessories">Accessories</a></li>
                        
                    </ul>
                </div>            
            </div>
