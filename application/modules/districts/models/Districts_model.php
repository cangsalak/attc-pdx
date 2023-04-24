<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 24/04/2023 11:02*/
/*| Please DO NOT modify this information*/


class Districts_model extends MY_Model{

  private $table        = "districts";
  private $primary_key  = "id";
  private $column_order = array('id', 'name_th_d', 'name_en_d', 'amphure_id');
  private $order        = array('districts.id'=>"ASC");
  private $select       = "districts.id,districts.id,districts.name_th_d,districts.name_en_d,districts.amphure_id";

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

    if($this->input->post("zip_code"))
        {
          $this->db->like("districts.zip_code", $this->input->post("zip_code"));
        }

    if($this->input->post("name_th_d"))
        {
          $this->db->like("districts.name_th_d", $this->input->post("name_th_d"));
        }

    if($this->input->post("name_en_d"))
        {
          $this->db->like("districts.name_en_d", $this->input->post("name_en_d"));
        }

    if($this->input->post("amphure_id"))
        {
          $this->db->like("districts.amphure_id", $this->input->post("amphure_id"));
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
      $this->db->select("amphures.name_th_A");
      $this->db->join("amphures","amphures.id = districts.amphure_id","left");
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

/* End of file Districts_model.php */
/* Location: ./application/modules/districts/models/Districts_model.php */
