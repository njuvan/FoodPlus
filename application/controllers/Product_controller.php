<?php
class Product_controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        }
    
    function index() {
        $this->load->model('product_model');
        
        $home = array(
            'query' => $this->product_model->select()
        );
        
        $this->load->view('product_view',$home);
    }
    
    function add() {                               
        $this->load->model('product_model');
        
        $ndata = array(
            'product_name' => $this->input->post('product_name'),
            'product_description' => $this->input->post('product_description'),
            'production_date' => $this->input->post('production_date'),
            'expiry_date' => $this->input->post('expiry_date'),
            'product_price' => $this->input->post('product_price'),
            'price_currency' => $this->input->post('price_currency'),
            'ean_code' => $this->input->post('ean_code'),
            'product_weight' => $this->input->post('product_weight'),
            'weight_unit' => $this->input->post('weight_unit'),
        );
        
        $this->product_model->add($ndata);
    }
    
    function delete($id) {
        $id = $this->uri->segment(3);
        $this->load->model('product_model');
        $this->product_model->delete($id);
    }
}
?>