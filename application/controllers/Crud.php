<?php
    class Crud extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Crud_Model');
            $this->load->library('form_validation');
        }

        public function add_new_user(){
            $username = $this->input->get('add_username');
            $email = $this->input->get('add_email');
            if ($username === "" or $email === "") {
                $msg[] = array(
                              'type' => 'error',
                              'msg' => 'Campos Requeridos',
                              'class' => 'animated tada card-danger'
                            );
            }
            else {
                $data_user = array();
                $data_user['username'] = $username;
                $data_user['email'] = $email;
                $this->Crud_Model->add_new_user_model($data_user);
                $msg[] = array(
                              'type' => 'success',
                              'msg' => 'Datos Agregados Exitosamente',
                              'class' => 'animated tada card-success',
                              'remove_class' => 'card-danger'
                            );
            }
            echo json_encode($msg);
        }
    }
?>
