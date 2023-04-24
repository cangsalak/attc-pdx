<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 24/04/2023 11:04*/
/*| Please DO NOT modify this information*/


class Amphures_model extends MY_Model{

  private $table        = "amphures";
  private $primary_key  = "id";
  private $column_order = array('id', 'code', 'name_th_A', 'name_en_A', 'province_id');
  private $order        = array('amphures.code'=>"ASC");
  private $select       = "amphures.id,amphures.id,amphures.code,amphures.name_th_A,amphures.name_en_A,amphures.province_id";

public function __construct()
	{
		$config = array(
      'table' 	      => $this->table,
			'primary_key' 	=> $this->primary_key,
		 	'select' 	      => $this->select,
      'column_order' 	=> $this->column_order,
      'order' 	      => $this->order,
		 );

		parent::__construct($config);
	}

  private function _get_datatables_query()
    {
      $this->db->select($this->select);
      $this->db->from($this->table);
      $this->_get_join();

    if($this->input->post("code"))
        {
          $this->db->like("amphures.code", $this->input->post("code"));
        }

    if($this->input->post("name_th_A"))
        {
          $this->db->like("amphures.name_th_A", $this->input->post("name_th_A"));
        }

    if($this->input->post("name_en_A"))
        {
          $this->db->like("amphures.name_en_A", $this->input->post("name_en_A"));
        }

    if($this->input->post("province_id"))
        {
          $this->db->like("amphures.province_id", $this->input->post("province_id"));
        }

      if(isset($_POST['order'])) // here order processing
       {
           $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
       }
       else if(isset($this->order))
       {
           $order = $this->order;
           $this->db->order_by(key($order), $order[key($order)]);
       }

    }


    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
      $this->db->select($this->select);
      $this->db->from("$this->table");
      $this->_get_join();
      return $this->db->count_all_results();
    }

    public function _get_join()
    {
      $this->db->select("districts.name_th_d");
      $this->db->join("districts","districts.id = amphures.code","left");
      $this->db->select("provinces.name_th_p");
      $this->db->join("provinces","provinces.id = amphures.province_id","left");
    }

    public function get_detail($id)
    {
        $this->db->select("".$this->table.".*");
        $this->db->from($this->table);
        $this->_get_join();
        $this->db->where("".$this->table.'.'.$this->primary_key,$id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
          return $query->row();
        }else{
          return FALSE;
        }
    }

}

/* End of file Amphures_model.php */
/* Location: ./application/modules/amphures/models/Amphures_model.php */
