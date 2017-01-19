<?php
include APPPATH ."helpers/Permisos_trait.php";
class Producto extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(8);
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
          $this->load->model('producto_model');
          $data['datos_producto'] =  $this->producto_model->get_productos($inicio,$limite);
          $config['base_url'] = base_url().'index.php/producto/pagina/';
          $config['total_rows'] = count($this->producto_model->get_productos());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/producto/pagina/1';
          $this->pagination->initialize($config);
          $this->load->view('producto/producto_v', $data);
        }

        public function store(){
             $this->load->model('producto_model');
             $result = $this->producto_model->post_productos();
             redirect(base_url().'index.php/producto', 'refresh');

        }

        public function create(){
          
            $this->load->model('TipoProducto_model');
            $data['tp'] = $this->TipoProducto_model->get_tipoproductos();
            $this->load->view('producto/producto_crear_v', $data);

        }

        public function edit($id){

            $this->load->model('TipoProducto_model');
            $data['tp'] =  $this->TipoProducto_model->get_tipoproductos();

            $this->load->model('Producto_model');
            $data['dato_producto'] =  $this->Producto_model->get_producto($id);
            $this->load->view('producto/producto_editar_v', $data);

        }


        public function update($id){
             $this->load->model('producto_model');
             $result = $this->producto_model->update_producto($id);
             redirect(base_url().'index.php/producto', 'refresh');

        }

        public function search(){
          $this->load->model('Producto_model');
          $data['datos_producto'] =  $this->Producto_model->get_buscar_producto();
          $this->load->view('producto/producto_v', $data);
        }

        public function delete($id){
           $this->load->model('producto_model');
           $this->producto_model->get_eliminar_producto($id);
            redirect(base_url().'index.php/producto', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('producto_model');
            $this->producto_model->get_desactivar_producto($id);
            redirect(base_url().'index.php/producto', 'refresh');
        }

        public function activate($id){
          $this->load->model('producto_model');
            $this->producto_model->get_activar_producto($id);
            redirect(base_url().'index.php/producto', 'refresh');
        }

        public function presen($id){

            $this->load->model('StockPresen_model');
            $presen['dato_presen'] =$this->StockPresen_model->get_presenajax($id);
            echo json_encode($presen);

        }

}