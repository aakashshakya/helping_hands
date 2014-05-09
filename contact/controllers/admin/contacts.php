<?php 

class Contacts extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
        $this->load->model('beneficial_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index.php';
        $data['header']='Contacts';
		$data['contacts']=$this->contact_model->getContacts()->result_array();
		$this->load->view($this->_container,$data);
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
        $data['header']='Add Contact';
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='admin/edit.php';
        $contact=$this->contact_model->getContacts(array('contact_id'=>$id))->row_array();
        $data['beneficials']=$this->beneficial_model->getBeneficials()->result_array();
        $data['header']='Edit '.$contact['contact_number'];  
        $data['contact']=$contact;
        $this->load->view($this->_container,$data);
    }
    
    public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('contact_id')=='')
        {
            $this->contact_model->insert('CONTACTS',$data);
            redirect(site_url('contact/admin/contacts'));
        }
        else
        {
            $this->contact_model->update('CONTACTS',$data,array('contact_id'=>$data['contact_id']));
            redirect(site_url('contact/admin/contacts'));
        }
    }
    
    public function remove($id)
    {
        $this->contact_model->delete('CONTACTS',array('contact_id'=>$id));
        redirect(site_url('admin/contacts'));
    }
    
    private function _get_posted_data()
	{
		$data['contact_id']=$this->input->post('contact_id');
		$data['contact_number']=$this->input->post('contact_number');
        $data['beneficial_id']=$this->input->post('beneficial_id');
		return $data;
	}
}

?>

