<?php

    include('../../../connection/connection.php');

    if (isset($_POST))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        
        $sql = "SELECT * FROM tb_usuarios WHERE EMAIL = '$email' and PASSWORD = '$senha'";

        $resultQuery = $conn->query($sql);

        $qntdRow = $resultQuery->num_rows;

        if ($qntdRow == 1) 
        {
            $row = $resultQuery->fetch_assoc();

            if (!isset($_SESSION))
            {
                session_start();
            }
            
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['NOME'] = explode(" ", $row['NOME'])[0];
            $_SESSION['EMAIL'] = $row['EMAIL'];
            $_SESSION['NIVEL_ACESSO'] = $row['NIVEL_ACESSO'];
            $_SESSION['LOGADO'] = 1;
            
            echo 1;
        }
        else
        {
            echo 0;
        }

        
    }

?>