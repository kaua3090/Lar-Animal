<?php
require_once '../classes/Conexao.php';
require_once '../classes/Animal.php';
require_once '../classes/Cliente.php';

// session_start();
if (!isset($_SESSION['idCliente'])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil-adocao.css">
    <title>Perfil do usuario: Status da Adoção </title>
</head>

<body>

    <div class="navbar">
        <nav></nav>
        
    </div>

    <div class="parent">

        <div class="div1">
            <center>
                <img src="../imagens/paginaInicial/Lar-Animal.png" alt="" width="200px">
                <hr width="60%">
                <h1 class="title">Bem-vindo</h1>
                <img src="../imagens/paginaInicial/<?php echo $_SESSION['fotoCliente']; ?>" alt="" class="foto-perfil">
                <h1 style="font-size: 45px; color: whitesmoke; "><?php echo $_SESSION['nomeCliente']; ?></h1>

                <div class="grid-icons">

                    <a href="../paginaInicial.php">
                        <div class="icons">
                            <img src="../imagens/ong/home.png" alt="">
                            <label>Página Inicial</label>
                        </div>
                    </a>

                    <a href="perfil-adocao.php">
                        <div class="icons">
                            <img src="../imagens/ong/pet-house.png" alt="">
                            <label>Status da Adoção</label>
                        </div>
                    </a>
                    <a href="perfil-editar.php">
                        <div class="icons">
                            <img src="../imagens/ong/settings.png" alt="">
                            <label>Configurações</label>
                        </div>
                    </a>
                    <a href="../login.php">
                        <div class="icons">
                            <img src="../imagens/ong/close.png" alt="">
                            <label>Sair</label>
                        </div>
                    </a>
                </div>
            </center>
        </div>

        <div class="div2">
            <center>
                <h1>Status da Adoção</h1>
            </center>

            <?php
            $dados = new Cliente();
            $lista = $dados->List($idDoCliente);
            foreach ($lista as $linha) { ?>
                <form class="fundo" action="pdf-adocao.php" method="POST">
                    <div class="card-group">
                        <div class="card">
                            <img src="../imagens/animais/carimbo.png" alt="" class="carimbo">
                            <img src="../imagens/animais/<?php echo $linha['fotoAnimal']; ?>" alt="">

                            <div class="dados">
                                <label style="font-size: 35px; text-align:center;"><?php echo $linha['nomeAnimal']; ?></label>
                                    <input type="text" name="txtNomeAnimal" value="<?php echo $linha['nomeAnimal']; ?>"
                                    style="display: none;">
                                <hr>

                                <label>Idade: <tagname style="color: red;"><?php echo $linha['idadeAnimal']; ?> anos</tagname></label>
                                    <input type="text" name="txtIdadeAnimal" value="<?php echo $linha['idadeAnimal']; ?>"
                                    style="display: none;">

                                <label>Cor: <tagname style="color: red;"><?php echo $linha['coloracaoAnimal']; ?></tagname></label>
                                    <input type="text" name="txtCorAnimal" value="<?php echo $linha['coloracaoAnimal']; ?>"
                                    style="display: none;">

                                <label>Sexo: <tagname style="color: red;"><?php echo $linha['sexoAnimal']; ?></tagname></label>
                                    <input type="text" name="txtSexoAnimal" value="<?php echo $linha['sexoAnimal']; ?>"
                                    style="display: none;">

                                <label>Porte: <tagname style="color: red;"><?php echo $linha['nomePorteAnimal']; ?></tagname></label>
                                    <input type="text" name="txtPorteAnimal" value="<?php echo $linha['nomePorteAnimal']; ?>"
                                    style="display: none;">

                                <label>Raça: <tagname style="color: red;"><?php echo $linha['nomeRacaAnimal']; ?></tagname></label>
                                    <input type="text" name="txtRacaAnimal" value="<?php echo $linha['nomeRacaAnimal']; ?>"
                                    style="display: none;">

                                <label>Especie: <tagname style="color: red;"><?php echo $linha['descEspecie']; ?></tagname></label>
                                    <input type="text" name="txtEspecieAnimal" value="<?php echo $linha['descEspecie']; ?>"
                                    style="display: none;">
                            </div>
                        </div>

                        <div class="card">
                            <img src="../imagens/ong/<?php echo $linha['fotoOng']; ?>" alt="">

                            <div class="dados">
                                <label style="font-size: 35px; text-align:center;"><?php echo $linha['nomeOng']; ?></label>
                                    <input type="text" name="txtNomeOng" value="<?php echo $linha['nomeOng']; ?>"
                                    style="display: none;">
                                <hr>

                                <label>Telefone: <tagname style="color: red;"><?php echo $linha['telefoneOng']; ?></tagname></label>
                                    <input type="text" name="txtTelefoneOng" value="<?php echo $linha['telefoneOng']; ?>"
                                    style="display: none;">

                                <label>CEP: <tagname style="color: red;"><?php echo $linha['cepOng']; ?></tagname></label>
                                    <input type="text" name="txtCepOng" value="<?php echo $linha['cepOng']; ?>"
                                    style="display: none;">

                                <label>Rua: <tagname style="color: red;"><?php echo $linha['logradouroOng']; ?></tagname></label>
                                    <input type="text" name="txtRuaOng" value="<?php echo $linha['logradouroOng']; ?>"
                                    style="display: none;">

                                <label>Numº: <tagname style="color: red;"><?php echo $linha['numOng']; ?></tagname></label>
                                    <input type="text" name="txtNumOng" value="<?php echo $linha['numOng']; ?>"
                                    style="display: none;">

                                <label>Bairro: <tagname style="color: red;"><?php echo $linha['bairroOng']; ?></tagname></label>
                                    <input type="text" name="txtBairroOng" value="<?php echo $linha['bairroOng']; ?>"
                                    style="display: none;">

                                <label>Cidade: <tagname style="color: red;"><?php echo $linha['cidadeOng']; ?></tagname></label>
                                    <input type="text" name="txtCidadeOng" value="<?php echo $linha['cidadeOng']; ?>"
                                    style="display: none;">

                                <label>Estado: <tagname style="color: red;"><?php echo $linha['estadoOng']; ?></tagname></label>
                                    <input type="text" name="txtEstadoOng" value="<?php echo $linha['estadoOng']; ?>"
                                    style="display: none;">
                            </div>
                        </div>
                    </div>
                    <center>
                        <input type="submit" value="Imprimir documento" class="botao">
                        <!-- <a href="pdf-adocao.php">
                            <input type="button" value="imprimir documento" class="botao">
                        </a> -->
                    </center>
                </form>
            <?php } ?>
        </div>
    </div>

    <script src="../js/foto.js"></script>
</body>

</html>