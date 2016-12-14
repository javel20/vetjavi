'<?php
class TipoProducto extends CI_Controller {

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

          $this->load->model('TipoProducto_model');
          $data['datos_tipoprod'] =  $this->TipoProducto_model->get_tipoproductos();
          $this->load->view('tipoproducto/tipoproducto_v', $data);
        }

        public function store(){
             $this->load->model('TipoProducto_model');
             $result = $this->TipoProducto_model->post_tipoproductos();
             redirect(base_url().'index.php/tipoproducto', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipoproducto/tipoproducto_crear_v');

        }

        public function edit($id){

            $this->load->model('TipoProducto_model');
            $data['dato_tipoprod'] =  $this->TipoProducto_model->get_tipoproducto($id);

            $this->load->view('tipoproducto/tipoproducto_editar_v', $data);

        }


        public function update($id){
             $this->load->model('TipoProducto_model');
             $result = $this->TipoProducto_model->update_tipoproducto($id);
             redirect(base_url().'index.php/tipoproducto', 'refresh');

        }

        public function search(){
          $this->load->model('TipoProducto_model');
          $data['datos_tipoprod'] =  $this->TipoProducto_model->get_buscar_tipoproducto();
          $this->load->view('tipoproducto/tipoproducto_v', $data);
        }

        public function delete($id){
            $this->load->model('TipoProducto_model');
            $this->TipoProducto_model->get_eliminar_tipoproducto($id);
            redirect(base_url().'index.php/tipoproducto', 'refresh');

        }



}