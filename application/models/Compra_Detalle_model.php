<?php
class Cliente_model extends CI_Model {

        public $IdCompra;
        public $FechaVen;
        public $Cantidad;
        public $Celular;
        public $Operador;
        public $Estado;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_clientes($inicio=FALSE,$limite=FALSE)
        {


                $this->db->select('*');
                $this->db->from('cliente');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                // $this->db->limit(10);
                // $query = $this->db->get();
                $query = $this->db->get();

                return $query->result();
        }
         public function post_clientes()
        {
                $this->Nombre    = $_POST['Nombre'];     


                // $var1="";
                // $var2="";
                // if(isset($_POST['DNI'])){ //isset si existe o esta definido
                //         $var1 = $_POST['DNI'];
                // }
                // if(isset($_POST['RUC'])){
                //         $var2 = $_POST['RUC'];
                // }

                $this->DNI =  isset($_POST['DNI'])? $_POST['DNI']:"";
                $this->RUC =  isset($_POST['RUC'])? $_POST['RUC']:"";
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Ciudad    = $_POST['Ciudad'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Celular    = $_POST['Celular'];
                $this->Operador    = $_POST['Operador'];
                $this->Estado = $_POST['Estado'];
                 

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

                $var1="";
                $var2="";
                if(isset($_POST['DNI'])){ //isset si existe o esta definido
                        $var1 = $_POST['DNI'];
                }
                if(isset($_POST['RUC'])){
                        $var2 = $_POST['RUC'];
                }

                $this->IdCliente = $IdCliente;
                $this->DNI =  $var1;
                $this->RUC =  $var2;
                $this->Nombre    = $_POST['Nombre'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Ciudad    = $_POST['Ciudad'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Celular    = $_POST['Celular'];
                $this->Operador    = $_POST['Operador'];
                // $this->Estado    = $_POST['Estado'];
                $this->Estado = $_POST['Estado'];
                $this->db->update('cliente', $this, array('IdCliente' => $IdCliente));
        }

        public function get_buscar_cliente($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('cliente');
                $this->db->like($tipo_dato,$dato_buscar);   

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

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