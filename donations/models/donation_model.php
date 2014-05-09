<?php
class Donation_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('DONATIONS'=>'donations','USERS'=>'users','TRANSACTIONS'=>'transactions');
	}

	public function getDonations($where=NULL,$order_by=NULL)
	{
		$this->db->select('donations.*,u.user_name,t.transaction_image');
		$this->db->from($this->_TABLES['DONATIONS'].' donations');
        $this->db->join($this->_TABLES['USERS'].' u','donations.user_id=u.user_id','LEFT');
        $this->db->join($this->_TABLES['TRANSACTIONS'].' t','donations.transaction_id=t.transaction_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getDonations(array('donation_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['DONATIONS'].' donations');
		return $this->db->count_all_results();
				
	}	
	
	

}