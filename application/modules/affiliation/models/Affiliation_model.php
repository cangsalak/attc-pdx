<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 20/04/2023 16:11*/
/*| Please DO NOT modify this information*/


class Affiliation_model extends MY_Model{

  private $table        = "affiliation";
  private $primary_key  = "af_id";
  private $column_order = array('af_id', 'af_fname', 'af_address', 'af_web');
  private $order        = array('affiliation.af_id'=>"DESC");
  private $select       = "affiliation.af_id,affiliation.af_id,affiliation.af_fname,affiliation.af_address,affiliation.af_web";

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

    if($this->input->post("af_sname"))
        {
          $this->db->like("affiliation.af_sname", $this->input->post("af_sname"));
        }

    if($this->input->post("af_fname"))
        {
          $this->db->like("affiliation.af_fname", $this->input->post("af_fname"));
        }

    if($this->input->post("af_address"))
        {
          $this->db->like("affiliation.af_address", $this->input->post("af_address"));
        }

    if($this->input->post("af_web"))
        {
          $this->db->like("affiliation.af_web", $this->input->post("af_web"));
        }

    if($this->input->post("af_social"))
        {
          $this->db->like("affiliation.af_social", $this->input->post("af_social"));
        }

    if($this->input->post("af_tel"))
        {
          $this->db->like("affiliation.af_tel", $this->input->post("af_tel"));
        }

    if($this->input->post("af_created_at"))
        {
          $this->db->like("affiliation.af_created_at", date('Y-m-d H:i',strtotime($this->input->post("af_created_at"))));
        }

    if($this->input->post("af_update_at"))
        {
          $this->db->like("affiliation.af_update_at", date('Y-m-d H:i',strtotime($this->input->post("af_update_at"))));
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

/* End of file Affiliation_model.php */
/* Location: ./application/modules/affiliation/models/Affiliation_model.php */
