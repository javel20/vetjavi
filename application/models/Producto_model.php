<?php
class Producto_model extends CI_Model {

        // public $IdProducto;
        public $NombreP;
        public $Descripcion;
        public $IdTipoProducto;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_productos($inicio=FALSE,$limite=FALSE)
        {
                $this->db->select('*, producto.Descripcion as descprod');
                $this->db->from('producto');
                $this->db->join('tipoproducto', 'tipoproducto.IdTipoProducto = producto.IdTipoProducto');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get('');
                return $query->result();
        }
         public function post_productos()
        {
                $this->NombreP    = $_POST['Nombre'];
                $this->Descripcion    = $_POST['Descripcion'];
      
       
                $this->IdTipoProducto    = $_POST['TipoProduc'];
                 

                $this->db->insert('producto', $this);
        }

        public function get_producto($IdProducto){

                $this->db->select('*');
                $this->db->from('producto');
                $this->db->where('IdProducto',$IdProducto);   
                $query = $this->db->get();
                return $query->result();    

        }

       

        public function update_producto($IdProducto)
        {
                $this->IdProducto = $IdProducto;
                $this->NombreP    = $_POST['Nombre'];
                $this->Descripcion    = $_POST['Descripcion'];
            
                $this->IdTipoProducto    = $_POST['TipoProduc'];
 

                $this->db->update('producto', $this, array('IdProducto' => $IdProducto));
        }

        public function get_buscar_producto($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, producto.Descripcion as descprod');
                $this->db->from('producto');
                $this->db->join('tipoproducto', 'tipoproducto.IdTipoProducto = producto.IdTipoProducto');
                $this->db->like(  $tipo_dato,$dato_buscar);

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_producto($id){
   
                $query = $this->db->delete("producto", array('IdProducto'=>$id));
                 return $query; 
        }

        public function get_desactivar_producto($id){
                $this->db->set('Estado', False);
                $this->db->where('IdProducto', $id);
                $this->db->update('producto');
        }

        public function get_activar_producto($id){
                $this->db->set('Estado', True);
                $this->db->where('IdProducto', $id);
                $this->db->update('producto');
        }

        public function getProducto($NombreP){
                $this->db->select('*');
                $this->db->from('producto');
                $this->db->where('NombreP',$NombreP);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
        }


}