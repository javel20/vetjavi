<?php
class Venta extends CI_Controller {

        public function index()
        {

          $this->load->model('Venta_model');
          $data['datos_venta'] =  $this->Venta_model->get_ventas();
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
          $data['datos_venta'] =  $this->Cliente_model->get_buscar_venta();
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

}