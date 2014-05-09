<?php
class News_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('NEWS'=>'news');
	}

	public function getNews($where=NULL,$order_by=NULL)
	{
		$this->db->select('*');
		$this->db->from($this->_TABLES['NEWS'].' news');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getNews(array('news_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['NEWS'].' news');
		return $this->db->count_all_results();
				
	}	
	
	

}