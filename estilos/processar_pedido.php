<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jrburguer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Captura os dados do formulário
$quantidade1 = isset($_POST['quantidade-1']) ? $_POST['quantidade-1'] : 0;
$quantidade2 = isset($_POST['quantidade-2']) ? $_POST['quantidade-2'] : 0;

// Verificar se há pelo menos um item pedido
if ($quantidade1 > 0) {
    $sql = "INSERT INTO pedidos (item, quantidade, preco_total) VALUES ('Sanduíche X', $quantidade1, 19.90 * $quantidade1)";
    $conn->query($sql);
}

if ($quantidade2 > 0) {
    $sql = "INSERT INTO pedidos (item, quantidade, preco_total) VALUES ('Sanduíche Y', $quantidade2, 25.99 * $quantidade2)";
    $conn->query($sql);
}

if ($quantidade1 == 0 && $quantidade2 == 0) {
    echo "Nenhum item foi adicionado ao pedido.";
} else {
    echo "Pedido realizado com sucesso!";
}

$conn->close();
?>
