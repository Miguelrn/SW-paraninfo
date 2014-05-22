<?php 
    if(session_id() == ""){
            session_start();
    }
    include_once '../controlador/opbasededatos.php';
    $BDD = new Mysql();
    if(isset($_SESSION['id'])){
            $id_user = $_SESSION['id'];
    }       
    else{
            $user = $_SESSION['user'];
            $row = $BDD->consultaId($user);
            $id_user = $row['id'];
    }
    
    
    
    $reservas = $_SESSION['reserva'];
    for ($i=0, $len=count($reservas); $i<$len; $i++) {
                    
            $BDD->insertarPedido($id_user, $reservas[$i][1], $reservas[$i][2], $reservas[$i][3], $reservas[$i][4], $reservas[$i][6], $reservas[$i][7]);
    }
    
    unset($_SESSION['reserva']);
    
    header('Location: ../index.php');
    


?>
	

	


