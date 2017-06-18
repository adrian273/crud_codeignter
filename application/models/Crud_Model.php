<?php
    class Crud_Model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        public function view_contact_model(){
            return $this->db->get('user')->result();
        }

        public function add_new_user_model($data){
            $insert = $this->db->insert('user', $data);
            if ($insert) {
                return $this->db->insert_id();
            }
        }

        public function delete_user_model($id){
            $this->db->where('id_user', $id);
            $delete = $this->db->delete('user');
        }
    }
?>
