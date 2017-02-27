<?php
include APPPATH ."helpers/Permisos_trait.php";
class Proveedor extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(9);
          $this->authenticate();

        }

        function authenticate()
        {
          if(!$this->session->userdata('Email'))
          {
            redirect('login');
          }
        }

        
        public function index($pagina=FALSE)
        {
          $inicio=0;
          $limite=10;

          if($pagina){
            $inicio=($pagina-1) * $limite;
          }

          $this->load->library('pagination'); 
          $this->load->model('Proveedor_model');
          $data['datos_proveedor'] =  $this->Proveedor_model->get_proveedores($inicio,$limite);
          $config['base_url'] = base_url().'index.php/proveedor/pagina/';
          $config['total_rows'] = count($this->Proveedor_model->get_proveedores());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/proveedor/pagina/1';
          $this->pagination->initialize($config);
          $this->load->view('proveedor/proveedor_v', $data);
        }

        public function store(){
             $this->load->model('Proveedor_model');
             $result = $this->Proveedor_model->post_proveedores();
             redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function create(){
          
            $this->load->view('proveedor/proveedor_crear_v');

        }

        public function edit($id){

            $this->load->model('Proveedor_model');
            $data['dato_proveedor'] =  $this->Proveedor_model->get_proveedor($id);

            $this->load->view('proveedor/proveedor_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Proveedor_model');
             $result = $this->Proveedor_model->update_proveedor($id);
             redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Proveedor_model');
          $data['datos_proveedor'] =  $this->Proveedor_model->get_buscar_proveedor($inicio,$limite);
          $config['base_url'] = base_url().'index.php/proveedor/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Proveedor_model->get_buscar_proveedor());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/proveedor/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('proveedor/proveedor_v', $data);
        }

        public function delete($id){
           $this->load->model('Proveedor_model');
           $this->Proveedor_model->get_eliminar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('Proveedor_model');
            $this->proveedor_model->get_desactivar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');
        }

        public function activate($id){
          $this->load->model('Proveedor_model');
            $this->proveedor_model->get_activar_proveedor($id);
            redirect(base_url().'index.php/proveedor', 'refresh');
        }

}