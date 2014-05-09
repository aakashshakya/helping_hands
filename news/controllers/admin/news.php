<?php 

class News extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index.php';
        $data['header']='News';
		//$data['news']=$this->news_model->getNews()->result_array();
		$this->load->view($this->_container,$data);
	}
	
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['news']=$this->news_model->getNews()->result_array();
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
        $data['header']='Add News';
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='admin/news/edit.php';
        $news=$this->news_model->getNews(array('news_id'=>$id))->row_array();
        $data['header']='Edit '.$news['news_name'];  
        $data['news']=$news;
        $this->load->view($this->_container,$data);
    }
    
  	public function save()
	{
		//$data=array('news_name'=>$this->input->post('news_name'));
		$data=$this->_get_posted_data();
		$success=FALSE;
		if($data['news_id']==''){
			$data['created_date']=date('Y-m-d H:i:s');
			$success=$this->news_model->insert('NEWS',$data);
		}
		else
		{
			$success=$this->news_model->update('NEWS',$data,array('news_id'=>$data['news_id']));
		}
		
		echo json_encode(array('success'=>$success));
		
		//redirect(site_url('admin/news'));
		//$this->news_model->delete('NEWS',array('news_id'=>2));
		//echo $this->db->last_query();
	}
    
    public function remove($id)
    {
        $success=$this->news_model->delete('NEWS',array('news_id'=>$id));
		echo json_encode(array('success'=>$success));
        //redirect(site_url('admin/news'));
    }
    
    private function _get_posted_data()
	{
		$data['news_id']=$this->input->post('news_id');
		$data['news_name']=$this->input->post('news_name');
		$data['news_description']=$this->input->post('news_description');
		$data['status']=$this->input->post('status');
		return $data;
	}
	
	public function json(){
		$rows=$this->news_model->getNews()->result_array();
	     echo json_encode($rows);
	}
	
	public function getByIdJSON()
	{
		$id=$this->input->get('id');
		if($id)
		{
			$rows=$this->news_model->getNews(array('news_id'=>$id))->row_array();
	     	echo json_encode($rows);	
		}
	}
}

?>

