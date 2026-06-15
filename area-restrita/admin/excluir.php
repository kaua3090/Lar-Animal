<?php 
require_once '../../classes/Conexao.php';

if(isset($_POST['idAnimal'])){

    $id = $_POST['idAnimal'];

    $sql = "DELETE FROM tbanimal WHERE idAnimal = :id";

    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: dadosGerais.php");
    exit;
}
?>