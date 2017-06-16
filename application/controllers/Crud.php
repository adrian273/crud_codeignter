<?php
    class Crud extends CI_Controller {
        public function __construct(){
            parent::__contruct();
            $this->load->model('crud_model');
        }
    }
?>
