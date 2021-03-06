<?php
class StockPresen_model extends CI_Model {

        // public $IdStockPresen;
        public $StockMin;
        public $StockReal;
        public $Presentacion;
        public $Precio;
        public $PrecioVenta;
        public $IdProducto;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_stockpresens($inicio=FALSE,$limite=FALSE)
         {
                $this->db->select('*');
                $this->db->from('stockpresentacion');
                $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');


                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
         }

         public function get_presen(){

                $query = $this->db->get('stockpresentacion');
                return $query->result();

         }
         public function post_stockpresens()
        {
                $this->StockMin    = $_POST['StockMin'];
                $this->StockReal    = $_POST['StockReal'];
                $this->Presentacion    = $_POST['Presentacion'];
                $this->Precio    = $_POST['Precio'];
                $this->PrecioVenta    = $_POST['PrecioVenta'];
                $this->IdProducto    = $_POST['SelectTipo'];
                
                 

                $this->db->insert('stockpresentacion', $this);
        }

        public function get_stockpresen($IdStockPresen){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('stockpresentacion');
                $this->db->where('IdStockPresen',$IdStockPresen);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_stockpresen($IdStockPresen)
        {
                $this->StockMin    = $_POST['StockMin'];
                $this->StockReal    = $_POST['StockReal'];
                $this->Presentacion    = $_POST['Presentacion'];
                $this->Precio    = $_POST['Precio'];
                $this->PrecioVenta    = $_POST['PrecioVenta'];
                $this->IdProducto = $_POST['SelectTipo'];

                $this->db->update('stockpresentacion', $this, array('IdStockPresen' => $IdStockPresen));
        }

        public function get_buscar_stockpresen($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('stockpresentacion');
                $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');
                $this->db->like(  $tipo_dato,$dato_buscar);   

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_stockpresen($id){
   
                $query = $this->db->delete("stockpresentacion", array('IdStockPresen'=>$id));
                 return $query; 
        }

        
        public function get_presenajax($id){

                $this->db->select('*');
                $this->db->from('stockpresentacion');
                $this->db->where('IdProducto',$id);
                
                $query = $this->db->get('');
                return $query->result();

        }

        public function get_notificacion(){

                $this->db->select('Producto.NombreP, StockMin, StockReal') ;
                $this->db->from('stockpresentacion');
                $this->db->join('producto', 'producto.IdProducto = stockpresentacion.IdProducto');
                $this->db->where('StockReal <= StockMin');

                $query = $this->db->get('');
                return $query->result();
        }

        public function get_notificacion_fechaven(){
                $this->db->select('*,STR_TO_DATE(FechaVen, "%m/%d/%Y") as fechaVen, CURDATE() as fechactual, producto.NombreP as nombrepro');
                $this->db->from('detallecompraproducto');
                $this->db->join('stockpresentacion','stockpresentacion.IdStockPresen = detallecompraproducto.IdStockPresen');
                $this->db->join('producto','producto.IdProducto = stockpresentacion.IdProducto');
                $this->db->where('STR_TO_DATE(FechaVen, "%m/%d/%Y") >= CURDATE() and STR_TO_DATE(FechaVen, "%m/%d/%Y") <= DATE_ADD(CURDATE(), INTERVAL 3 month)');
                $query = $this->db->get('');
                // die(var_dump($query->result()));
                return $query->result();
        }



}