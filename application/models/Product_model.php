<?php
    class Product_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }
        
        function select() {
            $this->db->select('
            id,
            product_name,
            product_description,
            production_date,
            expiry_date,
            product_price,
            price_currency,
            ean_code,
            product_weight,
            weight_unit
            ');
            $this->db->limit(10);
            $this->db->order_by('id asc');
            $query = $this->db->get('products');
            return $query->result();
        }       
        
        public function add($ndata) {
            $this->db->insert('products',$ndata);
        } 
        
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('products');
        }            
}            
?> 