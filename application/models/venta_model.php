<?php
class Venta_model extends CI_Model {


        public $IdVenta;
        public $CodV;
        public $Fecha;
        public $TipoV;
        public $Descripcion;
        public $IdCliente;
        public $IdTrabajador;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_ventas()
        {
                $query = $this->db->get('venta');
                return $query->result();
        }
         public function post_ventas()
        {
                $fecha = $_POST['Fecha'];
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
              
                $this->CodV    = $_POST['CodV'];
                $this->Fecha    =  $fecha_php;
                $this->TipoV    = $_POST['TipoV'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdCliente    = $_POST['IdCliente'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];

              


                 $this->db->insert('venta', $this);
        }

        public function get_venta($IdVenta){

                $this->db->select('*');
                $this->db->from('venta');
                $this->db->where('IdVenta',$IdVenta);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_venta($IdVenta)
        {
                $this->CodiC  = $_POST['CodC'];
                $this->Fecha    = $_POST['Fecha'];
                $this->TipoC    = $_POST['TipoC'];
                $this->Descripcion    = $_POST['Descripcion'];


                $this->db->update('venta', $this, array('IdVenta' => $IdVenta));
        }

        public function get_buscar_venta(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('venta');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_venta($id){
   
                $query = $this->db->delete("venta", array('IdVenta'=>$id));
                 return $query; 
        }

        public function get_desactivar_venta($id){
                $this->db->set('Estado', False);
                $this->db->where('Idventa', $id);
                $this->db->update('venta');
        }

        public function get_activar_venta($id){
                $this->db->set('Estado', True);
                $this->db->where('Idventa', $id);
                $this->db->update('venta');
        }

}