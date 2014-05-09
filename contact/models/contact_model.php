<?php
class Contact_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('CONTACTS'=>'contacts','BENEFICIALS'=>'beneficials');
	}

	public function getContacts($where=NULL,$order_by=NULL)
	{
		$this->db->select('*,b.beneficial_name');
		$this->db->from($this->_TABLES['CONTACTS'].' contacts');
        $this->db->join($this->_TABLES['BENEFICIALS'].' b','contacts.beneficial_id=b.beneficial_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getContacts(array('contact_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['CONTACTS'].' contacts');
		return $this->db->count_all_results();
				
	}	
	
	

}