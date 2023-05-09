<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'metalcoin';

    $conn = new mysqli($host, $user, $password, $dbname) or die('Não foi possível se conectar ao banco de dados'. $conn->error);

?>