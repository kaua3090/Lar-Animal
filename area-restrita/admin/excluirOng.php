<?php 
require_once '../../classes/Conexao.php';

if (isset($_POST['idOng'])) {

    $id = $_POST['idOng'];

    if (!$id) {
        die("ID inválido.");
    }

    try {
        $conexao = Conexao::pegarConexao();

        // 1️⃣ Verifica se existem registros de adoção para este cliente
        $checkStmt = $conexao->prepare("SELECT COUNT(*) FROM tbanimal WHERE idOng = :idOng");
        $checkStmt->bindValue(':idOng', $id, PDO::PARAM_INT);
        $checkStmt->execute();
        $total = $checkStmt->fetchColumn();

        if ($total > 0) {
            // ⚠️ Bloqueia a exclusão
            die("Não é possível excluir esta Ong, pois existem registros de adoção vinculados.");
        }

        // 2️⃣ Se não houver registros, deleta o cliente
        $sql = "DELETE FROM tbOng WHERE idOng = :id";
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