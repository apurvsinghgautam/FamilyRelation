<?php
	class User_model extends CI_Model{
		public function __consuct(){
			$this->load->database();
		}
		//User Register
		public function user_register($enc_password){
			//User data array
			$data=array(
				'Email_id'=>$this->input->post('email_id'),
				'Family_id'=>$this->input->post('family_id'),
				'Password'=>$enc_password,
				'Name'=>$this->input->post('name'),
				'Birthday'=>$this->input->post('birthday'),
				'Address'=>$this->input->post('address')
			);
			//Mobile Data array
			$mob_data=array(
					'Email_id'=>$this->input->post('email_id'),
					'Mobile_no'=>$this->input->post('mobile')
				);
			//Insert data in User table
			$this->db->insert('user',$data);
			//Insert data 
			$this->db->insert('mobile',$mob_data);

			if(!empty($this->input->post('alt_mobile'))){
				$mob_multi_data=array(
					'Email_id'=>$this->input->post('email_id'),
					'Mobile_no'=>$this->input->post('alt_mobile')
				);
				return $this->db->insert('mobile',$mob_multi_data);
			}else{
				return null;
			}
		}
		//Family Register
		public function family_register(){
			//User data aray
			$data=array(
				'Family_name'=>$this->input->post('family_name'),
			);

			//Insert data
			$this->db->insert('family',$data);

			//Get Family_ID
			$this->db->where('Family_name',$this->input->post('family_name'));
			$result=$this->db->get('family');
			if($result->num_rows()==1){
				return $result->row(0)->Family_id;
			}else{
				return false;
			}
		}
		//User Login
		public function login($password){

			$this->db->where('Family_id',$this->input->post('family_id'));
			$this->db->where('Email_id',$this->input->post('email_id'));
			$this->db->where('Password',$password);
			$result=$this->db->get('user');
			$arr_data=[];
			if($result->num_rows()==1){
				$arr_data['name']=$result->row(0)->Name;
			}else{
				return "NULL";
			}

			$this->db->where('Family_id',$this->input->post('family_id'));
			$result=$this->db->get('family');
			if($result->num_rows()==1){
				$arr_data['fname']=$result->row(0)->Family_name;
			}else{
				return "NULL";
			}
			return $arr_data;
		}
	}