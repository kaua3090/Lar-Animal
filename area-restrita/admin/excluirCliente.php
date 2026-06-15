<?php 
require_once '../../classes/Conexao.php';

if (isset($_POST['idCliente'])) {

    $id = $_POST['idCliente'];

    if (!$id) {
        die("ID inválido.");
    }

    try {
        $conexao = Conexao::pegarConexao();

        // 1️⃣ Verifica se existem registros de adoção para este cliente
        $checkStmt = $conexao->prepare("SELECT COUNT(*) FROM tbregistroadocao WHERE idCliente = :idCliente");
        $checkStmt->bindValue(':idCliente', $id, PDO::PARAM_INT);
        $checkStmt->execute();
        $total = $checkStmt->fetchColumn();

        if ($total > 0) {
            // ⚠️ Bloqueia a exclusão
            die("Não é possível excluir este cliente, pois existem registros de adoção vinculados.");
        }

        // 2️⃣ Se não houver registros, deleta o cliente
        $sql = "DELETE FROM tbcliente WHERE idCliente = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: dadosGerais.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao excluir o registro: " . $e->getMessage();
    }
}
?>