<html lang="pt-br">
    <head>
        <!--Serve par setar o UNICODE do site para o usado em PT-BR-->
        <meta charset="UTF-8"/> 
        <title>Tela de Login</title>
        <title>Seja bem-vindo</title>
        
        <!--vinculando a tela, com o CSS para estilizar a página-->
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        
    </head>
    <body>
        <!--Essa div, representa onde todo o conteúdo do site vai ficar-->
        <div class="container-principal">
            <!-- aqui é o espaço onde vamos criar o formulário-->
            <div class="formulario">
                <form action="./php/login.php" method="post">
                    <!-- adicionando campos do formulário-->
                    <input type="text" placeholder="E-mail:" name="email" required="true" minlength="3" maxlength="200">

                    <input type="password" placeholder="Senha:" name="senha" required="true" minlength="3" maxlength="8">

                    <?php
                        if (isset($_GET['msg'])) {
                            echo "<p style='color: red;'>" . htmlspecialchars($_GET['msg']) . "</p>";
                        }
                    ?>

                    <?php
                        if (isset($_GET['msgOk'])) {
                            echo "<p style='color: green;'>" . htmlspecialchars($_GET['msgOk']) . "</p>";
                        }
                    ?>
                    
                    <!--adicionando botão que irá enviar as informações do site -->
                    <input type="submit" value="Entrar">
                </form>
                <a href="./views/cadastroUsuario.php">Não tem Cadastro? <span>Clique aqui</span></a>
            </div>
        </div>
    </body>
</html>
