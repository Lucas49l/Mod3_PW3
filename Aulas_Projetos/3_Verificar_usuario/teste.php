<?php
    require 'Usuario.class.php';

    $usuario = new Usuario();
    $conecta = $usuario->conn();

    if($conecta){
        $user = $usuario->checkUser("admin@gmail.com");
        if($user){
            echo "Usuario existe no banco";
        }else{
            echo "Usuario Não existe no banco";
        }

        $pass =  $usuario->checkPass("admin@gmail.com", "12345");
            if($pass){
                echo "<script>alert('Usuario e senha cadastrados');</script>";
            }else{
                echo "<script>alert('Usuario e senha NÂO SENCONTRADO');</script>";
            }
    }else{
        echo "Erro ao conectar ao banco";
    }
?>