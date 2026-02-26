<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    //Gettters e Setters
    private function getId(){    
        return $this->id
    }
    private function getNome(){
        return $this->nome;
    }
    private function getEmail(){
        return $this->email
    }
    private function getSenha(){
        return $this->senha
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }    
    public function setsenha($senha){
        $this->senha = $senha;
    }

    public checkUser($email){
        $sql  = "SELECT *FROM usuarios WHERE email =:e";
        $stml = $this->pdo->prepare($sql); //preparar o SQL para o banco de dados
       
        $stml->bindValue(":e", $email); //inserir o valor de email em :e
        $stml->execute(); 

        return $stml->rowCount() > 0; 
    }

    public checkPass($email, $senha){
        $sql  = "SELECT *FROM usuarios WHERE email =:e AND senha =:s";
        $stml = $this->pdo->prepare($sql);
       
        $stml->bindValue(":e", $email);
        $stml->bindValue(":s", $senha);
        $stml->execute();

        return $stml->rowCount() > 0; 
    }

    public function connection(){
        try{
            $dns  = "mysql:dbname=login;host=localhost";
            $user = "root";
            $pass = "";

            $this->pdo = new PDO($dns, $user, $pass);
            return true;

        }catch(PDOException $e){
            echo 'Erro ao conectar ao banco de dados';
            return false;
        }
    }
}

?>