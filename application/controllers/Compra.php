<?php
class Compra extends CI_Controller {

        public function index()
        {

          $this->load->model('Compra_model');
          $data['datos_compra'] =  $this->Compra_model->get_compras();
          $this->load->view('compra/compra_v', $data);
        }

        public function store(){
             $this->load->model('Compra_model');
             $result = $this->Compra_model->post_compras();
             redirect(base_url().'index.php/compra', 'refresh');

        }

        public function create(){

           $this->load->model('proveedor_model');
            $data['proveedores'] = $this->proveedor_model->get_proveedores();
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
          $this->load->model('Compra_model');
          $data['datos_compra'] =  $this->Compra_model->get_buscar_compra();
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

}