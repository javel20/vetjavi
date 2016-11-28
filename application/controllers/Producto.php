<?php
class Producto extends CI_Controller {

        public function index()
        {

          $this->load->model('producto_model');
          $data['datos_producto'] =  $this->producto_model->get_productos();
          $this->load->view('producto/producto_v', $data);
        }

        public function store(){
             $this->load->model('producto_model');
             $result = $this->producto_model->post_productos();
             redirect(base_url().'index.php/producto', 'refresh');

        }

        public function create(){
          
            $this->load->view('producto/producto_crear_v');

        }

        public function edit($id){

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
          $this->load->model('producto_model');
          $data['datos_producto'] =  $this->producto_model->get_buscar_producto();
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

}