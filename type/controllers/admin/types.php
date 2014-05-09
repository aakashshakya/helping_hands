<?php 

class types extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('type/type_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index.php';
        $data['header']='Type';
		$data['types']=$this->type_model->getTypes()->result_array();
		$this->load->view($this->_container,$data);
	}
	
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['types']=$this->type_model->getTypes()->result_array();
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
        $data['header']='Add Types';
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='admin/edit.php';
        $news=$this->type_model->getNews(array('type_id'=>$id))->row_array();
        $data['header']='Edit '.$type['type_name'];  
        $data['types']=$type;
        $this->load->view($this->_container,$data);
    }
    
   public function save()
	{
		//$data=array('news_name'=>$this->input->post('news_name'));
		$data=$this->_get_posted_data();
		$success=FALSE;
		if($data['type_id']==''){
			$success=$this->type_model->insert('TYPES',$data);
		}
		else
		{
			$success=$this->type_model->update('TYPES',$data,array('type_id'=>$data['type_id']));
		}
		
		echo json_encode(array('success'=>$success));
		
		//redirect(site_url('admin/news'));
		//$this->news_model->delete('NEWS',array('news_id'=>2));
		//echo $this->db->last_query();
	}
    
    public function remove($id)
    {
       $success=$this->type_model->delete('TYPES',array('type_id'=>$id));
		echo json_encode(array('success'=>$success));
    }
    
    private function _get_posted_data()
	{
		$data['type_id']=$this->input->post('type_id');
		$data['type_name']=$this->input->post('type_name');
		$data['status']=$this->input->post('status');
		return $data;
	}
	
    public function json()
    {
		$rows=$this->type_model->getTypes()->result_array();
	     echo json_encode($rows);
	}
	
	public function getByIdJSON()
	{
		$id=$this->input->get('id');
		if($id){
		$rows=$this->type_model->getTypes(array('type_id'=>$id))->row_array();
	     echo json_encode($rows);	
		}
	}
}

?>

