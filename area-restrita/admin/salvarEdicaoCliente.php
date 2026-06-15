<?php

require_once '../../classes/Conexao.php';

$conexao = Conexao::pegarConexao();

$idCliente = $_POST['idCliente'] ?? null;

$nome = $_POST['nomeCliente'] ?? '';
$cpf = $_POST['cpfCliente'] ?? '';
$rg = $_POST['rgCliente'] ?? '';
$cep = $_POST['cepCliente'] ?? '';
$estado = $_POST['estadoCliente'] ?? '';
$cidade = $_POST['cidadeCliente'] ?? '';
$bairro = $_POST['bairroCliente'] ?? '';
$rua = $_POST['ruaCliente'] ?? '';
$num = $_POST['numCliente'] ?? '';
$compl = $_POST['complementoCliente'] ?? '';
$senha = $_POST['senhaCliente'] ?? '';

try {

    $sql = "UPDATE tbcliente SET
                nomeCliente = :nome,
                cpfCliente = :cpf,
                rgCliente = :rg,
                cepCliente = :cep,
                estadoCliente = :estado,
                cidadeCliente = :cidade,
                bairroCliente = :bairro,
                ruaCliente = :rua,
                numCliente = :num,
                complementoCliente = :compl,
                senhaCliente = :senha
            WHERE idCliente = :id";

    $stmt = $conexao->prepare($sql);



    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':cpf', $cpf);
    $stmt->bindValue(':rg', $rg);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':estado', $estado);
    $stmt->bindValue(':cidade', $cidade);
    $stmt->bindValue(':bairro', $bairro);
    $stmt->bindValue(':rua', $rua);
    $stmt->bindValue(':num', $num);
    $stmt->bindValue(':compl', $compl);
    $stmt->bindValue(':id', $idCliente);
    $stmt->bindValue(':senha', $senhaHash);

    $stmt->execute();

    header("Location: admin.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao atualizar cliente: " . $e->getMessage();
}