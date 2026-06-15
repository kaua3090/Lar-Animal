<?php

require_once '../../classes/Conexao.php';

$conexao = Conexao::pegarConexao();

$idCliente = $_POST['idCliente'] ?? null;

$sql = "SELECT * FROM tbcliente WHERE idCliente = :id";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $idCliente);

$stmt->execute();

$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

$estado = $cliente['estadoCliente'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../css/admin-dadosGerais.css">
    <link rel="stylesheet" href="../../css/editarCliente.css">
</head>

<body>

    <div class="parent">

        <!-- MENU -->
        <div class="div1">
            <center>
                <img src="../../imagens/paginaInicial/Lar-Animal.png" width="200px">
                <hr width="60%">

                <h1 class="title">Bem-vindo</h1>

                <img src="../../imagens/admin/avatar.png" class="foto-perfil">

                <h1 style="font-size:45px;color:whitesmoke;">ADMIN</h1>

                <div class="grid-icons">
                    <a href="admin.php">
                        <div class="icons">
                            <img src="../../imagens/admin/grafico-icon.png" alt="">
                            <label>Gráficos</label>
                        </div>
                    </a>

                    <a href="dadosGerais.php">
                        <div class="icons">
                            <img src="../../imagens/admin/people-icon.png" alt="">
                            <label>Dados Gerais</label>
                        </div>
                    </a>

                    <a href="../../login.php">
                        <div class="icons">
                            <img src="../../imagens/ong/close.png" alt="">
                            <label>Sair</label>
                        </div>
                    </a>
                </div>

            </center>
        </div>

        <!-- FORM -->
        <div class="div2">

            <form method="POST" action="salvarEdicaoCliente.php" class="formulario">

                <h1>Atualizar Dados: <u style="color:royalblue;">Cliente</u></h1>

                <input type="hidden" name="idCliente" value="<?= $cliente['idCliente'] ?>">

                <div class="form-group">

                    <div class="cx1">
                        <label>Nome</label>
                        <input type="text" name="nomeCliente" value="<?= $cliente['nomeCliente'] ?>" required>
                    </div>

                    <div class="cx2">
                        <label>CPF</label>
                        <input type="text" name="cpfCliente" value="<?= $cliente['cpfCliente'] ?>" required>
                    </div>

                    <div class="cx3">
                        <label>RG</label>
                        <input type="text" name="rgCliente" value="<?= $cliente['rgCliente'] ?>" required>
                    </div>

                    <div class="cx4">
                        <label>CEP</label>
                        <input type="text" name="cepCliente" id="txtCep" value="<?= $cliente['cepCliente'] ?>" required>
                    </div>

                    <div class="cx5">
                        <label>Rua</label>
                        <input type="text" name="ruaCliente" id="txtRua" value="<?= $cliente['ruaCliente'] ?>" readonly>
                    </div>

                    <div class="cx6">
                        <label>Número</label>
                        <input type="text" name="numCliente" value="<?= $cliente['numCliente'] ?>" required>
                    </div>

                    <div class="cx7">
                        <label>Complemento</label>
                        <input type="text" name="complementoCliente" value="<?= $cliente['complementoCliente'] ?>">
                    </div>

                    <div class="cx8">
                        <label>Bairro</label>
                        <input type="text" name="bairroCliente" id="txtBairro" value="<?= $cliente['bairroCliente'] ?>" readonly>
                    </div>

                    <div class="cx9">
                        <label>Cidade</label>
                        <input type="text" name="cidadeCliente" id="txtCidade" value="<?= $cliente['cidadeCliente'] ?>" readonly>
                    </div>

                    <!-- ESTADOS -->
                    <div class="cx10">
                        <label>Estado</label>

                        <select name="estadoCliente" required>

                            <option value="Acre" <?= $estado == "Acre" ? "selected" : "" ?>>Acre</option>
                            <option value="Alagoas" <?= $estado == "Alagoas" ? "selected" : "" ?>>Alagoas</option>
                            <option value="Amapá" <?= $estado == "Amapá" ? "selected" : "" ?>>Amapá</option>
                            <option value="Amazonas" <?= $estado == "Amazonas" ? "selected" : "" ?>>Amazonas</option>
                            <option value="Bahia" <?= $estado == "Bahia" ? "selected" : "" ?>>Bahia</option>
                            <option value="Ceará" <?= $estado == "Ceará" ? "selected" : "" ?>>Ceará</option>
                            <option value="Distrito Federal" <?= $estado == "Distrito Federal" ? "selected" : "" ?>>Distrito Federal</option>
                            <option value="Espírito Santo" <?= $estado == "Espírito Santo" ? "selected" : "" ?>>Espírito Santo</option>
                            <option value="Goiás" <?= $estado == "Goiás" ? "selected" : "" ?>>Goiás</option>
                            <option value="Maranhão" <?= $estado == "Maranhão" ? "selected" : "" ?>>Maranhão</option>
                            <option value="Mato Grosso do Sul" <?= $estado == "Mato Grosso do Sul" ? "selected" : "" ?>>Mato Grosso do Sul</option>
                            <option value="Minas Gerais" <?= $estado == "Minas Gerais" ? "selected" : "" ?>>Minas Gerais</option>
                            <option value="Pará" <?= $estado == "Pará" ? "selected" : "" ?>>Pará</option>
                            <option value="Paraíba" <?= $estado == "Paraíba" ? "selected" : "" ?>>Paraíba</option>
                            <option value="Paraná" <?= $estado == "Paraná" ? "selected" : "" ?>>Paraná</option>
                            <option value="Pernambuco" <?= $estado == "Pernambuco" ? "selected" : "" ?>>Pernambuco</option>
                            <option value="Piauí" <?= $estado == "Piauí" ? "selected" : "" ?>>Piauí</option>
                            <option value="Rio de Janeiro" <?= $estado == "Rio de Janeiro" ? "selected" : "" ?>>Rio de Janeiro</option>
                            <option value="Rio Grande do Norte" <?= $estado == "Rio Grande do Norte" ? "selected" : "" ?>>Rio Grande do Norte</option>
                            <option value="Rio Grande do Sul" <?= $estado == "Rio Grande do Sul" ? "selected" : "" ?>>Rio Grande do Sul</option>
                            <option value="Rondônia" <?= $estado == "Rondônia" ? "selected" : "" ?>>Rondônia</option>
                            <option value="Roraima" <?= $estado == "Roraima" ? "selected" : "" ?>>Roraima</option>
                            <option value="Santa Catarina" <?= $estado == "Santa Catarina" ? "selected" : "" ?>>Santa Catarina</option>
                            <option value="São Paulo" <?= $estado == "São Paulo" ? "selected" : "" ?>>São Paulo</option>
                            <option value="Sergipe" <?= $estado == "Sergipe" ? "selected" : "" ?>>Sergipe</option>
                            <option value="Tocantins" <?= $estado == "Tocantins" ? "selected" : "" ?>>Tocantins</option>

                        </select>
                    </div>

                </div>

                <div class="cx10">

                    <label>Senha</label>

                    <input type="password"
                        name="senhaCliente"
                        placeholder="Digite uma nova senha">

                </div>

                <div class="botoes">
                    <input type="submit" value="Atualizar" class="botao">

                    <a href="dadosGerais.php">
                        <input type="button" value="Voltar" class="botao2">
                    </a>
                </div>

            </form>

        </div>

    </div>

    <script src="../../js/consultaCep.js"></script>

</body>

</html>