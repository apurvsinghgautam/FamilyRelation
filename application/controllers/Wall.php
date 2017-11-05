<?php
	class Wall extends CI_Controller{
	
		public function index(){	
		
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}  
			$data['title'] = 'Latest Posts';
			$data['posts'] = $this->wall_model->get_posts();
			//$data['post_name']=$this->wall_model->get_post_name();
			$this->load->view('templates/header');
			$this->load->view('wall/index', $data);
			$this->load->view('templates/footer');
		}
 		
 		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}   
			$data['title'] = 'Create Post';
			$this->form_validation->set_rules('body', 'Body', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('wall/create', $data);
				$this->load->view('templates/footer');
			} else {
				
				$this->wall_model->create_post();
				// Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');
				redirect('wall');
			}
		}
    }
