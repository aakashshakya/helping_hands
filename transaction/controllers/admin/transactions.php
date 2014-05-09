<?php 

class Transactions extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaction/transaction_model');
        $this->load->model('user_model');
	}
	
    
	public function index()
	{
	    $data['view_page']='admin/index.php';
        $data['header']='Transactions';
		$data['transactions']=$this->transaction_model->getTransactions()->result_array();
		$this->load->view($this->_container,$data);
	}
	
	public function lists()
	{
	    $partial_page='admin/lists';
		$data['transactions']=$this->transaction_model->getTransactions()->result_array();
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
        $data['header']='Add Transaction';
		$data['users']=$this->user_model->getUsers()->result_array();
        $this->load->view($this->_container,$data);
    }
	 
	 
    public function edit($id)
    {
        $data['view_page']='admin/edit.php';
		//$transactions=$this->transaction_model->getTransactions()->result_array();
        $transaction=$this->transaction_model->getTransactions(array('transaction_id'=>$id))->row_array();
        $data['users']=$this->user_model->getUsers()->result_array();
        $data['header']='Edit Transaction';  
		//$data['transactions']=$transactions;
        $data['transaction']=$transaction;
        $this->load->view($this->_container,$data);
    }
    
    public function save()
    {
        $data=$this->_get_posted_data();
        if($this->input->post('transaction_id')=='')
        {
            $this->transaction_model->insert('TRANSACTIONS',$data);
            redirect(site_url('transaction/admin/transactions'));
        }
        else
        {
            $this->transaction_model->update('TRANSACTIONS',$data,array('transaction_id'=>$data['transaction_id']));
            redirect(site_url('transaction/admin/transactions'));
        }
    }
    
    public function remove($id)
    {
        $this->transaction_model->delete('TRANSACTIONS',array('transaction_id'=>$id));
        redirect(site_url('transaction/admin/transactions'));
    }
    
    private function _get_posted_data()
	{
		$data['transaction_id']=$this->input->post('transaction_id');
		$data['user_id']=$this->input->post('user_id');
		$data['transaction_image']=$this->input->post('transaction_image');
		return $data;
	}
	
	public function json(){
		$rows=$this->transaction_model->getTransactions()->result_array();
	     echo json_encode($rows);
	}
	
	public function getByIdJSON()
	{
		$id=$this->input->get('id');
		if($id)
		{
			$rows=$this->transaction_model->getTransactions(array('transaction_id'=>$id))->row_array();
	     	echo json_encode($rows);	
		}
	}
}

?>

