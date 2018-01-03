<?php
	class User_Model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function get_user()
		{
			$query = $this->db->get('user');
			return $query->result();
		}

		function user_insert($arr){
			$this->db->insert('user', $arr);
		}

		function user_update($username,$arr){
			$this->db->where('username', $username);
			$this->db->update('user', $arr);
		}

		function user_delete($id){
			$this->db->where('id', $id);
			$this->db->delete('user');
		}

		function user_select($username){
			$this->db->where('username', $username);
			$this->db->select('*');	
			$query = $this->db->get('user');
			return $query->result();	
		}

		function get_username($id)
		{
			$this->db->where('id', $id);
			$this->db->select('*');	
			$query = $this->db->get('user');
			return $query->result();
		}
	}

?>