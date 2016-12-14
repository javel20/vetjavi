<?php
class TipoTrab extends CI_Controller {

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

          $this->load->model('TipoTrab_model');
          $data['datos_tipotrab'] =  $this->TipoTrab_model->get_tipotrabs();
          $this->load->view('tipotrab/tipotrab_v', $data);
        }

        public function store(){
             $this->load->model('TipoTrab_model');
             $result = $this->TipoTrab_model->post_tipotrabs();
             redirect(base_url().'index.php/TipoTrab', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipotrab/tipotrab_crear_v');

        }

        public function edit($id){

            $this->load->model('tipotrab_model');
            $data['dato_tipotrab'] =  $this->tipotrab_model->get_tipotrab($id);

            $this->load->view('tipotrab/tipotrab_editar_v', $data);

        }


        public function update($id){
             $this->load->model('tipotrab_model');
             $result = $this->tipotrab_model->update_tipotrab($id);
             redirect(base_url().'index.php/tipotrab', 'refresh');

        }

        public function search(){
          $this->load->model('tipotrab_model');
          $data['datos_tipotrab'] =  $this->tipotrab_model->get_buscar_tipotrab();
          $this->load->view('tipotrab/tipotrab_v', $data);
        }

        public function delete($id){
           $this->load->model('tipotrab_model');
           $this->tipotrab_model->get_eliminar_tipotrab($id);
            redirect(base_url().'index.php/tipotrab', 'refresh');

        }


}