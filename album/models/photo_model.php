<?php
class Photo_model extends MY_Model
{
	var $joins=array();

	public function __construct()
	{
		parent::__construct();
		$this->_TABLES=array('ALBUMS'=>'tbl_albums','PHOTOS'=>'tbl_photos','PHOTOGRAPHER'=>'tbl_photographers');
		$this->_JOIN=array('ALBUMS'=>array('fields'=>'albums.album_name','join'=>'photos.album_id=albums.album_id','join_type'=>'LEFT','alias'=>'albums'),
		'PHOTOGRAPHER'=>array('fields'=>'ph.first_name,ph.last_name','join'=>'photos.photographer_id=ph.photographer_id','join_type'=>'LEFT','alias'=>'ph'));
		
	}

	public function getPhotos($where=NULL,$order_by=NULL)
	{
		$fields='photos.*';
		foreach($this->joins as $j)
		{
			//print_r($this->_JOIN[$j]);	
			$fields.=','.$this->_JOIN[$j]['fields'];
		}
		//echo $fields;
		//exit;
		$this->db->select($fields);
		$this->db->from($this->_TABLES['PHOTOS'].' photos');
        
		foreach($this->joins as $j)
		{
			//print_r($this->_JOIN[$j]);	
			//$fields.=','.$this->_JOIN[$j]['fields'];
			$this->db->join($this->_TABLES[$j]. ' '. $this->_JOIN[$j]['alias'], $this->_JOIN[$j]['join'], $this->_JOIN[$j]['join_type']);
		}		
		//$this->db->join($this->_TABLES['ALBUMS'].' albums','photos.album_id=albums.album_id','LEFT');
		
		(!is_null($where))?$this->db->where($where):NULL;
		(!is_null($order_by))?$this->db->order_by($order_by):NULL;
		
		return $this->db->get();
				
	}
	
	public function getById($id)
	{
		return $this->getPhotos(array('photo_id'=>$id))->row_array();
	}
	
	public function count($where=NULL)
	{

		(!is_null($where))?$this->db->where($where):NULL;
		$this->db->from($this->_TABLES['PHOTOS'].' photos');
		return $this->db->count_all_results();
				
	}	
	
	

}