<?php
include APPPATH ."helpers/Permisos_trait.php";
class Venta extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(16);
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
          $this->load->model('Venta_model');
          $data['datos_venta'] =  $this->Venta_model->get_ventas($inicio,$limite);
          $config['base_url'] = base_url().'index.php/venta/pagina/';
          $config['total_rows'] = count($this->Venta_model->get_ventas());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/venta/pagina/1';  

          $this->load->view('venta/venta_v', $data);
        }

        public function store(){
             $this->load->model('Venta_model');
             $result = $this->Venta_model->post_ventas();
             redirect(base_url().'index.php/venta', 'refresh');

        }

        public function create(){
            $this->load->model('Cliente_model');
            $data['clientes'] = $this->Cliente_model->get_clientes();
            $this->load->model('Producto_model');
            $data['productos'] = $this->Producto_model->get_productos();
            $this->load->model('StockPresen_model');
            $data['presentacion'] = $this->StockPresen_model->get_presen();
            $this->load->model('TipoProducto_model');
            $data['tipoproductos'] = $this->TipoProducto_model->get_tipoproductos();
            $this->load->view('venta/venta_crear_v', $data);

        }

        public function edit($id){


            $this->load->model('Venta_model');
            $data['dato_venta'] =  $this->Venta_model->get_venta($id);
            $this->load->model('cliente_model');
            $data['clientes'] =  $this->cliente_model->get_clientes();         

            $this->load->view('venta/venta_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Venta_model');
             $result = $this->Venta_model->update_venta($id);
             redirect(base_url().'index.php/venta', 'refresh');

        }

        public function search(){
          $this->load->model('Venta_model');
          $data['datos_venta'] =  $this->Venta_model->get_buscar_venta();
          $this->load->view('venta/venta_v', $data);
        }

        public function delete($id){
          
           $this->load->model('Venta_model');
           $this->Venta_model->get_eliminar_venta($id);
            redirect(base_url().'index.php/venta', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('Venta_model');
            $this->Venta_model->get_desactivar_venta($id);
            redirect(base_url().'index.php/venta', 'refresh');
        }

        public function activate($id){
          $this->load->model('Venta_model');
            $this->Venta_model->get_activar_venta($id);
            redirect(base_url().'index.php/venta', 'refresh');
        }

        public function detalle($id)
        {

            $this->load->model('Venta_model');
            $data['datos_detalle'] = $this->Venta_model->get_detalle($id);
            $this->load->view('venta/detalle_venta_v', $data);

        }

}