<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array('product_model','user_model'));
        $this->load->library(array('encrypt','pagination', 'session','image_lib'));
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $session_data = $this->session->userdata('is_logged_in');
            $data['email'] = $session_data['email'];
            $this->products();           
        }
        else
        {
            $this->login();
           // $this->load->view("admin/login");
           
        }
    }
    
    public function login()
    {
        
        $email = mysql_escape_string($this->input->post('login_email'));
        $password = md5("supersecret" . $this->input->post('login_password'));
        $result = $this->user_model->dologin($email,$password);

        if($result > 0)
        {
            $newdata = array('email' => $email,'is_logged_in' => TRUE);
            $this->session->set_userdata($newdata);
            $this->index();
        }
        else {
            $this->load->view("admin/login");
        }
                
    }

    
    public function logout()
    {
        session_destroy();
        $newdata = array('email' => "",'is_logged_in' => FALSE);
        $this->session->unset_userdata($newdata);

        $this->load->view("admin/login");
    }
    
    public function registration()
    {
        
        $aData = array(
                        'fname' => $this->security->xss_clean(htmlentities(stripslashes($this->input->post('reg_fname')))),
                        'lname' => $this->security->xss_clean(htmlentities(stripslashes($this->input->post('reg_lname')))),
                        'email' => $this->security->xss_clean(htmlentities(stripslashes($this->input->post('reg_email')))),
                        'password' => $this->security->xss_clean(md5("supersecret" . $this->input->post('reg_password'))),
                        'gender' => $this->security->xss_clean($this->input->post('reg_gender')),
                        'birthday' => $this->security->xss_clean($this->input->post('reg_dob_year')) ."-". $this->security->xss_clean($this->input->post('reg_dob_month')) ."-". $this->security->xss_clean($this->input->post('reg_dob_day'))
                    );
        $sResult = $this->user_model->add_user($aData);
        if($sResult == "success"){
            $this->index();
        }   
        else{
            $this->load->view("admin/login");
        }
        
     }
     
    public function products()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $aData = array();
            $aData['rows'] = $this->uri->segment(3);
            $config['base_url'] = base_url().'index.php/admin/products';
            $config['total_rows'] = $this->product_model->getResultCount();
            $config['per_page'] = isset($aData['rows']) ? $aData['rows'] : 10;
            $config['cur_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
            $config['uri_segment'] = ($config['cur_page'] - 1) * $config['per_page'];

            $this->pagination->initialize($config); 

            $aOption['limit'] = $config['per_page'];
            $aOption['offset'] = $config['uri_segment'];
            $aData['data'] = $this->product_model->get_item('',$aOption);

            $aData['paginate'] = $this->pagination->create_links();
            $this->load->view('admin/products', $aData);
        }else{
            $this->load->view("index.html");
        }
        
    }
    
    public function add()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $this->load->view('admin/add_products');
        }else{
            $this->load->view("index.html");
        }
    }
    
    public function save()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            if(!empty($_FILES['file_upload']['name']))
            {
                /*file*/
                $file = $_FILES['file_upload'];
                $name = $file['name'];
                $sFileName = time()."_".$file['name'];
                $sPath = "./uploads/" . $sFileName;

                /*move uploaded file*/
                if (move_uploaded_file($file['tmp_name'], $sPath)) {
                        $sPath = "./uploads/" . $sFileName;
                }
            }
            $config['image_library'] = 'gd2';
            $config['source_image'] = $sPath;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 400;
            $config['height'] = 365;

            $this->load->library('image_lib', $config); 
            
            $save = array(
                        'product_name' => stripslashes($_POST['product_name']),
                        'product_price' => stripslashes($_POST['product_price']),
                        'quantity' => stripslashes($_POST['product_qty']),
                        'product_image' => ($this->image_lib->resize()) ? $sFileName : null,
                        'product_category' => stripslashes($_POST['product_category']),
                        'description' => stripslashes($_POST['product_desc']),
                        'date_created' => time(),
                        'date_modified' => time()
                        );

            $result = $this->product_model->add_item($save);
            $this->index();
        }else{
            $this->load->view("index.html");
        }

    }    
    
    public function modify()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $aData = array();
            $aData['sQuery'] = $this->product_model->getProducts($this->security->xss_clean($this->uri->segment(3)));
            $this->load->view('admin/edit_products', $aData);
        }else{
            $this->load->view("index.html");
        }
    	
    }
    
    public function saveModify()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            if(!empty($_FILES['product_img']['name']))
            {
                /*file*/
                $file = $_FILES['product_img'];
                $name = $file['name'];
                $sFileName = time()."_".$file['name'];
                $sPath = "./uploads/" . $sFileName;

                /*move uploaded file*/
                if (move_uploaded_file($file['tmp_name'], $sPath)) {
                        $sPath = "./uploads/" . $sFileName;
                }
            }
            $update = array(
                           'product_name' => stripslashes($_POST['product_name']),
                           'product_price' => stripslashes($_POST['product_price']),
                           'quantity' => stripslashes($_POST['product_qty']),
                           'product_image' => $sFileName,
                           'product_category' => stripslashes($_POST['product_category']),
                           'description' => stripslashes($_POST['product_desc']),
                           'date_created' => time(),
                           'date_modified' => time()
                            );

            $result = $this->product_model->updateProducts($this->security->xss_clean($update), $this->security->xss_clean($_POST['idx']));
            echo json_encode($result);
        }else{
            $this->load->view("index.html");
        }
    	
        
    }

    public function delete()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $param = $this->input->post('idx');

            $result = $this->product_model->delete_item($param);
            if($result !== false){
                $this->index();
            }
        }else{
            $this->load->view("index.html");
        }
    }
    
    public function home()
    {
        if($this->session->userdata('is_logged_in') == TRUE)
        {
            $this->load->view('admin/home');
        }else{
            $this->load->view("index.html");
        }
        
    }
    
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */