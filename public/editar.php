<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM produtos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$produto = mysqli_fetch_assoc($resultado);

$stmt->close();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Produto</title>
</head>

<body>

    <h1>Edita o Produto Bro!</h1>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>">

        <br>

        <label for="categoria">Categoria:</label>

        <select name="categoria" id="categoria">

            <option value="alimento" <?php if ($produto['categoria'] == 'alimento') echo 'selected'; ?>>
                Alimento
            </option>

            <option value="bebida" <?php if ($produto['categoria'] == 'bebida') echo 'selected'; ?>>
                Bebida
            </option>

            <option value="limpeza" <?php if ($produto['categoria'] == 'limpeza') echo 'selected'; ?>>
                Limpeza
            </option>

        </select>

        <br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $produto['descricao']; ?>">

        <br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="<?php echo $produto['preco']; ?>" step="0.01">

        <br>

        <label for="quantidade_estoque">Quantidade em Estoque:</label>
        <input type="number" name="quantidade_estoque" id="quantidade_estoque" value="<?php echo $produto['quantidade_estoque']; ?>">

        <br>

        <label for="data_validade">Data de Validade:</label>
        <input type="date" name="data_validade" id="data_validade" value="<?php echo $produto['data_validade']; ?>">

        <br>

        <input type="submit" value="Atualizar">

    </form>

</body>
</html>