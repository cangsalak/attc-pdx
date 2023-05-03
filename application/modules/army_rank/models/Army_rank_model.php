<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 03/05/2023 09:25*/
/*| Please DO NOT modify this information*/


class Army_rank_model extends MY_Model{

  private $table        = "army_rank";
  private $primary_key  = "id";
  private $column_order = array('id', 'since', 'rank_id', 'user_id', 'evidence', 'dated', 'created_at', 'created_by');
  private $order        = array('army_rank.id'=>"DESC");
  private $select       = "army_rank.id,army_rank.id,army_rank.since,army_rank.rank_id,army_rank.user_id,army_rank.evidence,army_rank.dated,army_rank.created_at,army_rank.created_by";

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

    if($this->input->post("since"))
        {
          $this->db->like("army_rank.since", $this->input->post("since"));
        }

    if($this->input->post("rank_id"))
        {
          $this->db->like("army_rank.rank_id", $this->input->post("rank_id"));
        }

    if($this->input->post("user_id"))
        {
          $this->db->like("army_rank.user_id", $this->input->post("user_id"));
        }

    if($this->input->post("evidence"))
        {
          $this->db->like("army_rank.evidence", $this->input->post("evidence"));
        }

    if($this->input->post("dated"))
        {
          $this->db->like("army_rank.dated", date('Y-m-d',strtotime($this->input->post("dated"))));
        }

    if($this->input->post("created_at"))
        {
          $this->db->like("army_rank.created_at", date('Y-m-d H:i',strtotime($this->input->post("created_at"))));
        }

    if($this->input->post("created_by"))
        {
          $this->db->like("army_rank.created_by", $this->input->post("created_by"));
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
      $this->db->select("rank.r_fname");
      $this->db->join("rank","rank.r_id = army_rank.rank_id","left");
      $this->db->select("army.a_fname");
      $this->db->join("army","army.a_id = army_rank.user_id","left");
      $this->db->select("auth_user.name");
      $this->db->join("auth_user","auth_user.id_user = army_rank.created_by","left");
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

/* End of file Army_rank_model.php */
/* Location: ./application/modules/army_rank/models/Army_rank_model.php */
