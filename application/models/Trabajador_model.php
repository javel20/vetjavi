<?php
class Trabajador_model extends CI_Model {

        public $IdTrabajador;
        public $Nombre;
        public $ApePat;
        public $ApeMat;
        public $Direccion;
        public $Telefono;
        public $Email;
        public $Password;
        public $IdTipoTrab;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_trabajadores()
        {
                $this->db->select('*,trabajador.Nombre, tipotrab.Nombre  as NombreTipo');
                $this->db->from('trabajador');
                $this->db->join('tipotrab', 'tipotrab.IdTipoTrab = trabajador.IdTipoTrab');
                $query = $this->db->get();
                return $query->result();
        }
         public function post_trabajadores()
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Email    = $_POST['Email'];
                $this->Password    = $_POST['Password'];
                $this->IdTipoTrab    = $_POST['NombreTipo'];
                
                 

                $this->db->insert('trabajador', $this);
        }

        public function get_trabajador($IdTrabajador){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('trabajador');
                $this->db->where('IdTrabajador',$IdTrabajador);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_trabajador($IdTrabajador)
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->ApePat  = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->IdTipoTrab = $_POST['SelectTipo'];

                $this->db->update('trabajador', $this, array('IdTrabajador' => $IdTrabajador));
        }

        public function get_buscar_trabajador(){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('trabajador');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_trabajador($id){
   
                $query = $this->db->delete("trabajador", array('IdTrabajador'=>$id));
                 return $query; 
        }


}