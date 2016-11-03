<?php
class Cliente_model extends CI_Model {

        public $IdCliente;
        public $DNI;
        public $RUC;
        public $Nombre;
        public $ApePat;
        public $ApeMat;
        public $Ciudad;
        public $Direccion;
        public $Telefono;
        public $Celular;
        public $Estado;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_clientes()
        {
                $query = $this->db->get('cliente');
                return $query->result();
        }
         public function post_clientes()
        {
                $this->DNI    = $_POST['DNI'];
                $this->RUC    = $_POST['RUC'];
                $this->Nombre    = $_POST['Nombre'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Ciudad    = $_POST['Ciudad'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Celular    = $_POST['Celular'];
                $this->Estado = True;
                 

                $this->db->insert('cliente', $this);
        }

        public function get_cliente($IdCliente){

                $this->db->select('*');
                $this->db->from('cliente');
                $this->db->where('IdCliente',$IdCliente);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_cliente($IdCliente)
        {
                $this->IdCliente = $IdCliente;
                $this->DNI =  $_POST['DNI'];
                $this->RUC =  $_POST['RUC'];
                $this->Nombre    = $_POST['Nombre'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Ciudad    = $_POST['Ciudad'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Celular    = $_POST['Celular'];
                // $this->Estado    = $_POST['Estado'];
                $this->Estado = True;
                $this->db->update('cliente', $this, array('IdCliente' => $IdCliente));
        }

        public function get_buscar_cliente(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('cliente');
                $this->db->like($tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_cliente($id){
   
                $query = $this->db->delete("cliente", array('IdCliente'=>$id));
                 return $query; 
        }

        public function get_desactivar_cliente($id){
                $this->db->set('Estado', False);
                $this->db->where('IdCliente', $id);
                $this->db->update('cliente');
        }

        public function get_activar_cliente($id){
                $this->db->set('Estado', True);
                $this->db->where('IdCliente', $id);
                $this->db->update('cliente');
        }

}