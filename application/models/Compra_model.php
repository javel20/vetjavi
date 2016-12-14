<?php
class Compra_model extends CI_Model {


        public $CodC;
        public $Fecha;
        public $TipoC;
        public $Descripcion;
        public $IdProveedor;
        public $IdTrabajador;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_compras()
        {

                $this->db->select('*, proveedor.Nombre  as NombreProv');
                $this->db->from('compra');
                $this->db->join('proveedor', 'proveedor.IdProveedor = compra.IdProveedor');
                $query = $this->db->get();
                // die(var_dump($query->result()));
                return $query->result();


                

        }
         public function post_compras()
        {
        
                $fecha = $_POST['Fecha'];
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];




                
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                
                $this->CodC    = $_POST['CodC'];
                $this->Fecha    =  strval(trim($fecha_php));
                $this->TipoC    = $_POST['TipoC'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdProveedor    = $_POST['IdProveedor'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];

                // die(var_dump($this));
                 $this->db->insert('compra', $this);


                 $insert_id = $this->db->insert_id();

                // die(json_encode($_POST['nombre_detalle']));
                $acum="";
                foreach($_POST['nombre_detalle'] as $key=>$valor){
                        // $acum+=$valor;
                        $data_detalle = array(

                                'IdCompra' => $insert_id,
                                'IdProducto' => $_POST['nombre_detalle'][$key],
                                'Cantidad' => $_POST['cantidad_detalle'][$key],
                                'fechaVen' =>$_POST['fecha'][$key],
                               


                        );
                        $this->db->insert("detallecompraproducto", $data_detalle);
                }
                // die(json_encode($acum));
        }

        public function get_compra($IdCompra){

                $this->db->select('*');
                $this->db->from('compra');
                $this->db->where('IdCompra',$IdCompra);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_compra($IdCompra)
        {
                $fecha = $_POST['Fecha'];
                $pos = preg_match('/[\/]+/',$fecha);
                if($pos == true){
                        $array = explode('/', $fecha);
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                
                $this->CodC    = $_POST['CodC'];
                $this->Fecha    =  strval(trim($fecha_php));
                $this->TipoC    = $_POST['TipoC'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdProveedor    = $_POST['IdProveedor'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];


                $this->db->update('compra', $this, array('IdCompra' => $IdCompra));
        }

        public function get_buscar_compra(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, proveedor.Nombre  as NombreProv');
                $this->db->from('compra');
                $this->db->join('proveedor', 'proveedor.IdProveedor = compra.IdProveedor');
                $this->db->like($tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_compra($id){
   
                $query = $this->db->delete("compra", array('IdCompra'=>$id));
                 return $query; 
        }

        public function get_desactivar_compra($id){
                $this->db->set('Estado', False);
                $this->db->where('Idcompra', $id);
                $this->db->update('compra');
        }

        public function get_activar_compra($id){
                $this->db->set('Estado', True);
                $this->db->where('Idcompra', $id);
                $this->db->update('compra');
        }

        public function get_detalle($id){

                $this->db->select('*, producto.Nombre as nomcom');
                $this->db->from('detallecompraproducto');
                $this->db->join('producto', 'producto.IdProducto = detallecompraproducto.IdProducto');
                $this->db->where('IdCompra', $id);
                
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();

        }

}