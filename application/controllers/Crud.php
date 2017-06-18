<?php
    class Crud extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Crud_Model');
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
                $add_new = $this->Crud_Model->add_new_user_model($data_user);
                if ($add_new !== FALSE){
                    $msg[] = array(
                                  'type' => 'success',
                                  'msg' => 'Datos Agregados Exitosamente',
                                  'class' => 'animated tada card-success',
                                  'remove_class' => 'card-danger',
                                  'request' => "<td>$username</td><td>$email</td>",
                                  'last_id' => $add_new,
                                );
                }
            }
            echo json_encode($msg);
        }

        public function delete_user(){
            $id = $this->input->post('ident');
            $delete = $this->Crud_Model->delete_user_model($id);
        }
    }
?>
