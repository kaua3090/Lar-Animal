<?php

require_once '../classes/Conexao.php';

$idClient       = $_POST['nIdCliente'];
$nomeClient     = $_POST['txtNome'];
$cpfClient      = $_POST['txtCpf'];
$rgClient       = $_POST['txtRg'];
$cepClient      = $_POST['txtCep'];
$estadoClient   = $_POST['txtEstado'];
$cidadeClient   = $_POST['txtCidade'];
$bairroClient   = $_POST['txtBairro'];
$ruaClient      = $_POST['txtRua'];
$numClient      = $_POST['txtNum'];
$complClient    = $_POST['txtComplemento'];
$emailClient    = $_POST['txtEmail'];
$telefoneClient = $_POST['txtTelefone'];
$senhaClient    = $_POST['txtSenha'];
$senha2Client   = $_POST['txtSenha2'];

if ($senhaClient !== $senha2Client) {
    die("As senhas não coincidem.");
}

try {

    $conexao = Conexao::pegarConexao();

    $senhaHash = password_hash($senhaClient, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("
        UPDATE tbcliente
        SET
            nomeCliente = :nome,
            cpfCliente = :cpf,
            rgCliente = :rg,
            cepCliente = :cep,
            estadoCliente = :estado,
            cidadeCliente = :cidade,
            bairroCliente = :bairro,
            ruaCliente = :rua,
            numCliente = :numero,
            complementoCliente = :complemento,
            emailCliente = :email,
            telefoneCliente = :telefone,
            senhaCliente = :senha
        WHERE idCliente = :id
    ");

    $stmt->bindValue(':nome', $nomeClient);
    $stmt->bindValue(':cpf', $cpfClient);
    $stmt->bindValue(':rg', $rgClient);
    $stmt->bindValue(':cep', $cepClient);
    $stmt->bindValue(':estado', $estadoClient);
    $stmt->bindValue(':cidade', $cidadeClient);
    $stmt->bindValue(':bairro', $bairroClient);
    $stmt->bindValue(':rua', $ruaClient);
    $stmt->bindValue(':numero', $numClient);
    $stmt->bindValue(':complemento', $complClient);
    $stmt->bindValue(':email', $emailClient);
    $stmt->bindValue(':telefone', $telefoneClient);
    $stmt->bindValue(':senha', $senhaHash);
    $stmt->bindValue(':id', $idClient, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: ../login.php");
    exit();

} catch (Exception $e) {

    echo "ERRO: " . $e->getMessage();
}