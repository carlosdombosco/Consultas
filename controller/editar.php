<?php
    session_start();
	// require_once "session.php";
    require_once '../conn/conexao.php';

    $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';

    if ($acao == 'alterar_paciente'):

        // Altera o paciente

        $nome               = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $cpf                = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';
        $data_nascimento    = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : '';
        $sexo               = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
        $telefone           = (isset($_POST['telefone'])) ? $_POST['telefone'] : '';
        $email              = (isset($_POST['email'])) ? $_POST['email'] : '';
        $codigo             = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';


        $sql_update_paciente = "UPDATE PACIENTE SET PAC_NOME = '$nome', PAC_CPF = '$cpf', PAC_DATA_NASCIMENTO = '$data_nascimento', PAC_SEXO = '$sexo', PAC_TELEFONE = '$telefone', PAC_EMAIL = '$email' WHERE PAC_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_update_paciente);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
  
    endif;


    if ($acao == 'editar_tipo_exame'):

        // Altera o tipo de exame

        $nome         = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $descricao    = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
        $codigo       = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';

        // se não, cadastra no banco
        $sql_update_tipo = "UPDATE TIPO_EXAME SET TIE_NOME = '$nome', TIE_DESCRICAO = '$descricao' WHERE TIE_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_update_tipo);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
  
    endif;



    if ($acao == 'editar_exame'):

        // Altera o tipo de exame

        $nome         = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $observacao   = (isset($_POST['observacao'])) ? $_POST['observacao'] : '';
        $tipo_exame   = (isset($_POST['tipo_exame'])) ? $_POST['tipo_exame'] : '';
        $codigo       = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';

        $sql_update_exame = "UPDATE EXAME SET EXA_NOME = '$nome', EXA_OBSERVACAO = '$observacao', EXA_TIE_CODIGO_FK = '$tipo_exame' WHERE EXA_CODIGO_PK = '$codigo'";
        $stmt = $conn->prepare($sql_update_exame);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
  
    endif;


    if ($acao == 'editar_consulta'):

      // Altera a consulta

      $tipo_exame   = (isset($_POST['tipo_exame'])) ? $_POST['tipo_exame'] : '';
      $exame        = (isset($_POST['exame'])) ? $_POST['exame'] : '';
      $data         = (isset($_POST['data'])) ? $_POST['data'] : '';
      $hora         = (isset($_POST['hora'])) ? $_POST['hora'] : '';
      $codigo       = (isset($_POST['CODIGO'])) ? $_POST['CODIGO'] : '';

      $sql_update_consulta = "UPDATE CONSULTA SET CON_TIE_CODIGO_FK = '$tipo_exame', CON_EXA_CODIGO_FK = '$exame', CON_DATA = '$data', CON_HORA = '$hora' WHERE CON_CODIGO_PK = '$codigo'";
      $stmt = $conn->prepare($sql_update_consulta);
      $retorno = $stmt->execute();

      if($retorno){    
          echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
          }
            else
        {
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
        }

  endif;


?>