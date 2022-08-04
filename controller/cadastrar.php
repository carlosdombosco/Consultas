<?php
    session_start();
	 
    $today 				= date_create('now', new DateTimeZone('America/Sao_Paulo'));
   

    require_once '../conn/conexao.php';

    $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';

    if ($acao == 'cadastrar_paciente'):

        // Cadastra o paciente

        $nome               = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $cpf                = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';
        $data_nascimento    = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : '';
        $sexo               = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
        $telefone           = (isset($_POST['telefone'])) ? $_POST['telefone'] : '';
        $email              = (isset($_POST['email'])) ? $_POST['email'] : '';

        // Verifica se o CPF já está cadastrado
        $verifica_cpf = "SELECT PAC_CPF FROM PACIENTE WHERE PAC_CPF = '$cpf'";
        $stmt = $conn->prepare($verifica_cpf);
        $stmt->execute();
        $cpfs = $stmt->fetchAll(PDO::FETCH_OBJ);
        $total = $stmt->rowCount();

        // se estiver, exibe a mensagem...

        if($total > 0) {
            echo"<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.open(document.referrer,'_self');</script>";         

        } else{

        // se não, cadastra no banco
        $sql_insert_paciente = "INSERT INTO PACIENTE (PAC_NOME, PAC_CPF, PAC_DATA_NASCIMENTO, PAC_SEXO, PAC_TELEFONE, PAC_EMAIL) VALUES ('$nome', '$cpf', '$data_nascimento', '$sexo', '$telefone', '$email')";
        $stmt = $conn->prepare($sql_insert_paciente);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
   }
    endif;



    if ($acao == 'cadastrar_tipo_exame'):

        // Cadastra o tipo de exame

        $nome               = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $descricao          = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';

        $sql_insert_tipo_exame = "INSERT INTO TIPO_EXAME (TIE_NOME, TIE_DESCRICAO) VALUES ('$nome', '$descricao')";
        $stmt = $conn->prepare($sql_insert_tipo_exame);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
    endif;


    if ($acao == 'cadastrar_exame'):

        // Cadastra o exame

        $nome               = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $tipo_exame         = (isset($_POST['tipo_exame'])) ? $_POST['tipo_exame'] : '';
        $observacao         = (isset($_POST['observacao'])) ? $_POST['observacao'] : '';


        $sql_insert_exame = "INSERT INTO EXAME (EXA_NOME, EXA_OBSERVACAO, EXA_TIE_CODIGO_FK) VALUES ('$nome', '$observacao', '$tipo_exame')";
        $stmt = $conn->prepare($sql_insert_exame);
        $retorno = $stmt->execute();

        if($retorno){    
            echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso!');window.open(document.referrer,'_self');</script>";          
            }
              else
          {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
          }
    endif;


    if ($acao == 'cadastrar_consulta'):

      // Cadastra a consulta

      $paciente     = (isset($_POST['paciente'])) ? $_POST['paciente'] : '';
      $tipo_exame   = (isset($_POST['tipo_exame'])) ? $_POST['tipo_exame'] : '';
      $exame        = (isset($_POST['exame'])) ? $_POST['exame'] : '';
      $data         = (isset($_POST['data'])) ? $_POST['data'] : '';
      $hora         = (isset($_POST['hora'])) ? $_POST['hora'] : '';
      $protocolo		= $today->format("YmdHis");



      // Verifica se o horário está disponível
      $verifica_horario = "SELECT CON_HORA FROM CONSULTA WHERE CON_DATA = '$data' AND CON_HORA = '$hora'";
      $stmt = $conn->prepare($verifica_horario);
      $stmt->execute();
      $cpfs = $stmt->fetchAll(PDO::FETCH_OBJ);
      $total = $stmt->rowCount();
      
      if($total > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Horário não disponível!');window.open(document.referrer,'_self');</script>";
      }else{

      $sql_insert_consulta = "INSERT INTO CONSULTA (CON_PAC_CODIGO_FK, CON_TIE_CODIGO_FK, CON_EXA_CODIGO_FK, CON_DATA, CON_HORA, CON_PROTOCOLO) VALUES ('$paciente', '$tipo_exame', '$exame', '$data', '$hora', '$protocolo')";
      $stmt = $conn->prepare($sql_insert_consulta);
      $retorno = $stmt->execute();

      if($retorno){    
          echo"<script language='javascript' type='text/javascript'>alert('Registro salvo com sucesso! \\n Anote o protocolo: $protocolo');window.location.href='../view/consultas.php'</script>";   
          }
            else
        {
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar o registro!');window.open(document.referrer,'_self');</script>";
        }
      }
  endif;


?>