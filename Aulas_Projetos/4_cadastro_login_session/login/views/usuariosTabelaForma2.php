<?php
    require '../php/usuario.class.php';
    
    function teste(){

    }
    $usuario = new Usuario();
    $conn = $usuario->conectar();

                
    if( !$conn ){
        echo "banco indisponivel";
        exit();
    }else{
        $lista = $usuario->listarUsuarios();

        //Montagem do HTML da tabela
        $table   = "<table>";
            $table .= "<thead>";
                $table .= "<tr>";
                    $table .= "<th> Código </th>";
                    $table .= "<th> Nome </th>";
                    $table .= "<th> E-mail </th>";
                $table .= "</tr>";
                $table .= "<tbody>";
                        foreach( $lista as $row ){
                        $id    = $row['id'];
                        $nome  = $row['nome'];
                        $email = $row['email'];

                        $table .= "<tr>";                        
                        $table .= "<td> $id </td>";
                        $table .= "<td> $nome </td>";
                        $table .= "<td> $email </td>";
                        $table .= "</tr>";
                }
                $table .= "</tbody>";
            $table .= "<thead>";
        $table .= "</table";
    }
    echo $table;
?>
