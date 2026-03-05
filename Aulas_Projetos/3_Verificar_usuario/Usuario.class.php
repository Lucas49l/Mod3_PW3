<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;


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
}

?>