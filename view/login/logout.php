<?php

	session_start();


	unset ($_SESSION['senhaSession']);
	unset ($_SESSION['usuarioSession']);
	session_destroy();
	
	header ("Location: ./login/");




?>