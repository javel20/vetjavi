<?php
class Cliente extends CI_Controller {

        public function index()
        {
          $this->load->model('cliente_model');
          $data['datos_cliente'] =  $this->cliente_model->get_clientes();
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

          $this->load->model('cliente_model');
          $data['datos_cliente'] =  $this->cliente_model->get_buscar_cliente();
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