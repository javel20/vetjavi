<?php
class Venta_model extends CI_Model {


        // public $IdVenta;
        public $CodV;
        public $Fecha;
        public $TipoV;
        public $Descripcion;
        public $Ganancia;
        public $PrecioTotalVenta;
        public $IdCliente;
        public $IdTrabajador;




        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_ventas($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*,  trabajador.ApePat as apepattra, trabajador.ApeMat as apemattra');
                $this->db->from('venta');
                $this->db->join('cliente', 'venta.IdCliente = cliente.IdCliente');
                $this->db->join('trabajador','trabajador.IdTrabajador = venta.IdTrabajador');
                $this->db->where('venta.Estado = "Venta Realizada"');

                //  die(json_encode($query->result()));
                // die(var_dump($query->result()));
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
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
                $this->Ganancia = $_POST['ganancia'];
                $this->PrecioTotalVenta = $_POST['sumatotal'];
                $this->Estado="Venta Realizada";

                $this->db->insert('venta', $this);
                $insert_id = $this->db->insert_id();


                // die(json_encode($_POST['nombre_detalle']));
                $acum="";
                foreach($_POST['nombre_detalle'] as $key=>$valor){
                        // $acum+=$valor;
                        $data_detalle = array(

                                'IdVenta' => $insert_id,
                                'Cantidad' => $_POST['cantidad_detalle'][$key],
                                'PrecioTotal' => $_POST['precio_unitario_detalle'][$key],
                                'Preciot' => $_POST['preciot_detalle'][$key],
                                'IdStockPresen' =>$_POST['presentacion_detalle'][$key]
                                


                        );



                        $this->db->query('update stockpresentacion SET StockReal=StockReal - '. $_POST['cantidad_detalle'][$key] .' where IdStockPresen='.$_POST['presentacion_detalle'][$key]);

                        $this->db->insert("detalleventaproducto", $data_detalle);
                }
                // die(json_encode($acum));
                 
        }

        public function get_venta($IdVenta){

                $this->db->select('*');
                $this->db->from('venta');
                $this->db->where('IdVenta',$IdVenta);   
                
                $query = $this->db->get();

                $fecha = $query->result()[0]->Fecha;
                $pos = preg_match('/[-]+/',$fecha);
                if($pos == true){
                        $array = explode('-', $fecha);
                        $fecha_php =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                $query->result()[0]->Fecha= $fecha_php;

                return $query->result();     

        }

       

        public function update_venta($IdVenta)
        {
                 $fecha = $_POST['Fecha'];
                $pos = preg_match('/[\/]+/',$fecha);
                if($pos == true){
                        $array = explode('/', $fecha);
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }
              
                $this->CodV    = $_POST['CodV'];
                $this->Fecha    =  $fecha_php;
                $this->TipoV    = $_POST['TipoV'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Ganancia = $_POST['ganancia'];
                $this->PrecioTotalVenta = $_POST['sumatotal'];
                $this->IdCliente    = $_POST['IdCliente'];

                $this->IdTrabajador    = $_POST['IdTrabajador'];


                $this->db->update('venta', $this, array('IdVenta' => $IdVenta));
        }

        public function get_buscar_venta($inicio=FALSE,$limite=FALSE){
                $dato_buscar = trim($_GET['nombre_buscar']);
                $tipo_dato = trim($_GET['tipo_dato']);
                $this->db->select('*, cliente.Nombre  as NombreCliente');
                $this->db->from('venta');
                $this->db->join('cliente', 'cliente.IdCliente = venta.IdCliente');
                $this->db->like(  $tipo_dato,$dato_buscar);  

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_venta($id){
   
                $elim = $this->db->query('select IdStockPresen, Cantidad from detalleventaproducto where IdVenta='.$id);
                // die(var_dump($elim->result()));
                foreach($elim->result() as $data){

                        $this->db->query('update stockpresentacion SET StockReal=StockReal+ '.$data->Cantidad.' where IdStockPresen='.$data->IdStockPresen);
                        // $data->IdStockPresen
                        // die($data->Cantidad);
                        // die($data->IdStockPresen);

                }
                $this->db->query('update venta SET Estado="Venta Cancelada" where IdVenta= '.$id.'');

                // $query = $this->db->delete("venta", array('IdVenta'=>$id));
                //  return $query; 
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

                $this->db->select('*, producto.NombreP as nompro');
                $this->db->from('detalleventaproducto');
                $this->db->join('stockpresentacion', 'stockpresentacion.IdStockPresen = detalleventaproducto.IdStockPresen');
                $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');
                $this->db->where('IdVenta', $id);
                
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();

        }

        // public function get_detalle_comprobante($id){

        //         $this->db->select('*,cliente.Nombre as nombrecli, producto.NombreP as nombrepro');
        //         $this->db->from('venta');
        //         $this->db->join('cliente', 'cliente.IdCliente = venta.IdCliente');
        //         $this->db->join('detalleventaproducto', 'detalleventaproducto.IdVenta=venta.IdVenta');
        //         $this->db->join('stockpresentacion', 'stockpresentacion.IdStockPresen = detalleventaproducto.IdStockPresen');
        //         $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');
        //         $this->db->where('venta.IdVenta', $id);
                
        //         $query = $this->db->get();
        //         // die(json_encode($query->result()));
        //         return $query->result();

        // }

        public function get_venta_com($id){

                $this->db->select('*');
                $this->db->from('venta');
                $this->db->join('cliente','cliente.IdCliente=venta.IdCliente');
                $this->db->where('IdVenta',$id);   
                
                $query = $this->db->get();

                $fecha = $query->result()[0]->Fecha;
                $pos = preg_match('/[-]+/',$fecha);
                if($pos == true){
                        $array = explode('-', $fecha);
                        $fecha_php =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                $query->result()[0]->Fecha= $fecha_php;

                return $query->result();     

        }

        public function getVenta($codigo){
                $this->db->select('*');
                $this->db->from('venta');
                $this->db->where('CodV',$codigo);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
        }



}