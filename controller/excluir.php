<?php
    session_start();
	// require_once "session.php";
    require_once '../conn/conexao.php';

    $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';

    if ($acao == 'excluir_paciente'):

        // Exclui o paciente

        $codigo = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';
      

        $sql_excluir_paciente = "DELETE FROM PACIENTE WHERE PAC_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_excluir_paciente);
        $retorno = $stmt->execute();

        if($retorno){
            echo"<script language='javascript' type='text/javascript'>alert('Registro excluído sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível excluir o paciente!');window.open(document.referrer,'_self');</script>";
          }

    endif;

    if ($acao == 'excluir_tipo_exame'):

        // Exclui o tipo de exame

        $codigo = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';
      

        $sql_excluir_tipo = "DELETE FROM TIPO_EXAME WHERE TIE_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_excluir_tipo);
        $retorno = $stmt->execute();

        if($retorno){
            echo"<script language='javascript' type='text/javascript'>alert('Registro excluído sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível excluir o paciente!');window.open(document.referrer,'_self');</script>";
          }

    endif;

    if ($acao == 'excluir_exame'):

        // Exclui o exame

        $codigo = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';
      
        $sql_excluir_exame = "DELETE FROM EXAME WHERE EXA_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_excluir_exame);
        $retorno = $stmt->execute();

        if($retorno){
            echo"<script language='javascript' type='text/javascript'>alert('Registro excluído sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível excluir o paciente!');window.open(document.referrer,'_self');</script>";
          }

    endif;

    if ($acao == 'excluir_consulta'):

      // Exclui a consulta

      $codigo = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';
    
      $sql_excluir_consulta = "DELETE FROM CONSULTA WHERE CON_CODIGO_PK = '$codigo'";
      $stmt = $conn->prepare($sql_excluir_consulta);
      $retorno = $stmt->execute();

      if($retorno){
          echo"<script language='javascript' type='text/javascript'>alert('Registro excluído sucesso!');window.open(document.referrer,'_self');</script>";          
          }
            else
        {
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível excluir o paciente!');window.open(document.referrer,'_self');</script>";
        }

  endif;



?>