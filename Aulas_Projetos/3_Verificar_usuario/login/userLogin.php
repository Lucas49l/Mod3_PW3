<?php
    require "Usuario.class.php";

    if(isset($_POST["entrar"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $usuario = new Usuario();
        $conecta = $usuario->conn();

        if($conecta){
            $userEmail = $usuario->checkUser($email);

            if($userEmail){
                $userPass = $usuario->checkPass($email, $senha);
                if($userPass){
                    echo "Login realizado com sucesso";
                }else{
                    echo "Senha incorreta";
                }
            }else{
                echo "Email inválido";
            }
        }else{
            echo "ERro na conexão com Database";
            exit();
        }
    }
?>