<?php
include APPPATH ."helpers/Permisos_trait.php";
class Compra extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(4);
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
          $this->load->model('Compra_model');
          $data['datos_compra'] =  $this->Compra_model->get_compras($inicio,$limite);
          $config['base_url'] = base_url().'index.php/compra/pagina/';
          $config['total_rows'] = count($this->Compra_model->get_compras());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/compra/pagina/1';
          $this->pagination->initialize($config);
          $this->load->view('compra/compra_v', $data);
        }

        public function store(){
             $this->load->model('Compra_model');
             $result = $this->Compra_model->post_compras();
              $this->load->model('StockPresen_model');
              $notif = $this->StockPresen_model->get_notificacion();
              $this->session->set_userdata( 'StockMin',$notif);
             redirect(base_url().'index.php/compra', 'refresh');

        }

        public function create(){

            $this->load->model('proveedor_model');
            $data['proveedores'] = $this->proveedor_model->get_proveedores();
            $this->load->model('Producto_model');
            $data['productos'] = $this->Producto_model->get_productos();
            $this->load->model('StockPresen_model');
            $data['presentacion'] = $this->StockPresen_model->get_presen();
            $this->load->model('TipoProducto_model');
            $data['tipoproductos'] = $this->TipoProducto_model->get_tipoproductos();
            $this->load->view('compra/compra_crear_v', $data);

        }

        public function edit($id){

            $this->load->model('Compra_model');
            $data['dato_compra'] =  $this->Compra_model->get_compra($id);
            $this->load->model('proveedor_model');
            $data['proveedores'] =  $this->proveedor_model->get_proveedores();         

            $this->load->view('compra/compra_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Compra_model');
             $result = $this->Compra_model->update_compra($id);
            //  die(var_dump($result));
             redirect(base_url().'index.php/compra', 'refresh');
             

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Compra_model');
          $data['datos_compra'] =  $this->Compra_model->get_buscar_compra($inicio,$limite);
          $config['base_url'] = base_url().'index.php/compra/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Compra_model->get_buscar_compra());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/compra/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('compra/compra_v', $data);
        }

        public function delete($id){
           $this->load->model('Compra_model');
           $this->Compra_model->get_eliminar_compra($id);
            redirect(base_url().'index.php/compra', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('Compra_model');
            $this->Compra_model->get_desactivar_compra($id);
            redirect(base_url().'index.php/compra', 'refresh');
        }

        public function activate($id){
          $this->load->model('Compra_model');
            $this->Compra_model->get_activar_compra($id);
            redirect(base_url().'index.php/compra', 'refresh');
        }

        public function detalle($id)
        {

            $this->load->model('Compra_model');
            $data['datos_detalle'] = $this->Compra_model->get_detalle($id);
            $this->load->view('compra/detalle_compra_v', $data);

        }

        public function getCompra($codigo){
            $this->load->model('Compra_model');
            $data['json'] = $this->Compra_model->getCompra($codigo);
            // die(json_encode($data['datos']));
            
            $this->load->view('json_view', $data);
            
            // return $data;
           
        }


}