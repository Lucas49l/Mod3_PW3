<?php

require 'Usuario.class.php';

if( isset( $_POST['email'])){
    $nome  = addslashes( $_POST['nome'] );
    $email = addslashes( $_POST['email'] );
    $senha = md5( addslashes($_POST['senha'] ));

    $usuario = new Usuario();
 
    $conn = $usuario->conectar();
    if ($conn){

        $userCheck = $usuario->checkUsuario($email);
        if($userCheck){
            $mensagem = urlencode("Email já cadastrado");
            return header("Location:../views/cadastroUsuario.php?msg={$mensagem}");
            exit();
        }

        $user = $usuario->inserirUsuario($nome, $email, $senha);
        if( $user ){
            $mensagem = urlencode("Usuário cadastrado com sucesso!");
            return header("Location:../index.php?msgOk={$mensagem}");
            exit();
        }else{
            $mensagem = urlencode("Erro ao inserir o Usuário!!!");
            return header("Location:../views/cadastroUsuario.php?msg={$mensagem}");
            exit();
        }
        
    }else{
        echo "Banco Indisponivel. Tente mais tarde!";
    }
}