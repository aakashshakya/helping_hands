<?php

class Album extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('album/album_model');
        //$this->load->model('events/event_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/album/index';
        $data['header']='Albums';
		$data['albums']=$this->album_model->getAlbums()->result_array();
		$this->load->view($this->_container,$data);
	}	
}