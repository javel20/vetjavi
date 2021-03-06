<?php
class Trabajador_model extends CI_Model {

        // public $IdTrabajador;
        public $NombreT;
        public $ApePat;
        public $ApeMat;
        public $DireccionT;
        public $CelularT;
        public $OperadorT;
        public $Email;
        public $Password;
        public $IdTipoTrab;
        public $IdLocal;
        public $EstadoT;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_trabajadores($inicio=FALSE,$limite=FALSE)
        {
                $this->db->select('*');
                $this->db->from('trabajador');
                $this->db->join('tipotrab', 'tipotrab.IdTipoTrab = trabajador.IdTipoTrab');
                $this->db->join('local', 'local.IdLocal = trabajador.IdLocal');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                // die(json_encode($query->result()));
                $query = $this->db->get();
                return $query->result();
        }
         public function post_trabajadores()
        {
                $this->NombreT    = $_POST['Nombre'];
                $this->ApePat    = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->DireccionT    = $_POST['Direccion'];
                $this->CelularT    = $_POST['Telefono'];
                $this->OperadorT    = $_POST['Operador'];
                $this->Email    = $_POST['Email'];
                $this->Password    = md5($_POST['Password']);
                $this->IdTipoTrab    = $_POST['SelectTipo'];
                $this->IdLocal    = $_POST['SelectLocal'];
                $this->EstadoT    = "Habilitado";
                
                //  die(json_encode($_POST['permisos']));

                $this->db->insert('trabajador', $this);
                $insert_id = $this->db->insert_id();
                forEach($_POST['permisos'] as $permiso){
                        $this->db->query("INSERT INTO detallepermisos (IdTrabajador,IdPermisos) VALUES(".$insert_id.",".$permiso.")");
                }
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
                $this->NombreT    = $_POST['Nombre'];
                $this->DireccionT    = $_POST['Direccion'];
                $this->CelularT    = $_POST['Telefono'];
                $this->OperadorT    = $_POST['Operador'];
                $this->ApePat  = $_POST['ApePat'];
                $this->ApeMat    = $_POST['ApeMat'];
                $this->Email    = $_POST['Email'];
                $this->Password    = $_POST['Password'];
                $this->IdTipoTrab = $_POST['SelectTipo'];
                $this->IdLocal = $_POST['SelectLocal'];
                $this->EstadoT    = $_POST['EstadoT'];

                $this->db->update('trabajador', $this, array('IdTrabajador' => $IdTrabajador));
        }

        public function get_buscar_trabajador($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('trabajador');
                $this->db->join('tipotrab', 'tipotrab.IdTipoTrab = trabajador.IdTipoTrab');
                $this->db->join('local', 'local.IdLocal = trabajador.IdLocal');
                $this->db->like('trabajador.'.  $tipo_dato,$dato_buscar); 
                
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_trabajador($id){
   
                $query = $this->db->delete("trabajador", array('IdTrabajador'=>$id));
                 return $query; 
        }

        function login($email, $password)
        {
                $this -> db -> select('IdTrabajador,Email,Password');
                $this -> db -> from('trabajador');
                $this -> db -> where('Email', $email);
                $this -> db -> where('Password', MD5($password));
                $this -> db -> limit(1);

                $query = $this -> db -> get();
                
                // die(json_encode($query->result()));
                if (count($query->result())==0){

                        // $mensaje ="Datos incorrectos" ;
                        return false;

                }
                $perm = $this->db->query("select * from detallepermisos where IdTrabajador= ".$query->result()[0]->IdTrabajador);
                // die(json_encode($perm->result()));

                $query->result()[0]->permisos=$perm->result();
                // die(json_encode($query->result()));
               


                if($query -> num_rows() == 1)
                {
                        return $query -> result();

                        


                } 
                else
                {
                        return false;
                }
        }


}
