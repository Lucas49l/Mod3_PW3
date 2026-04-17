<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    # os getters simplesmente retornam o valor dos atributos da classe.
    function getId(){
        return $this->id;
    }

    function getEmail(){
        return $this->email;
    }

    function getSenha(){
        return $this->senha;
    }

    function getNome(){
        return $this->nome;
    }

    # os setters recebem um parametro e trocam o valor do atributo pelo valor desse parametro.
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    function conectar(){
        $banco   = "mysql:dbname=banco;host=localhost";
        $usuario = "root";
        $senha   = "";

        try {
            $this->pdo = new PDO($banco, $usuario, $senha);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function inserirUsuario($nome, $email, $senha){
        $sql  = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", md5($senha));
        
        return $stmt->execute();  
    }

    function checkUsuario($email){
        $sql = "SELECT email FROM usuario WHERE email= :e";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function checkSenha($email, $senha){
        $sql = "SELECT email FROM usuario WHERE email= :e AND senha= :s";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", md5($senha));

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // função que pega o nome do usuario para mostrar no login
    function buscarNome($email) {
        $sql = "SELECT nome FROM usuario WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);
        $stmt->execute();

        $nome = null;

        $row = $stmt->fetch();
        $nome = $row['nome'];
        return $nome;
    }
}