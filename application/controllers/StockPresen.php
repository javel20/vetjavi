'<?php
class StockPresen extends CI_Controller {

        public function index()
        {

          $this->load->model('stockpresen_model');
          $data['datos_stockpresen'] =  $this->stockpresen_model->get_stockpresens();
        //   die(var_dump($data));
          $this->load->view('stockpresen/stockpresen_v', $data);
        }

        public function store(){
             $this->load->model('stockpresen_model');
             $result = $this->stockpresen_model->post_stockpresens();
             redirect(base_url().'index.php/stockpresen', 'refresh');

        }

        public function create(){
          
            $this->load->model('producto_model');
             $data['productos'] = $this->producto_model->get_productos();

            $this->load->view('stockpresen/stockpresen_crear_v', $data);
              


        }

        public function edit($id){
            $this->load->model('stockpresen_model');
            $data['tipos']= $this->stockpresen_model->get_stockpresens();
            $this->load->model('stockpresen_model');
            $data['dato_stockpresen'] =  $this->stockpresen_model->get_stockpresen($id);

            $this->load->view('stockpresen/stockpresen_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('stockpresen_model');
             $result = $this->stockpresen_model->update_stockpresen($id);
             redirect(base_url().'index.php/stockpresen', 'refresh');

        }

        public function search(){
          $this->load->model('stockpresen_model');
          $data['datos_stockpresen'] =  $this->stockpresen_model->get_buscar_stockpresen();
          $this->load->view('stockpresen/stockpresen_v', $data);
        }

        public function delete($id){
           $this->load->model('stockpresen_model');
           $this->stockpresen_model->get_eliminar_stockpresen($id);
            redirect(base_url().'index.php/stockpresen', 'refresh');

        }



}