<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    # os getters simplesmente retornam o valor dos atributos da classe.
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getNome(){
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

    
    // Conexão com o banco de dados
    public function conectar(){
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

    // Cadastrar usuário
    public function inserirUsuario($nome, $email, $senha){
        $sql  = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", md5($senha));
        
        return $stmt->execute();  
    }

    // Checar se o usuário existe no banco
    public function checkUsuario($email){
        $sql = "SELECT email FROM usuario WHERE email= :e";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // Autenticar senha
    public function checkSenha($email, $senha){
        $sql = "SELECT email FROM usuario WHERE email= :e AND senha= :s";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", md5($senha));

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // Buscar nome do usuário
    public function buscarNome($email) {
        $sql = "SELECT nome FROM usuario WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);
        $stmt->execute();

        $nome = null;

        $row = $stmt->fetch();
        $nome = $row['nome'];
        return $nome;
    }

    // Listar todos os usuarios existentes no banco
    public function listarUsuarios(){
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(); // o fetchAll retorna array com todos os usuarios encontrados
        }else{
            return Array();
        }
    }

    // Atualizar dados do usuário 
    public function alterarUsuario($id, $nome, $email){
        $sql = "ALTER TABLE usuario SET nome=:n, email=:e WHERE id=:i";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue("i", $id);
        $stmt->bindValue("n", $nome);
        $stmt->bindValue("e", $email);

        $stmt->execute();

        return $stmt->fecth(); // retorna um registro

    }

    // Atualizar senha do usuário
    public function alterarSenha($id, $senha){
        $sql = "ALTER TABLE usuario SET senha=s: WHERE id=:i";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue("i", $id);
        $stmt->bindValue("s", $senha);

        return $stmt->execute();
    }

    // Deletar registro do usuário no banco
    public function deletarUsuario($id){
        $sql = "SELECT FROM usuario WHERE id=:i";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i', $id);
        return $stmt->execute();
    }
}