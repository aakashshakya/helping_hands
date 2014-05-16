<?php

class Photo extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('album/photo_model');
        //$this->load->model('events/event_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/photo/index';
        $data['header']='Photos';
		$this->photo_model->joins=array('ALBUMS','PHOTOGRAPHER');
		$data['photos']=$this->photo_model->getPhotos()->result_array();
		//echo $this->db->last_query();
	//exit;
		$this->load->view($this->_container,$data);
	}	
	
	public function json()
	{
		$this->photo_model->joins=array('ALBUMS','PHOTOGRAPHER');
		$photos=$this->photo_model->getPhotos()->result_array();
		echo json_encode($photos);
	}
}