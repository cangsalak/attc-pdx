<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 20/04/2023 11:24*/
/*| Please DO NOT modify this information*/


class User_log_model extends MY_Model{

  private $table        = "ci_user_log";
  private $primary_key  = "id";
  private $column_order = array('id', 'user', 'ip_address', 'controller', 'url', 'data', 'created_at');
  private $order        = array('ci_user_log.id'=>"DESC");
  private $select       = "ci_user_log.id,ci_user_log.id,ci_user_log.user,ci_user_log.ip_address,ci_user_log.controller,ci_user_log.url,ci_user_log.data,ci_user_log.created_at";

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

    if($this->input->post("user"))
        {
          $this->db->like("ci_user_log.user", $this->input->post("user"));
        }

    if($this->input->post("ip_address"))
        {
          $this->db->like("ci_user_log.ip_address", $this->input->post("ip_address"));
        }

    if($this->input->post("controller"))
        {
          $this->db->like("ci_user_log.controller", $this->input->post("controller"));
        }

    if($this->input->post("url"))
        {
          $this->db->like("ci_user_log.url", $this->input->post("url"));
        }

    if($this->input->post("data"))
        {
          $this->db->like("ci_user_log.data", $this->input->post("data"));
        }

    if($this->input->post("created_at"))
        {
          $this->db->like("ci_user_log.created_at", date('Y-m-d H:i',strtotime($this->input->post("created_at"))));
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
      $this->db->select("auth_user.name");
      $this->db->join("auth_user","auth_user.id_user = ci_user_log.user","left");
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

/* End of file User_log_model.php */
/* Location: ./application/modules/user_log/models/User_log_model.php */
