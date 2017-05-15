<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_ajax extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('app_helper');

    $this->load->model('items_model');

    $this->load->library('form_validation');
    $this->load->library('session');

    $this->form_validation->set_error_delimiters('', '');
  }

  public function index($value='')
  {
    show_404();
  }

  public function add($value='')
  {
    $this->form_validation->set_rules('category', 'category', 'required|max_length[50]|htmlspecialchars|trim');
    $this->form_validation->set_rules('itemname', 'itemname', 'required|max_length[50]|htmlspecialchars|trim');
    $this->form_validation->set_rules('item_code', 'item_code', 'is_available[tbl_items.item_code]|required|max_length[50]|htmlspecialchars|trim');
    $this->form_validation->set_rules('supplier', 'supplier', 'required|max_length[50]|htmlspecialchars|trim');
    $this->form_validation->set_rules('unit_of_measure', 'unit_of_measure', 'required|max_length[50]|htmlspecialchars|trim');
    $this->form_validation->set_rules('sub_costprice', 'sub_costprice', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('srp', 'srp', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('std_price_to_trade_terms', 'std_price_to_trade_terms', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('std_price_to_trade_cod', 'std_price_to_trade_cod', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('price_to_distributors', 'price_to_distributors', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('quantity', 'quantity', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    $this->form_validation->set_rules('reorder', 'reorder', 'numeric|required|max_length[32]|htmlspecialchars|trim');
    
    $data["category_error"] = "";
    $data["itemname_error"] = "";
    $data["item_code_error"] = "";
    $data["supplier_error"] = "";
    $data["unit_of_measure_error"] = "";
    $data["sub_costprice_error"] = "";
    $data["srp_error"] = "";
    $data["std_price_to_trade_terms_error"] = "";
    $data["std_price_to_trade_cod_error"] = "";
    $data["price_to_distributors_error"] = "";
    $data["quantity_error"] = "";
    $data["reorder_error"] = "";
    
    
    if ($this->form_validation->run() == FALSE)
    {
      $data["category_error"] = form_error("category");
      $data["itemname_error"] = form_error("itemname");
      $data["item_code_error"] = form_error("item_code");
      $data["supplier_error"] = form_error("supplier");
      $data["unit_of_measure_error"] = form_error("unit_of_measure");
      $data["sub_costprice_error"] = form_error("sub_costprice");
      $data["srp_error"] = form_error("srp");
      $data["std_price_to_trade_terms_error"] = form_error("std_price_to_trade_terms");
      $data["std_price_to_trade_cod_error"] = form_error("std_price_to_trade_cod");
      $data["price_to_distributors_error"] = form_error("price_to_distributors");
      $data["quantity_error"] = form_error("quantity");
      $data["reorder_error"] = form_error("reorder");
      set_status_header(422);
      echo json_encode($data);
    }
    else
    {
      $add_data["category"] = $this->input->post("category");
      $add_data["itemname"] = $this->input->post("itemname");
      $add_data["item_code"] = $this->input->post("item_code");
      $add_data["supplier"] = $this->input->post("supplier");
      $add_data["unit_of_measure"] = $this->input->post("unit_of_measure");
      $add_data["sub_costprice"] = $this->input->post("sub_costprice");
      $add_data["srp"] = $this->input->post("srp");
      $add_data["std_price_to_trade_terms"] = $this->input->post("std_price_to_trade_terms");
      $add_data["std_price_to_trade_cod"] = $this->input->post("std_price_to_trade_cod");
      $add_data["price_to_distributors"] = $this->input->post("price_to_distributors");
      $add_data["quantity"] = $this->input->post("quantity");
      $add_data["reorder"] = $this->input->post("reorder");
      $data[] = $this->items_model->add($add_data);
    }
    
  }


}
