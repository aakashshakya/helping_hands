<?php 

class Beneficials extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('beneficial/beneficial_model');
        $this->load->model('events/event_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index';
        $data['header']='Beneficials';
		$data['events']=$this->event_model->getEvents()->result_array();
		//$data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
		$this->load->view($this->_container,$data);
	}
	
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
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
        $data['view_page']='beneficial/admin/add';
        $data['header']='Add Beneficial';
        $data['events']=$this->event_model->getEvents()->result_array();
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='beneficial/admin/edit';
        $beneficial=$this->beneficial_model->getBeneficials(array('beneficial_id'=>$id))->row_array();
        $data['events']=$this->event_model->getEvents()->result_array();
        $data['header']='Edit '.$beneficial['beneficial_name'];  
        $data['beneficials']=$beneficial;
        $this->load->view($this->_container,$data);
    }
    
		public function saveJson()
	{
		//$data=array('alert_name'=>$this->input->post('alert_name'));
		$data=$this->_get_posted_data();
		$success=FALSE;
		if($data['beneficial_id']==''){
			$success=$this->beneficial_model->insert('BENEFICIALS',$data);
		}
		else
		{
			$success=$this->beneficial_model->update('BENEFICIALS',$data,array('beneficial_id'=>$data['beneficial_id']));
		}
		
		echo json_encode(array('success'=>$success));
		
		//redirect(site_url('admin/alert'));
		//$this->alert_model->delete('ALERTS',array('alert_id'=>2));
		//echo $this->db->last_query();
	}
	  public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('beneficial_id')=='')
        {
            $this->beneficial_model->insert('BENEFICIALS',$data);
            redirect(site_url('beneficial/admin/beneficials'));
        }
        else
        {
            $this->beneficial_model->update('BENEFICIALS',$data,array('beneficial_id'=>$data['beneficial_id']));
            redirect(site_url('beneficial/admin/beneficials'));
        }
    }
    
    public function remove($id)
    {
        $success=$this->beneficial_model->delete('BENEFICIALS',array('beneficial_id'=>$id));
		echo json_encode(array('success'=>$success));
        //redirect(site_url('admin/alert'));
    }
    
    private function _get_posted_data()
	{
		$data['beneficial_id']=$this->input->post('beneficial_id');
		$data['beneficial_name']=$this->input->post('beneficial_name');
		$data['beneficial_address']=$this->input->post('beneficial_address');
        $data['event_id']=$this->input->post('event_id');
		$data['status']=$this->input->post('status');
		return $data;
	}
	
	public function json(){
		$rows=$this->beneficial_model->getBeneficials()->result_array();
	     echo json_encode(array('beneficial'=>$rows));
	}
	
	public function getByIdJSON()
	{
		$id=$this->input->get('id');
		if($id)
		{
			$rows=$this->beneficial_model->getBeneficials(array('beneficial_id'=>$id))->row_array();
	     	echo json_encode($rows);	
		}
	}
}

?>

