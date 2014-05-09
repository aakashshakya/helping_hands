<?php
class Event_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('EVENTS'=>'events','VENUES'=>'venues');
	}

	public function getEvents($where=NULL,$order_by=NULL)
	{
		$this->db->select('*,v.venue_name');
		$this->db->from($this->_TABLES['EVENTS'].' events');
        $this->db->join($this->_TABLES['VENUES'].' v','events.venue_id=v.venue_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getEvents(array('event_id'=>$id))->result_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['EVENTS'].' events');
		return $this->db->count_all_results();
				
	}	
	
	

}