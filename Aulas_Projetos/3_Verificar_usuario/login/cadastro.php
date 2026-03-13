<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form action="UserCadastro.php" method="POST">
        <input type="text" name="nome" placeholder="Inserir nome" required><br><br>
        <input type="email" name="email" placeholder="Inserir email" required><br><br>
        <input type="password" name="senha" placeholder="Inserir senha" required><br><br>
        <input type="submit" name="cadastrar" value=cadastrar>
    </form><br><br>
    <a href="login.php">entrar</a>
</body>
</html>