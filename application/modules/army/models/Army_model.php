<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| instagram : # */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 24/04/2023 11:37*/
/*| Please DO NOT modify this information*/


class Army_model extends MY_Model{

  private $table        = "army";
  private $primary_key  = "a_id";
  private $column_order = array('a_id', 'rank_r_id', 'image', 'a_fname', 'a_lname', 'a_armyid', 'affiliation_af_id', 'email');
  private $order        = array('army.a_id'=>"DESC");
  private $select       = "army.a_id,army.a_id,army.rank_r_id,army.image,army.a_fname,army.a_lname,army.a_armyid,army.affiliation_af_id,army.email";

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

    if($this->input->post("rank_r_id"))
        {
          $this->db->like("army.rank_r_id", $this->input->post("rank_r_id"));
        }

    if($this->input->post("army_type"))
        {
          $this->db->like("army.army_type", $this->input->post("army_type"));
        }

    if($this->input->post("image"))
        {
          $this->db->like("army.image", $this->input->post("image"));
        }

    if($this->input->post("a_fname"))
        {
          $this->db->like("army.a_fname", $this->input->post("a_fname"));
        }

    if($this->input->post("a_lname"))
        {
          $this->db->like("army.a_lname", $this->input->post("a_lname"));
        }

    if($this->input->post("a_nickname"))
        {
          $this->db->like("army.a_nickname", $this->input->post("a_nickname"));
        }

    if($this->input->post("a_pid"))
        {
          $this->db->like("army.a_pid", $this->input->post("a_pid"));
        }

    if($this->input->post("birthday"))
        {
          $this->db->like("army.birthday", date('Y-m-d',strtotime($this->input->post("birthday"))));
        }

    if($this->input->post("a_armyid"))
        {
          $this->db->like("army.a_armyid", $this->input->post("a_armyid"));
        }

    if($this->input->post("stationed"))
        {
          $this->db->like("army.stationed", date('Y-m-d',strtotime($this->input->post("stationed"))));
        }

    if($this->input->post("model_year"))
        {
          $this->db->like("army.model_year", $this->input->post("model_year"));
        }

    if($this->input->post("turns"))
        {
          $this->db->like("army.turns", $this->input->post("turns"));
        }

    if($this->input->post("position_po_id"))
        {
          $this->db->like("army.position_po_id", $this->input->post("position_po_id"));
        }

    if($this->input->post("affiliation_af_id"))
        {
          $this->db->like("army.affiliation_af_id", $this->input->post("affiliation_af_id"));
        }

    if($this->input->post("educational"))
        {
          $this->db->like("army.educational", $this->input->post("educational"));
        }

    if($this->input->post("weight"))
        {
          $this->db->like("army.weight", $this->input->post("weight"));
        }

    if($this->input->post("height"))
        {
          $this->db->like("army.height", $this->input->post("height"));
        }

    if($this->input->post("blood_group"))
        {
          $this->db->like("army.blood_group", $this->input->post("blood_group"));
        }

    if($this->input->post("gender"))
        {
          $this->db->like("army.gender", $this->input->post("gender"));
        }

    if($this->input->post("skin"))
        {
          $this->db->like("army.skin", $this->input->post("skin"));
        }

    if($this->input->post("shape"))
        {
          $this->db->like("army.shape", $this->input->post("shape"));
        }

    if($this->input->post("defect"))
        {
          $this->db->like("army.defect", $this->input->post("defect"));
        }

    if($this->input->post("congenital_disease"))
        {
          $this->db->like("army.congenital_disease", $this->input->post("congenital_disease"));
        }

    if($this->input->post("e_name"))
        {
          $this->db->like("army.e_name", $this->input->post("e_name"));
        }

    if($this->input->post("e_surname"))
        {
          $this->db->like("army.e_surname", $this->input->post("e_surname"));
        }

    if($this->input->post("these"))
        {
          $this->db->like("army.these", $this->input->post("these"));
        }

    if($this->input->post("registration_date"))
        {
          $this->db->like("army.registration_date", date('Y-m-d',strtotime($this->input->post("registration_date"))));
        }

    if($this->input->post("ethnicity"))
        {
          $this->db->like("army.ethnicity", $this->input->post("ethnicity"));
        }

    if($this->input->post("nationality"))
        {
          $this->db->like("army.nationality", $this->input->post("nationality"));
        }

    if($this->input->post("religion"))
        {
          $this->db->like("army.religion", $this->input->post("religion"));
        }

    if($this->input->post("address"))
        {
          $this->db->like("army.address", $this->input->post("address"));
        }

    if($this->input->post("district"))
        {
          $this->db->like("army.district", $this->input->post("district"));
        }

    if($this->input->post("districts"))
        {
          $this->db->like("army.districts", $this->input->post("districts"));
        }

    if($this->input->post("province"))
        {
          $this->db->like("army.province", $this->input->post("province"));
        }

    if($this->input->post("email"))
        {
          $this->db->like("army.email", $this->input->post("email"));
        }

    if($this->input->post("status"))
        {
          $this->db->like("army.status", $this->input->post("status"));
        }

    if($this->input->post("detail"))
        {
          $this->db->like("army.detail", $this->input->post("detail"));
        }

    if($this->input->post("father_name"))
        {
          $this->db->like("army.father_name", $this->input->post("father_name"));
        }

    if($this->input->post("father_surname"))
        {
          $this->db->like("army.father_surname", $this->input->post("father_surname"));
        }

    if($this->input->post("father_age"))
        {
          $this->db->like("army.father_age", $this->input->post("father_age"));
        }

    if($this->input->post("father_occupation"))
        {
          $this->db->like("army.father_occupation", $this->input->post("father_occupation"));
        }

    if($this->input->post("father_status"))
        {
          $this->db->like("army.father_status", $this->input->post("father_status"));
        }

    if($this->input->post("mother_name"))
        {
          $this->db->like("army.mother_name", $this->input->post("mother_name"));
        }

    if($this->input->post("mother_surname"))
        {
          $this->db->like("army.mother_surname", $this->input->post("mother_surname"));
        }

    if($this->input->post("mother_age"))
        {
          $this->db->like("army.mother_age", $this->input->post("mother_age"));
        }

    if($this->input->post("mother_occupation"))
        {
          $this->db->like("army.mother_occupation", $this->input->post("mother_occupation"));
        }

    if($this->input->post("mother_status"))
        {
          $this->db->like("army.mother_status", $this->input->post("mother_status"));
        }

    if($this->input->post("wife_name"))
        {
          $this->db->like("army.wife_name", $this->input->post("wife_name"));
        }

    if($this->input->post("wife_surname"))
        {
          $this->db->like("army.wife_surname", $this->input->post("wife_surname"));
        }

    if($this->input->post("wife_occupation"))
        {
          $this->db->like("army.wife_occupation", $this->input->post("wife_occupation"));
        }

    if($this->input->post("wife_age"))
        {
          $this->db->like("army.wife_age", $this->input->post("wife_age"));
        }

    if($this->input->post("a_created_at"))
        {
          $this->db->like("army.a_created_at", date('Y-m-d H:i',strtotime($this->input->post("a_created_at"))));
        }

    if($this->input->post("a_updated_at"))
        {
          $this->db->like("army.a_updated_at", date('Y-m-d H:i',strtotime($this->input->post("a_updated_at"))));
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
      $this->db->join("rank","rank.r_id = army.rank_r_id","left");
      $this->db->select("affiliation.af_sname");
      $this->db->join("affiliation","affiliation.af_id = army.affiliation_af_id","left");
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

/* End of file Army_model.php */
/* Location: ./application/modules/army/models/Army_model.php */
