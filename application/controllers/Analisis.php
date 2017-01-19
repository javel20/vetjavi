<?php 


include APPPATH ."helpers/Permisos_trait.php";
// $this->load->helper("Permisos_trait");
class Analisis extends CI_Controller {

      use Permisos_trait;



        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(1);
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
          $this->load->model('Analisis_model');
          $data['datos_analisis'] =  $this->Analisis_model->get_analisiss($inicio,$limite);
          $config['base_url'] = base_url().'index.php/analisis/pagina/';
          $config['total_rows'] = count($this->Analisis_model->get_analisiss());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/analisis/pagina/1';
          $this->pagination->initialize($config);

          
        //   die(var_dump($data));
        
          $this->load->view('analisis/analisis_v', $data);
          
        }

        public function store(){
             $this->load->model('Analisis_model');
             $result = $this->Analisis_model->post_analisiss();
             redirect(base_url().'index.php/analisis', 'refresh');

        }

        public function create(){
          
            $this->load->model('paciente_model');
             $data['pacientes'] = $this->paciente_model->get_pacientes();

            $this->load->view('analisis/analisis_crear_v', $data);
              


        }

        public function edit($id){
/*            $this->load->model('StockPresen_model');
            $data['tipos']= $this->StockPresen_model->get_stockpresens();
            */
               $this->load->model('paciente_model');
             $data['pacientes'] = $this->paciente_model->get_pacientes();
             $this->load->model('Analisis_model');
            $data['dato_analisis'] =  $this->Analisis_model->get_analisis($id);

            $this->load->view('analisis/analisis_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('analisis_model');
             $result = $this->analisis_model->update_analisis($id);
             redirect(base_url().'index.php/analisis', 'refresh');

        }

        public function search(){

          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Analisis_model');
          
          $data['datos_analisis'] =  $this->Analisis_model->get_buscar_analisis($inicio,$limite);
          $config['base_url'] = base_url().'index.php/analisis/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Analisis_model->get_buscar_analisis());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/analisis/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          // $data['datos_analisis'] =  $this->Analisis_model->get_buscar_analisis();
          $this->load->view('analisis/analisis_v', $data);
        }

        public function delete($id){
           $this->load->model('Analisis_model');
           $this->Analisis_model->get_eliminar_analisis($id);
            redirect(base_url().'index.php/Analisis', 'refresh');

        }



}