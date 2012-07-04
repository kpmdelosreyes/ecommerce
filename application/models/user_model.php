<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function dologin($email,$password)
    {
        $sQuery = "SELECT email, password, fname FROM users WHERE email='".$email."' AND password='".$password."'";
        $query = $this->db->query($sQuery);

        if($query->num_rows()>0)
        {
            $newdata = array();
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array('email' => $rows->email,'is_logged_in' => TRUE);
            }

            $this->session->set_userdata($newdata);
            return true;            
        }

        return false;
    
    }
    public function add_user($data)
    {
 
        $sInsert = $this->db->insert("users", $data);
        $id = $this->db->insert_id();
        if ($id > 0) {
            return $id;
        }
        return false;
     
    }
        
    public function check_user_exist($usr)
    {
		
        $this->db->where("username",$usr);
        $query=$this->db->get("users");
        
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
