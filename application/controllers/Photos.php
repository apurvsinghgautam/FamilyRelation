<?php
	class Photos extends CI_Controller{
		public function index(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}   
			$data['title'] = 'Gallery';
			$data['photos'] = $this->photos_model->get_photos();
			$this->load->view('templates/header');
			$this->load->view('photos/index', $data);
			$this->load->view('templates/footer');
		}
		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}   

			$data['title'] = 'Upload a picture';
			$this->form_validation->set_rules('caption', 'Caption', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('photos/create', $data);
				$this->load->view('templates/footer');
			} else {
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('userfile')){
						$errors = array('error' => $this->upload->display_errors());
						$image = 'noimage.jpg';
				} else {
						$data = array('upload_data' => $this->upload->data());
						$image = $_FILES['userfile']['name'];
				}
				$this->photos_model->create_photo($image);
				// Set message
				$this->session->set_flashdata('image_uploaded', 'Your image has been uploaded');
				redirect('photos');
			}
		}
		public function view(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}   
			$data['title'] = 'View Photo';
			$data['photos'] = $this->photos_model->view_photos();
			$this->load->view('templates/header');
			$this->load->view('photos/view', $data);
			$this->load->view('templates/footer');
		}
	}