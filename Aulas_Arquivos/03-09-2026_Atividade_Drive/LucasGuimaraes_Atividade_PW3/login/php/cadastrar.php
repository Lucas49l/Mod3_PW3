<?php
if( isset( $_POST['email'])){
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    require 'Usuario.class.php';

    $usuario = new Usuario();
    $conn = $usuario->conectar();
    if ($conn){

        $userCheck = $usuario->checkUser($email);
        if($userCheck){
            header("Location:../index.html");
            exit();
        }

        $user = $usuario->insertUser($nome, $email, $senha);
        if( $user ){
            echo "Usuario inserido com Sucesso!";
        }else{
            echo "Erro ao inserir o Usuario!!!";
        }
        
    }else{
        echo "Banco Indisponivel. Tente mais tarde!";
    }
}