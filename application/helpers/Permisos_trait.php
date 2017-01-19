<?php
trait Permisos_trait {

    public function autorizado($IdPermiso){
        
    //   $_SESSION['Permisos'];
        //  die(json_encode($_SESSION['Permisos']));
        $ban=0;
        if(isset($_SESSION['Permisos'] )){
                foreach($_SESSION['Permisos'] as $perm){

                    if($perm->IdPermisos == $IdPermiso){
                            $ban=+1;

                    }



                }
          
        }
      
        if($ban==0){
            // die("No tienes permisos");
            redirect(base_url().'index.php/login', 'refresh');
        }

    }
        
    
}