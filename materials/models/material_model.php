<?php
class Material_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('MATERIALS'=>'materials','TYPES'=>'types');
	}

	public function getMaterials($where=NULL,$order_by=NULL)
	{
		$this->db->select('materials.*,t.type_name');
		$this->db->from($this->_TABLES['MATERIALS'].' materials');
        $this->db->join($this->_TABLES['TYPES'].' t','materials.type_id=t.type_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getMaterials(array('material_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['MATERIALS'].' materials');
		return $this->db->count_all_results();
				
	}	
	
	

}