<?php
    session_start();
	require_once "conn/conexao.php";

?>

<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Intelectah - Login</title>
		<meta name="description" content="Login page example" />
<!-- 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />-->
	
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="view/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="view/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="view/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="view/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		

		<link rel="shortcut icon" href="view/assets/media/logos/logo.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('view/assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="view/assets/media/logos/logo2.png" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Seja Bem-vindo!</h3>
								<div class="text-muted font-weight-bold">Digite seu login e senha para acessar</div>
							</div>
                            <!--<form class="form" action="login.php" id="kt_login_signin_form">-->

                            <?php 
                            
                            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                            if (!empty($dados['enviar'])){                              

                                $sql = "SELECT * FROM USUARIO WHERE USU_EMAIL = :USUARIO AND USU_SENHA = :SENHA";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':USUARIO', $dados['username'], PDO::PARAM_STR);
                                $stmt->bindParam(':SENHA', $dados['password'], PDO::PARAM_STR);
                               // $stm->bindValue(':SENHA', MD5($senha));
                                $stmt->execute();
                                $logins = $stmt->fetchAll(PDO::FETCH_OBJ);
                                $total = $stmt->rowCount();

                                if ($total !=0) {

                                   // var_dump($dados);

                                            foreach ($logins as $login){

                                                $_SESSION['senhaSession']   = $login->USU_SENHA;
                                                $_SESSION['usuarioSession'] = $login->USU_EMAIL;
                                                $_SESSION['nomeSession'] 	= $login->USU_NOME;
												$_SESSION['sessionTitulo']	= 'Intelectah';
                                            }

                                    echo "<meta http-equiv=refresh content='0; URL=view/';>";

                                        }else{
                                            $_SESSION['msg'] = 'Usuário ou senha incorretos!';
                                        }
                                    }                            

                                    if (isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                }
                            
                            ?>



							<form class="form" method="post" action="">
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text"  placeholder="Email" name="username" required/>
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Senha" name="password" required />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									
								</div>
								<button type="submit" value="Acessar" name="enviar" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Login</button>
							</form>
							
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		
		<script src="view/assets/plugins/global/plugins.bundle.js"></script>
		<script src="view/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="view/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="view/assets/js/pages/custom/login/login-general.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>