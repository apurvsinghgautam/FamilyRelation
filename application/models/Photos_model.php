<?php
	class Photos_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}
		public function get_photos(){

				$this->db->where('Family_id',$this->session->userdata('family_id'));
				$this->db->order_by('Photo_id', 'DESC');
				$query = $this->db->get('photo');
				return $query->result_array();
		}
		public function create_photo($image){

			$email_id = $this->session->userdata('email_id');
			$family_id=$this->session->userdata('family_id');
			$data = array(
				'Family_id' => $family_id,
				'Email_id' => $email_id,
				'Location' => $image,
				'Caption' => $this->input->post('caption')
			);
			return $this->db->insert('photo', $data);
		}
		public function view_photos(){
			
			$query = $this->db->get_where('photo', array('photo_id' => $this->input->get('photoId')));
			return $query->result_array();
		}
	}	