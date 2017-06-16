<?php

    /**
        @description: Controlador de las vistas
    */
    class Home extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Crud_Model');
        }

        public function index(){
            $data = array();
            $data['view_user'] = $this->Crud_Model->view_contact_model();
            $this->load->view('header');
            $this->load->view('home/index', $data);
            $this->load->view('footer');
        }

    }
?>
