<?php
	class Users extends CI_Controller{
		//Register 
		public function register(){
			$data['title']='Sign Up';
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}

		public function user_register(){
			$data['title']='User Sign Up';
			$this->form_validation->set_rules('email_id', 'Email ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile No', 'required');
			$this->form_validation->set_rules('birthday', 'Birthday', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password_match', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/user_register', $data);
				$this->load->view('templates/footer');
			}else{
				//Hashing Password (Sha256)
				$enc_password=hash('sha256',$this->input->post('password'));

				$this->user_model->user_register($enc_password);

				//Set message
				$this->session->set_flashdata('user_registered',
					'You are now registered');
				redirect('users/login'); 
			}
		}

		public function family_register(){
			$data['title']='Family Sign Up';
			$this->form_validation->set_rules('family_name', 'Family Name', 'required');
			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/family_register', $data);
				$this->load->view('templates/footer');
			}else{

				$family_id = $this->user_model->family_register();
				$this->session->set_flashdata('family_registered',
					('Your family has been registered. Your Family ID is '.$family_id));
				redirect('users/user_register'); 
			}
		}

		//Login
		public function login(){
			$data['title']='Login';
			$this->form_validation->set_rules('family_id', 'Family ID', 'required');
			$this->form_validation->set_rules('email_id', 'Email ID', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				
				$password=hash('sha256',$this->input->post('password'));
				$name_data=$this->user_model->login($password);

				if(!empty($name_data)){
					//Create Session
					$user_data=array(
							'email_id'=>$this->input->post('email_id'),
							'name'=>$name_data['name'],
							'family_name'=>$name_data['fname'],
							'family_id'=>$this->input->post('family_id'),
							'logged_in'=>true
					);
					
					$this->session->set_userdata($user_data);			
					$this->session->set_flashdata('user_loggedin',
					'You are now logged in');
					redirect('pages'); 
				}else{
					$this->session->set_flashdata('login_failed',
					'Invalid Login');
					redirect('users/login');
				}
			}
		}

		//Logout
		public function logout(){
			$this->session->unset_userdata('email_id');
			$this->session->unset_userdata('family_name');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('logged_in');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users/login');
		}

		// Check if email exists
		public function check_email_exists($email){
				$this->form_validation->set_message('check_email_exists', 'The email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}