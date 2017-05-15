<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function add($data,$to_object=FALSE)
    {
        $this->db->insert("tbl_items",$data);
        $this->db->order_by("itemID","DESC");
        $this->db->limit(1);
        if($to_object){
            $data = $this->db->get("tbl_items")->row();
        }else{
            $data = $this->db->get("tbl_items")->row_array();
        }
        echo json_encode($data);
    }

    public function edit($value='')
    {
        
    }
}