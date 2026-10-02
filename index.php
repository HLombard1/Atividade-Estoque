<?php
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
        <textarea name="descricao"  required></textarea>

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
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade no Estoque</th>
                <th>Data de Validade</th>
            </tr>
        </thead> 
        <tbody>
            <?php while ($brinquedo = mysqli_fetch_assoc($brinquedos)) { ?>
                    <tr>
                        <td><?php echo $brinquedo["id"] ?></td>
                        <td><?php echo $brinquedo["nome"] ?></td>
                        <td><?php echo $brinquedo["categoria"] ?></td>
                        <td><?php echo $brinquedo["descricao"] ?></td>
                        <td><?php echo $brinquedo["preco"] ?></td>
                        <td><?php echo $brinquedo["quantidade_estoque"] ?></td>
                        
                        <td>
                            <a href="public/editar.php?id=<?php echo $brinquedo["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $brinquedo["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>

</body>
</html>