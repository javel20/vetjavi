<?php
class TipoCita extends CI_Controller {


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

          $this->load->model('tipocita_model');
          $data['datos_tipocita'] =  $this->tipocita_model->get_tipocitas();
          $this->load->view('tipocita/tipocita_v', $data);
        }

        public function store(){
             $this->load->model('tipocita_model');
             $result = $this->tipocita_model->post_tipocitas();
             redirect(base_url().'index.php/tipocita', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipocita/tipocita_crear_v');

        }

        public function edit($id){

            $this->load->model('tipocita_model');
            $data['dato_tipocita'] =  $this->tipocita_model->get_tipocita($id);

            $this->load->view('tipocita/tipocita_editar_v', $data);

        }


        public function update($id){
             $this->load->model('tipocita_model');
             $result = $this->tipocita_model->update_tipocita($id);
             redirect(base_url().'index.php/tipocita', 'refresh');

        }

        public function search(){
          $this->load->model('tipocita_model');
          $data['datos_tipocita'] =  $this->tipocita_model->get_buscar_tipocita();
          $this->load->view('tipocita/tipocita_v', $data);
        }

        public function delete($id){
           $this->load->model('tipocita_model');
           $this->tipocita_model->get_eliminar_tipocita($id);
            redirect(base_url().'index.php/tipocita', 'refresh');

        }


}