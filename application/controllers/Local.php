'<?php
class Local extends CI_Controller {


        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->authenticate();

        }

        function authenticate()
        {
          if(!$this->session->userdata('Email'))
          {
            redirect('login');
          }
        }

        public function index()
        {

          $this->load->model('Local_model');
          $data['datos_local'] =  $this->Local_model->get_locales();
          $this->load->view('local/local_v', $data);
        }

        public function store(){
             $this->load->model('Local_model');
             $result = $this->Local_model->post_locales();
             redirect(base_url().'index.php/local', 'refresh');

        }

        public function create(){
          
            $this->load->view('local/local_crear_v');

        }

        public function edit($id){

            $this->load->model('Local_model');
            $data['dato_local'] =  $this->Local_model->get_local($id);

            $this->load->view('local/local_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Local_model');
             $result = $this->Local_model->update_local($id);
             redirect(base_url().'index.php/local', 'refresh');

        }

        public function search(){
          $this->load->model('Local_model');
          $data['datos_local'] =  $this->Local_model->get_buscar_local();
          $this->load->view('local/local_v', $data);
        }

        public function delete($id){
           $this->load->model('Local_model');
           $this->Local_model->get_eliminar_local($id);
            redirect(base_url().'index.php/local', 'refresh');

        }



}