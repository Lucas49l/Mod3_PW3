<?php
session_start();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    require "Usuario.class.php";
    
    $usuario = new Usuario();
    $conn = $usuario->conectar();
    if( $conn ){
        $usercheck = $usuario->checkUser( $email );

        if( $usercheck ){
            $user = $usuario->checkPass( $email, $senha );

            if( $user ){
                $_SESSION['nome'] = "Teste";
                header("Location: home.php");

            }else{
                echo "usuario ou senha incorretos";
            }
        }else{
            echo "Usuario não existe";
        }
    }else{
        echo "erro na conexão com o banco";
    }

}else{
    echo "Erro no metodo POST";
}

?>