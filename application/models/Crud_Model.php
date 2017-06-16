<?php
    class Crud_Model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        public function view_contact_model(){
            return $this->db->get('users')->result();
        }
    }
?>
