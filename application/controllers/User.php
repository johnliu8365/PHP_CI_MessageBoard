<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('User_Model');
    }

	public function index()
	{
		$this->load->view('User/User_Index');
	}

	public function create_user_view()
    {
    	$this->load->view('User/Create_User');
    }

    public function create_user()
    {
    	$data = array(
        	'username'		=>	$this->input->post('username'), 
            'password'		=>	$this->input->post('password'), 
            'name'			=>	$this->input->post('name'), 
            'membership'	=>	$this->input->post('membership')
        );
        $data['password'] = do_hash($data['password'], 'sha256');

        if($this->User_Model->user_select($data['username']) == true)
        {
        	echo "使用者已存在。";
        }
        else
        {
        	$this->User_Model->user_insert($data);
        	redirect('/User/index');
        }

    }

	public function check_login()
	{
		$user = $this->User_Model->user_select($_POST['uname']);

		if($user == TRUE)
		{
			if($user[0]->password == do_hash($_POST['upass'], 'sha256'))
			{
				$arr = array(
					'id'			=>	$user[0]->id,
					'username' 		=>	$user[0]->username, 
					'password'		=>	$user[0]->password, 
					'name' 			=>	$user[0]->name, 
					'membership'	=>	$user[0]->membership
				);
				$this->session->set_userdata($arr);
				redirect('/Message/index');
			}
		else
			{
				echo "密碼不正確";
			}
		}
		else
		{
			echo"用戶不存在";
		}
	}

	public function logout(){
		$array_items = array('id', 'username', 'name', 'membership');
		$this->session->unset_userdata($array_items);
		redirect('/Message/index');
	}

	    public function manage_view_user()
    {
    	$membership = $this->session->userdata('membership');
    	if($membership == 'user')
    	{
    		$this->load->view('User/Manage_User_User');
    	}
    	elseif($membership == 'admin')
    	{
    		if($query = $this->User_Model->get_user())
        	{
        		$data['record'] = $query;
        	}
    		$this->load->view('User/Manage_Admin_Index', $data);
    	}
    }

    public function manage_view_admin()
    {
    	$username = $this->input->post('username');
    	$data['record'] = $this->User_Model->user_select($username);
    	$this->load->view('User/Manage_Admin_User', $data);
    }

	public function manage(){
		$arr = array(
			'username' 		=>	$this->input->post('username'), 
			'password'		=>	$this->input->post('password'), 
			'name' 			=>	$this->input->post('name'), 
			'membership'	=>	$this->input->post('membership') 
		);
		$old_password = $this->input->post('old_password');
		$arr['password'] = do_hash($arr['password'] , 'sha256');

		if($this->session->userdata('username') == 'admin')
		{
			$this->User_Model->user_update($arr['username'], $arr);
			redirect('/User/manage_view_user');	
		}
		elseif(do_hash($old_password, 'sha256') == $this->session->userdata('password'))
		{
			$this->User_Model->user_update($arr['username'], $arr);
			$this->session->set_userdata($arr);
			redirect('/Message/index');	
		}
		else
		{
			echo "舊密碼不正確";
		}

	}

	public function delete(){
		$id = $this->input->post('id');
		$this->User_Model->user_delete($id);
		redirect('/User/manage_view_user');
	}
}