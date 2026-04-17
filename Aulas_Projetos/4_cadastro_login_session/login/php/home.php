<?php
session_start();
if($_SESSION['nome']){
    $nome = $_SESSION['nome'];
    echo "<h2> Bem vindo $nome <h2>";
}else{
    echo "Você tem que logar primeiro";
}
?>