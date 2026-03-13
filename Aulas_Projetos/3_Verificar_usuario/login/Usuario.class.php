<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function conn(){
        $dns  = "mysql:dbname=login;host=localhost";
        $user = "root";
        $pass = "";
            
        try{
            $this->pdo = new PDO($dns, $user, $pass);
            return true;

        }catch(\Throwable $e){
            return false;
        }
    }

    public function checkUser($email){
        // Criar a variavel com a consulta SQL
        $sql  = "SELECT *FROM usuarios WHERE email =:e";

        // Chamar o metodo prepare para preparar a consulta
        $stml = $this->pdo->prepare($sql); 
       
        // inserir o valor de email em :e
        $stml->bindValue(":e", $email); 

        // executar o comando
        $stml->execute(); 

        // Select
        return $stml->rowCount() > 0; 
    }

    public function checkPass($email, $senha){
        $sql  = "SELECT *FROM usuarios WHERE email =:e AND senha =:s";
        $stml = $this->pdo->prepare($sql);
       
        $stml->bindValue(":e", $email);
        $stml->bindValue(":s", $senha);
        $stml->execute();

        return $stml->rowCount() > 0; 
    }

    public function insertUser($nome, $email, $senha){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:n,:e,:s)";
        
        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':n', $nome);
        $stm->bindValue(':e', $email);
        $stm->bindValue(':s', $senha);
        return $stm->execute();
    }
}

?>