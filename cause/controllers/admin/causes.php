<?php 

class Causes extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cause_model');
        $this->load->model('beneficial_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index.php';
        $data['header']='Causes';
		$data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
		//$data['causes']=$this->cause_model->getCauses()->result_array();
		$this->load->view($this->_container,$data);
	}
	
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['causes']=$this->cause_model->getCauses()->result_array();
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
        $data['view_page']='admin/add.php';
        $data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
        $data['header']='Add Cause';
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='admin/edit.php';
        $cause=$this->cause_model->getCauses(array('cause_id'=>$id))->row_array();
        $data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
        $data['header']='Edit '.$cause['cause_name'];  
        $data['cause']=$cause;
        $this->load->view($this->_container,$data);
    }
    
    
		public function save()
	{
		$data=$this->_get_posted_data();
		$success=FALSE;
		if($data['cause_id']==''){
			$success=$this->cause_model->insert('CAUSES',$data);
		}
		else
		{
			$success=$this->cause_model->update('CAUSES',$data,array('cause_id'=>$data['cause_id']));
		}
		
		echo json_encode(array('success'=>$success));
		
	}
    
    public function remove($id)
    {
        $success=$this->cause_model->delete('CAUSES',array('cause_id'=>$id));
        echo json_encode(array('success'=>$success));
    }
    
    private function _get_posted_data()
	{
		$data['cause_id']=$this->input->post('cause_id');
		$data['cause_name']=$this->input->post('cause_name');
		$data['cause_description']=$this->input->post('cause_description');
        $data['beneficial_id']=$this->input->post('beneficial_id');
		$data['status']=$this->input->post('status');
		return $data;
	}
	
	public function json(){
		$rows=$this->cause_model->getCauses()->result_array();
	     echo json_encode($rows);
	}
	
	public function getByIdJSON()
	{
		$id=$this->input->get('id');
		if($id)
		{
			$rows=$this->cause_model->getCauses(array('cause_id'=>$id))->row_array();
	     	echo json_encode($rows);	
		}
	}
}

?>


