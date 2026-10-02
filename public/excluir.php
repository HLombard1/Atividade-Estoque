<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();

header("Location: ../index.php");