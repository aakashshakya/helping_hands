<?php
class Album_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('ALBUMS'=>'tbl_albums','PHOTOS'=>'tbl_photos');
	}

	public function getAlbums($where=NULL,$order_by=NULL)
	{
		$this->db->select('albums.*');
		$this->db->from($this->_TABLES['ALBUMS'].' albums');
        //$this->db->join($this->_TABLES['EVENTS'].' e','beneficials.event_id=e.event_id','LEFT');
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getAlbums(array('album_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['ALBUMS'].' albums');
		return $this->db->count_all_results();
				
	}	
	
	

}