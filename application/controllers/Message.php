<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Message_Model');
        $this->load->model('User_Model');
    }

    public function index()
    {
    	$data = array();

        if($query = $this->Message_Model->get_message())
        {
        	$data['record'] = $query;
        }
        $this->load->view('Message_index', $data);
    }

    public function check()
    {
        $arr = array();
        $query = $this->Message_Model->get_message();
        foreach ($query as $row) {
            $arr['id'] = $this->User_Model->get_username($row->user_id);
        }
        print_r($arr);
    }

    public function create_view()
    {
    	$this->load->view('Create_Message');
    }

    public function create()
    {
    	$data = array(
        	'user_id'   =>  $this->session->userdata('id'),  
            'message'   =>  $this->input->post('message')
        );
        $this->Message_Model->insert_message($data);
        redirect('/Message/index');
    }

    public function update_view()
    {
    	$id = $this->input->post('form_id');
    	$data['record'] = $this->Message_Model->select_message($id);
    	$this->load->view('Update_Message', $data);
    }

	public function update(){
		$id = $this->input->post('form_id');
		$data = array(
			'message' => $this->input->post('message')
        );
		$this->Message_Model->update_message($id, $data);
		redirect('/Message/index');
	}

	public function delete(){
		$form_id = $this->input->post('form_id');
		$this->Message_Model->delete_message($form_id);
		redirect('/Message/index');
	}

    public function Bootstrap()
    {
        $data = array();

        if($query = $this->Message_Model->get_message())
        {
            $data['record'] = $query;
        }
        $this->load->view('Bootstrap', $data);
    }

}
