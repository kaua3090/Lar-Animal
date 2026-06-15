<?php

require_once '../../classes/Conexao.php';

$conexao = Conexao::pegarConexao();

$idOng = $_GET['idOng'] ?? $_POST['idOng'] ?? null;

if (!$idOng) {
    die("ID da ONG não informado.");
}

$sql = "SELECT * FROM tbong WHERE idOng = :id";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $idOng);
$stmt->execute();

$ong = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$ong) {
    die("ONG não encontrada.");
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Ong</title>

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
                            <img src="../../imagens/admin/grafico-icon.png">
                            <label>Gráficos</label>
                        </div>
                    </a>

                    <a href="dadosGerais.php">
                        <div class="icons">
                            <img src="../../imagens/admin/people-icon.png">
                            <label>Dados Gerais</label>
                        </div>
                    </a>

                    <a href="../../login.php">
                        <div class="icons">
                            <img src="../../imagens/ong/close.png">
                            <label>Sair</label>
                        </div>
                    </a>

                </div>

            </center>

        </div>

        <!-- FORM -->
        <div class="div2">

            <form method="POST" action="salvarEdicaoOng.php" class="formulario">

                <h1>
                    Atualizar Dados:
                    <u style="color:royalblue;">ONG</u>
                </h1>

                <input type="hidden"
                    name="idOng"
                    value="<?= $ong['idOng'] ?>">

                <div class="form-group">

                    <!-- NOME -->
                    <div class="cx1">

                        <label>Nome da ONG</label>

                        <input type="text"
                            name="txtNomeOng"
                            value="<?= $ong['nomeOng'] ?>"
                            required>

                    </div>

                    <!-- TELEFONE -->
                    <div class="cx2">

                        <label>Telefone</label>

                        <input type="text"
                            name="txtTelefoneOng"
                            value="<?= $ong['telefoneOng'] ?>"
                            required>

                    </div>

                    <!-- CEP -->
                    <div class="cx3">

                        <label>CEP</label>

                        <input type="text"
                            name="txtCepOng"
                            id="txtCep"
                            value="<?= $ong['cepOng'] ?>"
                            required>

                    </div>

                    <!-- ESTADO -->
                    <div class="cx4">

                        <label>Estado</label>

                        <select name="txtEstadoOng" required>

                            <option value="<?= $ong['estadoOng']; ?>" selected>
                                <?= $ong['estadoOng']; ?>
                            </option>

                            <option value="Acre">Acre</option>
                            <option value="Alagoas">Alagoas</option>
                            <option value="Amapá">Amapá</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Bahia">Bahia</option>
                            <option value="Ceará">Ceará</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Espírito Santo">Espírito Santo</option>
                            <option value="Goiás">Goiás</option>
                            <option value="Maranhão">Maranhão</option>
                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                            <option value="Minas Gerais">Minas Gerais</option>
                            <option value="Pará">Pará</option>
                            <option value="Paraíba">Paraíba</option>
                            <option value="Paraná">Paraná</option>
                            <option value="Pernambuco">Pernambuco</option>
                            <option value="Piauí">Piauí</option>
                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                            <option value="Rondônia">Rondônia</option>
                            <option value="Roraima">Roraima</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="São Paulo">São Paulo</option>
                            <option value="Sergipe">Sergipe</option>
                            <option value="Tocantins">Tocantins</option>

                        </select>

                    </div>

                    <!-- CIDADE -->
                    <div class="cx5">

                        <label>Cidade</label>

                        <input type="text"
                            name="txtCidadeOng"
                            id="txtCidade"
                            value="<?= $ong['cidadeOng'] ?>"
                            readonly>

                    </div>

                    <!-- BAIRRO -->
                    <div class="cx6">

                        <label>Bairro</label>

                        <input type="text"
                            name="txtBairroOng"
                            id="txtBairro"
                            value="<?= $ong['bairroOng'] ?>"
                            readonly>

                    </div>

                    <!-- RUA -->
                    <div class="cx7">

                        <label>Rua</label>

                        <input type="text"
                            name="txtRuaOng"
                            id="txtRua"
                            value="<?= $ong['logradouroOng'] ?>"
                            readonly>

                    </div>

                    <!-- NÚMERO -->
                    <div class="cx8">

                        <label>Número</label>

                        <input type="text"
                            name="txtNumOng"
                            value="<?= $ong['numOng'] ?>"
                            required>

                    </div>

                    <!-- COMPLEMENTO -->
                    <div class="cx9">

                        <label>Complemento</label>

                        <input type="text"
                            name="txtComplementoOng"
                            value="<?= $ong['complementoOng'] ?>">

                    </div>

                    <!-- EMAIL -->
                    <div class="cx10">

                        <label>Email</label>

                        <input type="email"
                            name="txtEmailOng"
                            value="<?= $ong['loginOng'] ?>"
                            required>

                    </div>

                    <!-- SENHA -->
                    <div class="cx10">

                        <label>Senha</label>

                        <input type="text"
                            name="txtSenhaOng"
                            value="<?= $ong['senhaOng'] ?>"
                            required>

                    </div>

                </div>

                <div class="botoes">

                    <input type="submit"
                        value="Atualizar"
                        class="botao">

                    <a href="dadosGerais.php">

                        <input type="button"
                            value="Voltar"
                            class="botao2">

                    </a>

                </div>

            </form>

        </div>

    </div>

    <script src="../../js/consultaCep.js"></script>

</body>

</html>