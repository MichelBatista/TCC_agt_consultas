<?php

    include('../../../connection/connection.php');

    if (isset($_POST))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $validar_email = "SELECT ID FROM tb_usuarios WHERE EMAIL = '$email'";

        if($conn->query($validar_email)->num_rows != 0)
        {
            echo 2;
        } 
        else 
        {
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $senha = mysqli_real_escape_string($conn, $_POST['senha']);
            
            $sql = "INSERT INTO tb_usuarios(NOME, EMAIL, PASSWORD, SALDO, NIVEL_ACESSO) VALUES ('$nome', '$email', '$senha', 0, 1)";

            $conn->query($sql);

            echo 1;
        }
    }
    else
    {
        echo 0;
    }

?>