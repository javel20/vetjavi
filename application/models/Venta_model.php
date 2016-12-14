<?php
class Venta_model extends CI_Model {


        // public $IdVenta;
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


                $this->db->select('*, cliente.Nombre  as NombreCliente');
                $this->db->from('venta');
                $this->db->join('cliente', 'cliente.IdCliente = venta.IdCliente');
                $query = $this->db->get();
                // die(var_dump($query->result()));
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
                $insert_id = $this->db->insert_id();

                // die(json_encode($_POST['nombre_detalle']));
                $acum="";
                foreach($_POST['nombre_detalle'] as $key=>$valor){
                        // $acum+=$valor;
                        $data_detalle = array(

                                'IdVenta' => $insert_id,
                                'IdProducto' => $_POST['nombre_detalle'][$key],
                                'StockPresen' =>$_POST['presentacion_detalle'][$key],
                                'Cantidad' => $_POST['cantidad_detalle'][$key],
                                'PrecioTotal' => $_POST['precio_unitario_detalle'][$key]


                        );
                        $this->db->insert("detalleventaproducto", $data_detalle);
                }
                // die(json_encode($acum));
                 
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
                 $fecha = $_POST['Fecha'];
                $pos = strpos($fecha, '/');
                if($pos === true){
                        $array = explode('/', $fecha);
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }
              
                $this->CodV    = $_POST['CodV'];
                $this->Fecha    =  $fecha_php;
                $this->TipoV    = $_POST['TipoV'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdCliente    = $_POST['IdCliente'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];


                $this->db->update('venta', $this, array('IdVenta' => $IdVenta));
        }

        public function get_buscar_venta(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, cliente.Nombre  as NombreCliente');
                $this->db->from('venta');
                $this->db->join('cliente', 'cliente.IdCliente = venta.IdCliente');
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

        public function get_detalle($id){

                $this->db->select('*, producto.Nombre as nompro');
                $this->db->from('detalleventaproducto');
                $this->db->join('producto', 'producto.IdProducto = detalleventaproducto.IdProducto');
                $this->db->where('IdVenta', $id);
                
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();

        }

}