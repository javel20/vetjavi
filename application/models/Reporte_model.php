<?php
class Reporte_model extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_reporte_ingreso($fecha, $inicio=FALSE,$limite=FALSE)
        {

            if($fecha=="")
            {
                $fecha_php = date('y-d-m');
                // echo $fecha_php;

                
                
                $sql1= ('select venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio, venta.Ganancia as ganancia from venta
                        where venta.Fecha="'.strval(trim($fecha_php)).'"');
                        
                $sql2=  ('select cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada, cita.PrecioTotal as precio, cita.Ganancia as ganancia  from cita
                        where FechaRegistro like
                        "'.strval(trim($fecha_php)).'%"');



                $query = $this->db->query($sql1.' UNION '. $sql2);


                return $query->result();


            }
            else{
                
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
              //  die($fecha_php);
              
               $sql1= ('select venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio, venta.Ganancia as ganancia from venta
                        where venta.Fecha="'.strval(trim($fecha_php)).'"');
                        
                $sql2=  ('select cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada, cita.PrecioTotal as precio, cita.Ganancia as ganancia from cita
                        where FechaRegistro like
                        "'.strval(trim($fecha_php)).'%"');

                $query = $this->db->query($sql1.'  UNION '. $sql2);



                return $query->result();


        }
        }

        public function get_reporte_perdida($fecha, $inicio=FALSE,$limite=FALSE)
        {

            if($fecha=="")
            {
                $fecha_php = date('y-d-m');
                // echo $fecha_php;

                
                
                $sql1= ('select  salida.NombreS as nombre, salida.FechaS as fecha, salida.PrecioS as perdida from salida
                        where salida.FechaS="'.strval(trim($fecha_php)).'"');

                $query = $this->db->query($sql1);


                return $query->result();


            }
            else{
                
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
              //  die($fecha_php);
              
               $sql1= ('select  salida.NombreS as nombre, salida.FechaS as fecha, salida.PrecioS as perdida from salida
                        where salida.FechaS="'.strval(trim($fecha_php)).'"');
                        

                $query = $this->db->query($sql1);



                return $query->result();


        }
        }       


        public function get_reporte_ingreso_compra($fecha, $inicio=FALSE,$limite=FALSE)
        {

            if($fecha=="")
            {
                $fecha_php = date('y-d-m');
                // echo $fecha_php;

                
                
                $sql1= ('select * from compra
                        where compra.Fecha="'.strval(trim($fecha_php)).'" and compra.Estado = "Compra Realizada"');
                        

                $query = $this->db->query($sql1);


                return $query->result();


            }
            else{
                
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
              //  die($fecha_php);
              
               $sql1= ('select * from compra
                        where compra.Fecha="'.strval(trim($fecha_php)).'" and compra.Estado = "Compra Realizada"');
                        

                $query = $this->db->query($sql1);



                return $query->result();


        }
        }




}