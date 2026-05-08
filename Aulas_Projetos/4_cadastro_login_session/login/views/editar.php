<?php
    include '../php/Usuario.class.php';
    $usuario = new Usuario();
    $con = $usuario->conectar();

    if (!$con){
        echo "Banco indisponivel";
        exit();
    }else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $user = $usuario->listarUsuario($id);
            if (empty($user)){
                echo "Usuário não encontrado";
                exit();
            }
        }else{
            echo "Erro no GET id";
            exit();
        }
    }
?>
<html lang="pt-br">
    <head>
        <!--Serve par setar o UNICODE do site para o usado em PT-BR-->
        <meta charset="UTF-8"/> 
        <title>Tela de Login</title>
        
        <!--vinculando a tela, com o CSS para estilizar a página-->
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        
    </head>
    <body>
        <!--Essa div, representa onde todo o conteúdo do site vai ficar-->
        <div class="container-principal">
            <div class="formulario">
                <h2>cadastro Usuário</h2>
                <form method="get" action="../php/editar_submit.php">
                    
                    <input type="hidden"   name = "id" value="<?php echo $user['id']; ?>">
                    <input type="text"     name = "nome" value="<?php echo $user['nome']; ?>">
                    <input type="text"     name = "email" value="<?php echo $user['email']; ?>">

                    <input type="password" name="senha" placeholder="Digite a nova">

                    <?php
                        if (isset($_GET['msg'])) {
                            echo "<p style='color: red;'>" . htmlspecialchars($_GET['msg']) . "</p>";
                        }
                    ?>
                    
                    <input type="submit" value="Salvar">
                </form>             
                <a href="../index.php">Já tem conta? <span>Clique aqui</span></a>
            </div>
        </div>
    </body>
</html>
