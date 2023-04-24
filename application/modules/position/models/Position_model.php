<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 21/04/2023 14:52*/
/*| Please DO NOT modify this information*/


class Position_model extends MY_Model{

  private $table        = "position";
  private $primary_key  = "po_id";
  private $column_order = array('po_id', 'po_name');
  private $order        = array('position.po_id'=>"DESC");
  private $select       = "position.po_id,position.po_id,position.po_name";

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

    if($this->input->post("po_num"))
        {
          $this->db->like("position.po_num", $this->input->post("po_num"));
        }

    if($this->input->post("po_name"))
        {
          $this->db->like("position.po_name", $this->input->post("po_name"));
        }

    if($this->input->post("po_details"))
        {
          $this->db->like("position.po_details", $this->input->post("po_details"));
        }

    if($this->input->post("po_created_at"))
        {
          $this->db->like("position.po_created_at", date('Y-m-d H:i',strtotime($this->input->post("po_created_at"))));
        }

    if($this->input->post("po_update_at"))
        {
          $this->db->like("position.po_update_at", date('Y-m-d H:i',strtotime($this->input->post("po_update_at"))));
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
      return $this->db->count_all_results();
    }



}

/* End of file Position_model.php */
/* Location: ./application/modules/position/models/Position_model.php */
