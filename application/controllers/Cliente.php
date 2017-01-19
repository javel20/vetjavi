<?php
include APPPATH ."helpers/Permisos_trait.php";
class Cliente extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(3);
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
          $this->load->model('Cliente_model');
          $data['datos_cliente'] =  $this->Cliente_model->get_clientes($inicio,$limite);
          $config['base_url'] = base_url().'index.php/cliente/pagina/';
          $config['total_rows'] = count($this->Cliente_model->get_clientes());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/cliente/pagina/1';
          $this->pagination->initialize($config);
          $this->load->view('cliente/cliente_v', $data);
        }

        public function store(){

             $this->load->model('cliente_model');
             $result = $this->cliente_model->post_clientes();
            //  die(var_dump($result));  
             redirect(base_url().'index.php/cliente', 'refresh');

        }

        public function create(){
          
            $this->load->view('cliente/cliente_crear_v');

        }

        public function edit($id){

            $this->load->model('cliente_model');
   
            $data['dato_cliente'] =  $this->cliente_model->get_cliente($id);
            // die(var_dump($data['dato_cliente']));  
            $this->load->view('cliente/cliente_editar_v', $data);

        }


        public function update($id){

             $this->load->model('Cliente_model');

             $result = $this->Cliente_model->update_cliente($id);
            //  die(json_encode($result));  
             redirect(base_url().'index.php/cliente', 'refresh');

        }

        public function search(){

          $this->load->model('Cliente_model');
          $data['datos_cliente'] =  $this->Cliente_model->get_buscar_cliente();
          $this->load->view('cliente/cliente_v', $data);
        }

        public function delete($id){

           $this->load->model('cliente_model');
           $this->cliente_model->get_eliminar_cliente($id);
            redirect(base_url().'index.php/cliente', 'refresh');

        }

        public function deactivate($id){
            $this->load->model('cliente_model');
            $this->cliente_model->get_desactivar_cliente($id);
            redirect(base_url().'index.php/cliente', 'refresh');
        }


        public function activate($id){
            $this->load->model('Cliente_model');
            $this->Cliente_model->get_activar_cliente($id);
            redirect(base_url().'index.php/Cliente', 'refresh');
        }

}