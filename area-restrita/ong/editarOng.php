<?php
session_start();
require_once '../../classes/Conexao.php';

$idOng = $_POST['nIdOng'] ?? null;

if (!$idOng) {
    die('ID da ONG não informado.');
}

$nome = $_POST['txtNomeOng'] ?? '';
$telefone = $_POST['txtTelefoneOng'] ?? '';
$cep = $_POST['txtCepOng'] ?? '';
$estado = $_POST['txtEstadoOng'] ?? '';
$cidade = $_POST['txtCidadeOng'] ?? '';
$bairro = $_POST['txtBairroOng'] ?? '';
$logradouro = $_POST['txtRuaOng'] ?? '';
$num = $_POST['txtNumOng'] ?? '';
$compl = $_POST['txtComplementoOng'] ?? '';
$email = $_POST['txtEmailOng'] ?? '';
$senhaRaw = $_POST['txtSenhaOng'] ?? null;

try {
    $conexao = Conexao::pegarConexao();

    // 🔥 monta SQL base
    $sql = "UPDATE tbong SET
                nomeOng = :nome,
                cepOng = :cep,
                estadoOng = :estado,
                cidadeOng = :cidade,
                bairroOng = :bairro,
                logradouroOng = :logradouro,
                numOng = :num,
                complementoOng = :compl,
                loginOng = :email,
                telefoneOng = :telefone";

    // 🔥 se senha foi digitada, adiciona no update
    if (!empty($senhaRaw)) {
        $sql .= ", senhaOng = :senha";
    }

    $sql .= " WHERE idOng = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':estado', $estado);
    $stmt->bindValue(':cidade', $cidade);
    $stmt->bindValue(':bairro', $bairro);
    $stmt->bindValue(':logradouro', $logradouro);
    $stmt->bindValue(':num', $num);
    $stmt->bindValue(':compl', $compl);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':id', $idOng, PDO::PARAM_INT);

  
    if (!empty($senhaRaw)) {
        $senhaHash = password_hash($senhaRaw, PASSWORD_DEFAULT);
        $stmt->bindValue(':senha', $senhaHash);
    }

    $stmt->execute();

    // atualiza sessão
    $_SESSION['nomeOng'] = $nome;

    header('Location: areaOng.php');
    exit;

} catch (PDOException $e) {
    echo 'Erro ao atualizar ONG: ' . $e->getMessage();
}
?>