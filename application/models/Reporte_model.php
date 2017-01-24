<?php
class Reporte_model extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_reporte($fecha, $inicio=FALSE,$limite=FALSE)
        {

            if($fecha=="")
            {
                $fecha_php = date('y-d-m');
                // echo $fecha_php;

                
                
                $sql1= ('select venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio  from venta
                        where venta.Fecha="'.strval(trim($fecha_php)).'"');
                        
                $sql2=  ('select cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada, cita.PrecioTotal as precio from cita
                        where FechaRegistro like
                        "'.strval(trim($fecha_php)).'%"');

                $sql3=  ('select analisis.Codigo as codigo, analisis.FechaA as fecharealizada, analisis.PrecioAnalisis as precio
                        from analisis
                        where analisis.FechaA= "2017-01-19"
                        ');

                $query = $this->db->query($sql1.' UNION '.$sql3.' UNION '. $sql2 );


                return $query->result();


            }
            else{
                
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];
              //  die($fecha_php);
              
               $sql1= ('select venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio  from venta
                        where venta.Fecha="'.strval(trim($fecha_php)).'"');
                        
                $sql2=  ('select cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada, cita.PrecioTotal as precio from cita
                        where FechaRegistro like
                        "'.strval(trim($fecha_php)).'%"');

                $sql3=  ('select analisis.Codigo as codigo, analisis.FechaA as fecharealizada, analisis.PrecioAnalisis as precio
                        from analisis
                        where analisis.FechaA= "'.strval(trim($fecha_php)).'"
                        ');

                $query = $this->db->query($sql1.' UNION '.$sql3.' UNION '. $sql2 );



                return $query->result();


        }
        }
}