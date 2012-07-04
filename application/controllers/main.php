<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('paypal_lib');
       
    }

    public function index()
    {
        if($this->uri->segment(2) == ""){
            
            $this->load->view('home');
        }else{
            
            $this->products();
        }
        
    }
    
    public function products()
    {
        $aaa = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;
        $aOption['category'] = ($this->uri->segment(2)) ? $aaa : null;
        $aData['products'] = $this->product_model->getProductsByCat($aOption['category']);
        
        if($this->uri->segment(2) == null) {
            $this->load->view('home');
        }
        else if($this->uri->segment(3) == true){
            $this->load->view($this->uri->segment(3), $aData);
        }
        else{
            $this->load->view('items', $aData);
        }
    }
    
    public function about()
    {
        
        $this->load->view("about");
    }
    
//    public function women()
//    {
//        $aOption['category'] = "women";
//        $aData['products'] = $this->product_model->getProductsWomen($aOption);
//        $aData['paypal_form'] = $this->paypal_lib->paypal_form();
//        $this->load->view($aOption['category'], $aData);
//    }
//    
//    public function men()
//    {
//        $aOption['category'] = "men";
//        $aData['products'] = $this->product_model->getProductsMen($aOption);
//        $this->load->view($aOption['category'], $aData);
//    }
//    
//    public function kids()
//    {
//        $aOption['category'] = "kids";
//        $aData['products'] = $this->product_model->getProductsWomen($aOption);
//        $this->load->view($aOption['category'], $aData);
//    }
//    
//    
//    public function women_buyme()
//    {
//        $aa = $this->product_model->getItemWomen($_POST['idx']);
//        echo json_encode($aa);
//    }
//    
    
    
   
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */