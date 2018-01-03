<?php
	class Message_Model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function get_message()
		{
			$this->db->select('*');
			$this->db->from('message');
			$this->db->join('user', 'user_id = user.id');
			$query = $this->db->get();
			return $query->result();
		}

		function insert_message($arr){
			$this->db->insert('message', $arr);
		}

		function update_message($id,$arr){
			$this->db->where('form_id', $id);
			$this->db->update('message', $arr);
		}

		function delete_message($id){
			$this->db->where('form_id', $id);
			$this->db->delete('message');
		}

		function select_message($id){
			$this->db->where('form_id', $id);
			$this->db->select('*');	
			$this->db->from('message');
			$this->db->join('user', 'user_id = user.id');
			$query = $this->db->get();
			return $query->result();	
		}
	}
?>