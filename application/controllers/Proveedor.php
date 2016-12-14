'<?php
class Proveedor extends CI_Controller {


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

          $this->load->model('proveedor_model');
          $data['datos_proveedor'] =  $this->proveedor_model->get_proveedores();
          $this->load->view('proveedor/proveedor_v', $data);
        }

        public function store(){
             $this->load->model('proveedor_model');
             $result = $this->proveedor_model->post_proveedores();
             redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function create(){
          
            $this->load->view('proveedor/proveedor_crear_v');

        }

        public function edit($id){

            $this->load->model('proveedor_model');
            $data['dato_proveedor'] =  $this->proveedor_model->get_proveedor($id);

            $this->load->view('proveedor/proveedor_editar_v', $data);

        }


        public function update($id){
             $this->load->model('proveedor_model');
             $result = $this->proveedor_model->update_proveedor($id);
             redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function search(){
          $this->load->model('proveedor_model');
          $data['datos_proveedor'] =  $this->proveedor_model->get_buscar_proveedor();
          $this->load->view('proveedor/proveedor_v', $data);
        }

        public function delete($id){
           $this->load->model('proveedor_model');
           $this->proveedor_model->get_eliminar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('proveedor_model');
            $this->proveedor_model->get_desactivar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');
        }

        public function activate($id){
          $this->load->model('proveedor_model');
            $this->proveedor_model->get_activar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');
        }

}