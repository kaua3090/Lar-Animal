<?php

require_once '../../classes/Conexao.php';

$conexao = Conexao::pegarConexao();

$idOng = $_POST['idOng'] ?? null;

if (!$idOng) {
    die('ID da ONG não informado.');
}

$nome = $_POST['txtNomeOng'] ?? '';
$telefone = $_POST['txtTelefoneOng'] ?? '';
$cep = $_POST['txtCepOng'] ?? '';
$estado = $_POST['txtEstadoOng'] ?? '';
$cidade = $_POST['txtCidadeOng'] ?? '';
$bairro = $_POST['txtBairroOng'] ?? '';
$logradouro = $_POST['txtRuaOng'] ?? ($_POST['txtLogradouroOng'] ?? '');
$num = $_POST['txtNumOng'] ?? '';
$compl = $_POST['txtComplementoOng'] ?? '';
$login = $_POST['txtEmailOng'] ?? '';
$senha = $_POST['txtSenhaOng'] ?? '';

try {

    $sql = "UPDATE tbong SET

                nomeOng = :nome,
                telefoneOng = :telefone,
                cepOng = :cep,
                estadoOng = :estado,
                cidadeOng = :cidade,
                bairroOng = :bairro,
                logradouroOng = :logradouro,
                numOng = :num,
                complementoOng = :compl,
                loginOng = :login,
                senhaOng = :senha

            WHERE idOng = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':estado', $estado);
    $stmt->bindValue(':cidade', $cidade);
    $stmt->bindValue(':bairro', $bairro);
    $stmt->bindValue(':logradouro', $logradouro);
    $stmt->bindValue(':num', $num);
    $stmt->bindValue(':compl', $compl);
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':senha', $senha);
    $stmt->bindValue(':id', $idOng, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: dadosGerais.php");
    exit;

} catch (PDOException $e) {

    echo "Erro ao atualizar ONG: " . $e->getMessage();

}

?>