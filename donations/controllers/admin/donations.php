<?php 

class Donations extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('donations/donation_model');
        $this->load->model('users/user_model');
        $this->load->model('transaction_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='donations/admin/index';
        $data['header']='Donations';
		$data['donations']=$this->donation_model->getDonations()->result_array();
		$this->load->view($this->_container,$data);
	}
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['donations']=$this->donation_model->getDonations()->result_array();
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
        $data['view_page']='donations/admin/add';
        $data['header']='Add Donation';
        $data['users']=$this->user_model->getUsers()->result_array();
        $data['transactions']=$this->transaction_model->getTransactions()->result_array();
        $this->load->view($this->_container,$data);
    }
    
    public function edit($id)
    {
        $data['view_page']='donations/admin/edit';
        $donation=$this->donation_model->getDonations(array('donation_id'=>$id))->row_array();
        $data['users']=$this->user_model->getUsers()->result_array();
        $data['transactions']=$this->transaction_model->getTransactions()->result_array();
        $data['header']='Edit Donation';  
        $data['donation']=$donation;
        $this->load->view($this->_container,$data);
    }
    
    public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('donation_id')=='')
        {
            $this->donation_model->insert('DONATIONS',$data);
            redirect(site_url('donations/admin/donations'));
        }
        else
        {
            $this->donation_model->update('DONATIONS',$data,array('donation_id'=>$data['donation_id']));
            redirect(site_url('donations/admin/donations'));
        }
    }
 
    public function remove($id)
    {
       $success=$this->donation_model->delete('DONATIONS',array('donations_id'=>$id));
		echo json_encode(array('success'=>$success));
    }
    
    private function _get_posted_data()
	{
		$data['donation_id']=$this->input->post('donation_id');
		$data['user_id']=$this->input->post('user_id');
		$data['amount']=$this->input->post('amount');
        $data['account_info']=$this->input->post('account_info');
		$data['transaction_id']=$this->input->post('transaction_id');
		return $data;
	}
}

?>