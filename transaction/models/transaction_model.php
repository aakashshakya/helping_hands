<?php
class Transaction_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('TRANSACTIONS'=>'transactions','USERS'=>'users');
	}

	public function getTransactions($where=NULL,$order_by=NULL)
	{
		$this->db->select('*,u.user_name');
		$this->db->from($this->_TABLES['TRANSACTIONS'].' transactions');
        $this->db->join($this->_TABLES['USERS'].' u','transactions.user_id=u.user_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getTransactions(array('transaction_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['TRANSACTIONS'].' transactions');
		return $this->db->count_all_results();
				
	}	
	
	

}