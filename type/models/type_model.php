<?php
class Type_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('TYPES'=>'types');
	}

	public function getTypes($where=NULL,$order_by=NULL)
	{
		$this->db->select('*');
		$this->db->from($this->_TABLES['TYPES'].' types');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getTypes(array('type_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['TYPES'].' types');
		return $this->db->count_all_results();
				
	}	
	
	

}