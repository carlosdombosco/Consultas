<?php

include "../view/session.php";

$tipo = $_GET['tipo_exame']; // recebe o id do tipo de exame

if(isset($tipo) && !empty($tipo)){

    $sql = "SELECT * FROM EXAME E WHERE E.EXA_TIE_CODIGO_FK = '$tipo'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $exames = $stm->fetchAll(PDO::FETCH_OBJ);

    // Aqui faz um loop nos exames e exibe na tela de cadastro 

       foreach($exames as $exame){
        echo "<option value='$exame->EXA_CODIGO_PK'>$exame->EXA_NOME</option>";
       }
}
?>