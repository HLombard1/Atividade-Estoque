<?php
include "infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade_estoque"];
    $data_validade = $_POST["data_validade"];

    $sql = "INSERT INTO produtos 
    (nome, categoria, descricao, preco, quantidade_estoque, data_validade) 
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssdis",
        $nome,
        $categoria,
        $descricao,
        $preco,
        $quantidade_estoque,
        $data_validade
    );

    $stmt->close();
}

$produtos = $conexao->query("SELECT * FROM produtos");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>
<body>

    <h1>Cadastre um Produto Bro!</h1>

    <form action="" method="POST">

        <label for="nome">Nome</label>
        <input type="text" name="nome" required></label>

        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria" required>
            <option value="">Selecione</option>
            <option value="alimento">Alimento</option>
            <option value="bebida">Bebida</option>
            <option value="limpeza">Limpeza</option>
        </select>

        <br>

        Descrição <br>
        <textarea name="descricao" required></textarea>

        <br>

        <label for="preco">Preço</label>
        <input type="float" name="preco" required></label>

        <br>

        <label for="quantidade_estoque">Quantidade no estoque</label>
        <input type="number" name="quantidade_estoque" required></label>

        <br>

        <label for="data_validade">Data de Validade</label>
        <input type="date" name="data_validade" required></label>

        <br>

        <input type="submit" value="Cadastrar Produto">
    </form>

    <h2>Produtos Cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade no Estoque</th>
                <th>Data de Validade</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($produto = mysqli_fetch_assoc($produtos)) { ?>

                <tr>
                    <td><?php echo $produto["id"] ?></td>
                    <td><?php echo $produto["nome"] ?></td>
                    <td><?php echo $produto["categoria"] ?></td>
                    <td><?php echo $produto["descricao"] ?></td>
                    <td><?php echo $produto["preco"] ?></td>
                    <td><?php echo $produto["quantidade_estoque"] ?></td>
                    <td><?php echo $produto["data_validade"] ?></td>

                    <td>
                        <a href="public/editar.php?id=<?php echo $produto["id"] ?>">Editar</a>
                        <a href="public/excluir.php?id=<?php echo $produto["id"] ?>">Excluir</a>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

</body>
</html>