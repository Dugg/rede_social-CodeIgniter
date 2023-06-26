<!DOCTYPE html>
<html lang="pt-br">

<body class="home">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>senha</th>
                <th>email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $value) {
                echo "<tr>";
                echo "<td>" . $value['id'] . "</td>";
                echo "<td>" . $value['login'] . "</td>";
                echo "<td>" . $value['senha'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td><button class='btn-excluir' data-id='" . $value['id'] . "' onclick='excluirLinha(this)'>Excluir</button></td>";
                echo "<td><button class='btn-editar' data-id='" . $value['id'] . "' onclick='editarLinha(this)'>Editar</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" class="sair-btn"><button class="button">Sair</button></a>
    <a href="../public/SocialMedia/load/cadastrar" class="cadastrar-btn"><button class="button">Cadastrar</button></a>
</body>

</html>