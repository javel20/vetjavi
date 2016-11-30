<?php
class Proveedor_model extends CI_Model {

        // public $IdProveedor;
        public $Nombre;
        public $Direccion;
        public $Numero;
        public $Email;
        public $ApePat;
        public $ApeMat;
        public $Empresa;
        public $Estado;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_proveedores()
        {
                $query = $this->db->get('proveedor');
                return $query->result();
        }
         public function post_proveedores()
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Numero    = $_POST['Numero'];
                $this->Email    = $_POST['Email'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Empresa    = $_POST['Empresa'];
                $this->Estado = True;
                 

                $this->db->insert('proveedor', $this);
        }

        public function get_proveedor($IdProveedor){

                $this->db->select('*');
                $this->db->from('proveedor');
                $this->db->where('IdProveedor',$IdProveedor);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_proveedor($IdProveedor)
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Numero    = $_POST['Numero'];
                $this->Email    = $_POST['Email'];
                $this->ApePat  = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Empresa    = $_POST['Empresa'];
                $this->Estado    =  $_POST['Estado'];

                $this->db->update('proveedor', $this, array('IdProveedor' => $IdProveedor));
        }

        public function get_buscar_proveedor(){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('proveedor');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_proveedor($id){
   
                $query = $this->db->delete("proveedor", array('IdProveedor'=>$id));
                 return $query; 
        }

        public function get_desactivar_proveedor($id){
                $this->db->set('Estado', False);
                $this->db->where('IdProveedor', $id);
                $this->db->update('proveedor');
        }

        public function get_activar_proveedor($id){
                $this->db->set('Estado', True);
                $this->db->where('IdProveedor', $id);
                $this->db->update('proveedor');
        }

}