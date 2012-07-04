<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }
    
    public function add_item($data)
    {   
        $sQuery = $this->db->insert($this->table, $data);
        if($sQuery > 0){
            return $sQuery;
        }else{
            return "failed";
        }
    }
    
    public function getProducts($iIdx)
    {
        $sQuery = "SELECT * FROM {$this->table} WHERE id = " . $iIdx . " AND product_image != ''";
        
        $query = $this->db->query($sQuery);
        
        return $query->result_array();  
    }
    
    public function get_item($iId ='', $option)
    {
              
        $sWhere = "";
        
        if ($iId != null) {
            $where = "WHERE id = '{$iId}' AND product_image != ''";
        } 
        $sQuery = "SELECT * FROM {$this->table} {$sWhere}";
        
        if($option['limit'] != ''){
            $sQuery .= "LIMIT ".$option['offset'].", ".$option['limit']."";
        }
     
        $query = $this->db->query($sQuery);
        
        return $query->result_array();  
    }
    
    public function delete_item($data)
    {
        $sIdx = substr($data, 0,-1);
        $sql = "DELETE FROM {$this->table} WHERE id IN({$sIdx})";
        
        $result = $this->db->query($sql);
        
        if ($result > 0) {
            return true;
        }
        return false;
    }
    
    public function updateProducts($data, $id)
    {

    	$sQuery = $this->db->update($this->table, $data, array('id' => $id));
    	
    	if($sQuery > 0){
            return $sQuery;
        }else{
            return "failed";
        }
 
    }
    
    public function getResultCount()
    {
        return $this->db->count_all($this->table);
    }
    
    public function get_data_search($data)
    {
        $where = "";
        
        if ($data != '') {
            $where = "WHERE product_name like '%{$data['keyword']}%'";
        } 
        
        $sql = "SELECT * FROM {$this->table} {$where} ORDER BY date_created DESC";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    /* User Part*/ 
    public function getProductsByCat($aOption)
    {
        if($aOption){
             $sql = "SELECT * FROM {$this->table} WHERE product_category = '".htmlentities(stripslashes($aOption))."' AND product_image != '' ORDER BY product_price DESC";
        }else{
            $sql = "SELECT * FROM {$this->table} WHERE product_image != '' GROUP BY product_category";
        }
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
//    
//    public function getProductsWomen($data)
//    {
//        $sql = "SELECT * FROM {$this->table} WHERE product_category = '".$data['category']."' ORDER BY product_price DESC";
//        $query = $this->db->query($sql);
//        
//        return $query->result_array();
//    }
//    
//    public function getProductsMen($data)
//    {
//        $sql = "SELECT * FROM {$this->table} WHERE product_category = '".$data['category']."' ORDER BY product_price DESC";
//        $query = $this->db->query($sql);
//        
//        return $query->result_array();
//    }
//    public function getItemWomen($data)
//    {
//        $sql = "SELECT * FROM {$this->table} WHERE product_category = 'women' AND id = {$data} ORDER BY product_price DESC";
//        $query = $this->db->query($sql);
//        
//        return $query->result_array();
//    }
    public function insertCartItems($data)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$data}";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            $newdata = array();
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array(
                                'idx' => $rows->id,
                                'product_name' => $rows->product_name,
                                'product_price' => $rows->product_price,
                                'quantity' => $rows->quantity
                                );
            }
           // $this->session->set_userdata($newdata);
            return $newdata;            
        }

        return false;
    }
}
