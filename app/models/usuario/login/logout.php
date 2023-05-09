<?php

    if (isset($_POST))
    {
        if (!isset($_SESSION))
        {
            session_start();
        }

        if (isset($_SESSION['LOGADO']))
        {
            session_destroy();
            
            echo 1;
        }
    }
