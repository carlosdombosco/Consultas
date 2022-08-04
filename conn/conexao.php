<?php

    $serverName = "localhost";
    $databaseName = "EXAMES";
    $uid = "sa";
    $pwd = "S1t3x2@1X";
    
    $conn = new PDO("sqlsrv:server = $serverName; Database = $databaseName;", $uid, $pwd);
?>