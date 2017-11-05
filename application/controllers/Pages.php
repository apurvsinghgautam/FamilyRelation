<?php
	class Pages extends CI_Controller{
		public function view($page='home'){
			if(!file_exists(APPPATH.'views/'.$page.'.php')){
				show_404();
			}


			if(!$this->session->userdata('logged_in')){
				$data['title']=ucfirst($page);
				$data['family_name']="Please Log In to Continue";
				$this->load->view('templates/header');
				$this->load->view($page,$data);
				$this->load->view('templates/footer');

			}else{
				
				$data['title']=ucfirst($page);
				$data['family_name']=$this->session->userdata('family_name');
				$this->load->view('templates/header');
				$this->load->view($page,$data);
				$this->load->view('templates/footer');
			}
		}
	}