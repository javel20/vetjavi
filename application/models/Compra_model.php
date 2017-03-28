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

        public function get_compras($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*, proveedor.Nombre  as NombreProv,proveedor.ApePat as apepatpro, proveedor.ApeMat as apematpro, trabajador.ApePat as apepattra, trabajador.ApeMat as apemattra');
                $this->db->from('compra');
                $this->db->join('proveedor', 'proveedor.IdProveedor = compra.IdProveedor');
                $this->db->join('trabajador', 'trabajador.IdTrabajador = compra.IdTrabajador');
                $this->db->where('compra.Estado = "Compra Realizada"');
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                // die(var_dump($query->result()));
                $query = $this->db->get();
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
                $this->PrecioTotalCompra = $_POST['sumatotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Estado="Compra Realizada";
                $this->IdProveedor    = $_POST['IdProveedor'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];

                // die(var_dump($this));
                 $this->db->insert('compra', $this);


                 $insert_id = $this->db->insert_id();

                // die(json_encode($_POST['nombre_detalle']));
                // $acum="";
                foreach($_POST['nombre_detalle'] as $key=>$valor){
                        // $acum+=$valor;
                        $data_detalle = array(

                                'IdCompra' => $insert_id,
                                // 'IdProducto' => $_POST['nombre_detalle'][$key],
                                'FechaVen' =>$_POST['fecha'][$key],
                                'Cantidad' => $_POST['cantidad_detalle'][$key],
                                'PrecioUnitario' => $_POST['precio_detalle'][$key],
                                'PrecioTotal' => $_POST['preciototal_detalle'][$key],
                                'IdStockPresen' =>$_POST['presentacion_detalle'][$key]
                               


                        );

                        $this->db->query('update stockpresentacion SET Precio='.$_POST['precio_detalle'][$key].' ,StockReal=StockReal + '. $_POST['cantidad_detalle'][$key] .'   where IdStockPresen='.$_POST['presentacion_detalle'][$key]);

                        $this->db->insert("detallecompraproducto", $data_detalle);
                }
                // die(json_encode($acum));
        }

        public function get_compra($IdCompra){

                $this->db->select('*');
                $this->db->from('compra');
                $this->db->where('IdCompra',$IdCompra);   
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
                // die(var_dump($query->result()));

                return $query->result();     

                
                        
        }

       

        public function update_compra($IdCompra)
        {
                
                $this->db->query('update compra SET Estado="Compra Cancelada" where IdCompra= '.$IdCompra.'');
                $elim = $this->db->query('select IdStockPresen, Cantidad from detallecompraproducto where IdCompra='.$IdCompra);
                // die(var_dump($elim->result()));
                foreach($elim->result() as $data){

                        $this->db->query('update stockpresentacion SET StockReal=StockReal- '.$data->Cantidad.' where IdStockPresen='.$data->IdStockPresen);
                        // $data->IdStockPresen
                        // die($data->Cantidad);
                        // die($data->IdStockPresen);

                }
               // $this->db->query('update compra SET Estado="Compra Cancelada" where IdCompra= '.$id.'');


                $fecha = $_POST['Fecha'];
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                
                $this->CodC    = $_POST['CodC'];
                $this->Fecha    =  strval(trim($fecha_php));
                $this->TipoC    = $_POST['TipoC'];
                $this->PrecioTotalCompra = $_POST['sumatotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Estado="Compra Realizada";
                $this->IdProveedor    = $_POST['IdProveedor'];
                $this->IdTrabajador    = $_POST['IdTrabajador'];

                // die(var_dump($this));
                 $this->db->insert('compra', $this);


                 $insert_id = $this->db->insert_id();

                // die(json_encode($_POST['nombre_detalle']));
                // $acum="";
                foreach($_POST['nombre_detalle'] as $key=>$valor){
                        // $acum+=$valor;
                        $data_detalle = array(

                                'IdCompra' => $insert_id,
                                // 'IdProducto' => $_POST['nombre_detalle'][$key],
                                'FechaVen' =>$_POST['fecha'][$key],
                                'Cantidad' => $_POST['cantidad_detalle'][$key],
                                'PrecioUnitario' => $_POST['precio_detalle'][$key],
                                'PrecioTotal' => $_POST['preciototal_detalle'][$key],
                                'IdStockPresen' =>$_POST['presentacion_detalle'][$key]
                               


                        );
                        $this->db->query('update stockpresentacion SET Precio='.$_POST['precio_detalle'][$key].' ,StockReal=StockReal + '. $_POST['cantidad_detalle'][$key] .'   where IdStockPresen='.$_POST['presentacion_detalle'][$key]);

                        $this->db->insert("detallecompraproducto", $data_detalle);
                      
                      
                }
                // die(json_encode($acum));
                //   $this->db->query('update stockpresentacion SET Precio='.$_POST['preciototal_detalle'][$key].' ,StockReal=StockReal + '. $_POST['cantidad_detalle'][$key] .'   where IdStockPresen='.$_POST['presentacion_detalle'][$key]);
        }

        public function get_buscar_compra($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, proveedor.Nombre  as NombreProv,proveedor.ApePat as apepatpro, proveedor.ApeMat as apematpro, trabajador.ApePat as apepattra, trabajador.ApeMat as apemattra');
                $this->db->from('compra');
                $this->db->join('proveedor', 'proveedor.IdProveedor = compra.IdProveedor');
                $this->db->join('trabajador', 'trabajador.IdTrabajador = compra.IdTrabajador');
                $this->db->where('compra.Estado = "Compra Realizada"');
                $this->db->like($tipo_dato,$dato_buscar);   

                 if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_compra($id){
   
                $elim = $this->db->query('select IdStockPresen, Cantidad from detallecompraproducto where IdCompra='.$id);
                // die(var_dump($elim->result()));
                foreach($elim->result() as $data){

                        $this->db->query('update stockpresentacion SET StockReal=StockReal- '.$data->Cantidad.' where IdStockPresen='.$data->IdStockPresen);
                        // $data->IdStockPresen
                        // die($data->Cantidad);
                        // die($data->IdStockPresen);

                }
                $this->db->query('update compra SET Estado="Compra Cancelada" where IdCompra= '.$id.'');


                // $query = $this->db->delete("compra", array('IdCompra'=>$id));
                //  return $query; 
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


        public function getCompra($codigo){
                $this->db->select('*');
                $this->db->from('compra');
                $this->db->where('CodC',$codigo);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
        }


         public function get_compradetalle($IdCompra)
        {

                $this->db->select('*, producto.NombreP as nomcom');
                $this->db->from('detallecompraproducto');
                $this->db->join('stockpresentacion', 'stockpresentacion.IdStockPresen = detallecompraproducto.IdStockPresen');
                $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');
                $this->db->where('IdCompra',$IdCompra);   
    
                // die(var_dump($query->result()));
                $query = $this->db->get();
                return $query->result();


                

        }

}