<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
            if (!isset($_SESSION['senhaSession']) AND  !isset($_SESSION['usuarioSession'])){
              
              header("Location: .");
              exit;
            }
            
    include "../conn/conexao.php";
?>