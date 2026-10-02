<?php
include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "DELETE FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

$produto = mysqli_fetch_assoc($resultado);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Produto</title>
</head>
<body>
    <h1>Edita o Produto Bro!</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>">
        <br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="<?php echo $produto['preco']; ?>" step="0.01">
        <br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" value="<?php echo $produto['quantidade']; ?>">
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>