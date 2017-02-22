<?php
class Paciente_model extends CI_Model {

        // public $IdPaciente;
        public $Nombre;
        public $Raza;
        public $FechaNac;
        public $Color;
        public $Descripcion;
        public $Sexo;
        public $IdCliente;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_pacientes($inicio=FALSE,$limite=FALSE)
         {

                $this->db->select('*,paciente.Nombre, cliente.Nombre as NombreCliente');
                $this->db->from('paciente');
                $this->db->join('cliente', 'cliente.IdCliente = paciente.IdCliente');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
         }
         public function post_pacientes()
        {

                $fecha = $_POST['FechaNac'];
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                $this->Nombre    = $_POST['Nombre'];
                $this->Raza    = $_POST['Raza'];
                $this->FechaNac    =  strval(trim($fecha_php));
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

                $fecha = $query->result()[0]->FechaNac;
                 $pos = preg_match('/[-]+/',$fecha);
                if($pos == true){
                        $array = explode('-', $fecha);
                        $fecha_php =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                $query->result()[0]->FechaNac= $fecha_php;

                return $query->result();     

        }

       

        public function update_paciente($IdPaciente)
        {

                 $fecha = $_POST['FechaNac'];
                $pos = preg_match('/[\/]+/',$fecha);
                if($pos == true){
                        $array = explode('/', $fecha);
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }
                $this->Nombre    = $_POST['Nombre'];
                $this->Raza    = $_POST['Raza'];
                $this->FechaNac    =  strval(trim($fecha_php));
                $this->Color    = $_POST['Color'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->Sexo    = $_POST['Sexo'];
                $this->IdCliente = $_POST['SelectTipo'];

                $this->db->update('paciente', $this, array('IdPaciente' => $IdPaciente));
        }

        public function get_buscar_paciente($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*, paciente.Nombre, cliente.Nombre as NombreCliente');
                $this->db->from('paciente');
                $this->db->join('cliente', 'cliente.IdCliente = paciente.IdCliente');
                $this->db->like(  "paciente." . $tipo_dato,$dato_buscar);   

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                
                $query = $this->db->get();
                return $query->result(); 
 
        }

        public function get_eliminar_paciente($id){
   
                $query = $this->db->delete("paciente", array('IdPaciente'=>$id));
                 return $query; 
        }


}