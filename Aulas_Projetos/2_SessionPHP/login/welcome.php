<?php
    session_start();

    if(isset($_SESSION{'user'})){
        echo '<h1> Bem vindo '. $_SESSION['user'].'! </h1>';
    }else{
        echo "<h1> Não há nome salvo na sessão </h1>";
    }
?>