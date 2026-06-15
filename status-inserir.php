<?php
require_once './classes/Conexao.php';

if (!isset($_POST['hIdAnimal'], $_POST['hIdCliente'], $_POST['hStatus'])) {
    // Dados ausentes, redireciona ou exibe erro
    header('Location: ./usuario/perfil-adocao.php?erro=dados_incompletos');
    exit;
}

$idAni = intval($_POST['hIdAnimal']);
$idCli = intval($_POST['hIdCliente']);
$status = trim($_POST['hStatus']);

try {
    $conexao = Conexao::pegarConexao();

    // Inserção do registro de adoção
    $stmt = $conexao->prepare("INSERT INTO tbregistroadocao (statusRegistro, idAnimal, idCliente) VALUES (?, ?, ?)");
    $stmt->bindValue(1, $status);
    $stmt->bindValue(2, $idAni, PDO::PARAM_INT);
    $stmt->bindValue(3, $idCli, PDO::PARAM_INT);
    $stmt->execute();

    // Atualização do status do animal
    $stmt2 = $conexao->prepare("UPDATE tbanimal SET statusAnimal = ? WHERE idAnimal = ?");
    $stmt2->bindValue(1, $status);
    $stmt2->bindValue(2, $idAni, PDO::PARAM_INT);
    $stmt2->execute();


    // $_SESSION['msg'] = "Adoção registrada com sucesso!";
} catch (Exception $e) {
    // Retorna Erro
    echo "Erro ao processar: " . $e->getMessage();
    exit;
}

// Após o processamento, redireciona para a página desejada
header("Location: ./usuario/perfil-adocao.php");
exit;
?>