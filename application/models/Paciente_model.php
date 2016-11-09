<?php
class Paciente_model extends CI_Model {

        // public $IdPaciente;
        public $Nombre;
        public $Raza;
        public $Edad;
        public $Color;
        public $Descripcion;
        public $Sexo;
        public $IdCliente;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_pacientes()
         {

                $this->db->select('*,paciente.Nombre, cliente.Nombre as NombreCliente');
                $this->db->from('paciente');
                $this->db->join('cliente', 'cliente.IdCliente = paciente.IdCliente');
                $query = $this->db->get();
                return $query->result();
         }
         public function post_pacientes()
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Raza    = $_POST['Raza'];
                $this->Edad    = $_POST['Edad'];
                $this->Color    = $_POST['Color'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Sexo    = $_POST['Sexo'];
                $this->IdCliente    = $_POST['SelectTipo'];
                
                 

                $this->db->insert('paciente', $this);
        }

        public function get_paciente($IdPaciente){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('paciente');
                $this->db->where('IdPaciente',$IdPaciente);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_paciente($IdPaciente)
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Raza    = $_POST['Raza'];
                $this->Edad    = $_POST['Edad'];
                $this->Color    = $_POST['Color'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Sexo    = $_POST['Sexo'];
                $this->IdCliente = $_POST['SelectTipo'];

                $this->db->update('paciente', $this, array('IdPaciente' => $IdPaciente));
        }

        public function get_buscar_paciente(){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('paciente');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_paciente($id){
   
                $query = $this->db->delete("paciente", array('IdPaciente'=>$id));
                 return $query; 
        }


}