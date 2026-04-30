<?php
    require '../php/usuario.class.php';
    
    $usuario = new Usuario();
    $conn = $usuario->conectar();
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista Usuarios</title>
    </head>
    <body>
        <table id="tabela">
            <thead>
                <tr>
                    <th> Código </th>
                    <th> Nome </th>
                    <th> E-mail </th>
                </tr>
            </thead>

            <tbody>
                <?php
                    if( $conn ){
                        $lista = $usuario->listarUsuarios();

                        if( empty( $lista ) ){
                            echo "Não existe usuários";
                            exit();
                        }else{
                            foreach( $lista as $row ){ //foreach percorre todo o feachAll
                                $id    = $row['id'];
                                $nome  = $row['nome'];
                                $email = $row['email'];

                                echo "<tr>";
                                echo "<td>" . $id . "</td>";
                                echo "<td>" . $nome . "</td>";
                                echo "<td>" . $email . "</td>";
                                echo "</tr>";
                            }
                        }
                    }else{
                        echo "banco indisponivel";
                        exit();
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>

