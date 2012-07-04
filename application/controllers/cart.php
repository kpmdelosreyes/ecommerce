<?php

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->library(array('paypal_lib','session','cart'));
        $this->load->helper(array('form', 'url'));
       
    }
    
    public function index()
    {
        $data['products'] = $this->cart_model->retrieve_products(); // Retrieve an array with all products  
  
        $this->load->view("addcart");
    }
    
    public function goShop()
    {
        $data = array(
               'id'      => $_POST['idx'],
               'qty'     => $_POST['p_quantity'],
               'price'   => $_POST['p_price'],
               'name'    => $_POST['p_name'],
              // 'options' => array('Size' => 'L', 'Color' => 'Red')
            );
        
        $this->cart->insert($data);
    }
    public function updateCart()
    {
        $data = array(
               'id'      => $_POST['idx'],
               'qty'     => $_POST['quantity'],
               'price'   => $_POST['p_price'],
               'name'    => $_POST['p_name'],
               //'options' => array('Size' => 'L', 'Color' => 'Red')
            );

        $this->cart->update($data);
    }
    
    public function empty_cart()
    {
        $this->cart->destroy();
        $this->index();
    }
   
}

