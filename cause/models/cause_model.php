<?php
class Cause_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('CAUSES'=>'causes','BENEFICIALS'=>'beneficials');
	}

	public function getCauses($where=NULL,$order_by=NULL)
	{
		$this->db->select('causes.*,b.beneficial_name');
		$this->db->from($this->_TABLES['CAUSES'].' causes');
        $this->db->join($this->_TABLES['BENEFICIALS'].' b','causes.beneficial_id=b.beneficial_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getCauses(array('cause_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['CAUSES'].' causes');
		return $this->db->count_all_results();
				
	}	
	
	

}