<?php 

class Events extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('events/event_model');
        $this->load->model('venue_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='events/admin/index';
        $data['header']='Events';
		$data['events']=$this->event_model->getEvents()->result_array();
        //echo $this->db->last_query();
       // exit;
		$this->load->view($this->_container,$data);
	}
	
    public function lists()
	{
	    $partial_page='admin/lists';
		$data['events']=$this->event_model->getEvents()->result_array();
		$this->load->view($partial_page,$data);		
	}
	public function detail($id=NULL)
	{
		if(is_null($id))
		{
			redirect(site_url());
		}
	}
    
    public function add()
    {
        $data['view_page']='events/admin/add';
        $data['header']='Add Event';
        $data['venues']=$this->venue_model->getVenues()->result_array();
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='events/admin/edit';
        $event=$this->event_model->getEvents(array('event_id'=>$id))->row_array();
        $data['venues']=$this->venue_model->getVenues()->result_array();
        $data['header']='Edit '.$event['event_name'];  
        $data['event']=$event;
        $this->load->view($this->_container,$data);
    }
    
    public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('event_id')=='')
        {
            $this->event_model->insert('EVENTS',$data);
            redirect(site_url('events/admin/events'));
        }
        else
        {
            $this->event_model->update('EVENTS',$data,array('event_id'=>$data['event_id']));
            redirect(site_url('events/admin/events'));
        }
    }
    
     public function remove($id)
    {
       $success=$this->event_model->delete('EVENTS',array('event_id'=>$id));
		echo json_encode(array('success'=>$success));
    }
    
    private function _get_posted_data()
	{
		$data['event_id']=$this->input->post('event_id');
		$data['event_name']=$this->input->post('event_name');
		$data['event_description']=$this->input->post('event_description');
        $data['venue_id']=$this->input->post('venue_id');
        $data['start_date']=$this->input->post('start_date');
        $data['end_date']=$this->input->post('end_date');
		$data['status']=$this->input->post('status');
		return $data;
	}
}

?>

