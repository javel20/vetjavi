<?php
class Permisotrab_model extends CI_Model {

        // public $IdPaciente;
        public $CodigoP;
        public $FechaInicioP;
        public $FechaTerminoP;
        public $EstadoP;
        public $DescripcionP;
        public $IdTrabajador;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_permisos($inicio=FALSE,$limite=FALSE)
         {

                $this->db->select('*');
                $this->db->from('permisotrab');
                $this->db->join('trabajador', 'trabajador.IdTrabajador = permisotrab.IdTrabajador');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
         }
         public function post_permisos()
        {
                
                $this->CodigoP    = $_POST['CodigoP'];
                $fecha = $_POST['FechaInicioP'];
                $array = explode('/', $fecha);
                $fecha_phpI =  $array[2] ."-". $array[1] ."-". $array[0];

                $fecha = $_POST['FechaTerminoP'];
                $array = explode('/', $fecha);
                $fecha_phpT =  $array[2] ."-". $array[1] ."-". $array[0];


                $this->FechaInicioP    =  strval(trim($fecha_phpI));
                $this->FechaTerminoP    =  strval(trim($fecha_phpT));
                $this->EstadoP    = "Con permiso";
                $this->DescripcionP    = $_POST['DescripcionP'];
                $this->IdTrabajador    = $_POST['SelectTrab'];
                
                 

                $this->db->insert('permisotrab', $this);
        }

        public function get_permiso($IdPermiso){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('permisotrab');
                $this->db->where('IdPermiso',$IdPermiso);   
                $query = $this->db->get();

                $fechaI = $query->result()[0]->FechaInicioP;
                 $pos = preg_match('/[-]+/',$fechaI);
                if($pos == true){
                        $array = explode('-', $fechaI);
                        $fecha_phpI =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_phpI = $fechaI; 
                }

                $query->result()[0]->FechaInicioP= $fecha_phpI;



                $fechaT = $query->result()[0]->FechaTerminoP;
                 $pos = preg_match('/[-]+/',$fechaT);
                if($pos == true){
                        $array = explode('-', $fechaT);
                        $fecha_phpT =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_phpT = $fechaT; 
                }

                $query->result()[0]->FechaTerminoP= $fecha_phpT;


                return $query->result();     

        }

       

        public function update_permiso($IdPermiso)
        {

                $this->CodigoP    = $_POST['CodigoP'];
                $fechaI = $_POST['FechaInicioP'];
                $pos = preg_match('/[\/]+/',$fechaI);
                if($pos == true){
                        $array = explode('/', $fechaI);
                        $fecha_phpI =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_phpI = $fechaI; 
                }

                $fechaT = $_POST['FechaTerminoP'];
                $pos = preg_match('/[\/]+/',$fechaT);
                if($pos == true){
                        $array = explode('/', $fechaT);
                        $fecha_phpT =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_phpT = $fechaT; 
                }


                $this->FechaInicioP    =  strval(trim($fecha_phpI));
                $this->FechaTerminoP    =  strval(trim($fecha_phpT));
                $this->EstadoP    = $_POST['EstadoP'];
                $this->DescripcionP    = $_POST['DescripcionP'];
                $this->IdTrabajador = $_POST['SelectTrab'];

                $this->db->update('permisotrab', $this, array('IdPermiso' => $IdPermiso));
        }

        public function get_buscar_permiso(){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('permisotrab');
                $this->db->join('trabajador', 'trabajador.IdTrabajador = permisotrab.IdTrabajador');
                $this->db->like(   $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result(); 
 
        }

        public function get_eliminar_permiso($id){
   
                $query = $this->db->delete("permisotrab", array('IdPermiso'=>$id));
                 return $query; 
        }


}