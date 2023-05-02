<?php


        // session_start();
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "<pre/>";
        //     // Remover índices do array de sessão
        //     // unset()
        //     unset($_SESSION['x']); //tem a inteligência para remover o índice apenas se ele existir
        //     echo "<pre>";
        //     print_r($_SESSION);
        //     echo "<pre/>";
       
        //     // Destruit a variável de sessão (destruir completamente)
        //     // session_destroy()
        //     session_destroy(); // Será destruída 
        //     // Forçar um redirecionamento
        //     echo "<pre>";
        //     print_r($_SESSION);
        //     echo "<pre/>";

            session_destroy();
            header('Location: index.php');

?>