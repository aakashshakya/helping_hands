<?php 

class Materials extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('material_model');
        $this->load->model('type_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index';
        $data['header']='Materials';
		$data['materials']=$this->material_model->getMaterials()->result_array();
		$this->load->view($this->_container,$data);
	}
    
   	public function lists()
	{
	    $partial_page='admin/lists';
		$data['materials']=$this->material_model->getMaterials()->result_array();
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
        $data['view_page']='admin/add';
        $data['header']='Add Material';
        $data['types']=$this->type_model->getTypes()->result_array();
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='admin/edit.php';
        $material=$this->material_model->getMaterials(array('material_id'=>$id))->row_array();
        $data['header']='Edit '.$material['material_name'];  
        $data['types']=$this->type_model->getTypes()->result_array();
        $data['material']=$material;
        $this->load->view($this->_container,$data);
    }
    
    public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('material_id')=='')
        {
            $this->material_model->insert('MATERIALS',$data);
            redirect(site_url('materials/admin/materials'));
        }
        else
        {
            $this->material_model->update('MATERIALS',$data,array('material_id'=>$data['material_id']));
            redirect(site_url('materials/admin/materials'));
        }
    }
    
     public function remove($id)
    {
       $success=$this->material_model->delete('MATERIALS',array('material_id'=>$id));
		echo json_encode(array('success'=>$success));
    }
    
    private function _get_posted_data()
	{
		$data['material_id']=$this->input->post('material_id');
		$data['material_name']=$this->input->post('material_name');
		$data['material_quantity']=$this->input->post('material_quantity');
        $data['type_id']=$this->input->post('type_id');
        $data['description']=$this->input->post('description');
		$data['status']=$this->input->post('status');
		return $data;
	}
}

?>

