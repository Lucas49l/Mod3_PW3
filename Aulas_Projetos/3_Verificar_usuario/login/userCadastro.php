<?php
    require 'usuario.class.php';

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $conecta = $usuario->conn();
    
        if($conecta){
            $user = $usuario->checkUser($email);
            if(!$user){
                $user = $usuario->insertUser($nome, $email, $senha);
                if($user){
                    echo "Usuario Cadastrado";
                }else{
                    echo "ERro no cadastro";
                }
            }else{
                echo "Email ja cadastrado";
            }
        }else{
            echo "ERro na conexão com Database";
            exit();
        }

    }
