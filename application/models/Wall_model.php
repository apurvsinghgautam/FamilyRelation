<?php
	class Wall_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}

		public function get_posts(){
			
			$this->db->where('Family_id',$this->session->userdata('family_id'));
			$this->db->order_by('Post_id', 'DESC');
			$query = $this->db->get('post');
			return $query->result_array();
		}

		public function create_post(){

			$data = array(
				'Family_id' => $this->session->userdata('family_id'),
				'Email_id' => $this->session->userdata('email_id'),
				'Content' => $this->input->post('body')
			);
			return $this->db->insert('post', $data);
		}

		public function get_post_name(){

			$this->db->select("Name");
			$this->db->from('post');
			$this->db->join('user','user.Email_id=post.Email_id');
			$this->db->where('post.Family_id',$this->session->userdata('family_id'));
			$this->db->order_by('Post_id', 'DESC');
			$result=$this->db->get();
			return $result->result_array();
			
		}
	}