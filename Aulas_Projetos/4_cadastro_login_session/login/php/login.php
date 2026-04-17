<?php
session_start();

require "Usuario.class.php";

if(isset($_POST['email'])){

    //md5 criptografa a senha
    $email = addslashes( $_POST['email'] );
    $senha = md5( addslashes($_POST['senha'] ) );

    $usuario = new Usuario();
    $conn = $usuario->conectar();
    if( $conn ){
        $usercheck = $usuario->checkUsuario( $email );

        if( $usercheck ){
            
            $user = $usuario->checkSenha( $email, $senha );
            if( $user ){
                $nome = $usuario->buscarNome($email);
                
                $_SESSION['nome'] = $nome;
                header("Location: home.php");

            }else{
                $mensagem = urlencode("Usuário ou senha incorretos");
                return header("Location:../index.php?msg={$mensagem}");
                exit();
            }
        }else{
            $mensagem = urlencode("Usuário não existe");
            return header("Location:../index.php?msg={$mensagem}");
            exit();
        }
    }else{
        echo "erro na conexão com o banco";
    }

}else{
    echo "Erro no metodo POST";
}

?>