<?php

require_once '../../classes/global.php';
require_once '../../classes/Ong.php';
require_once '../../classes/Cliente.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin-dadosGerais.css">
    <script src="excluir.js"></script>
    <title>Area do Administrador</title>
</head>

<body>



    <div class="parent">

        <div class="div1">
            <center>
                <img src="../../imagens/paginaInicial/Lar-Animal.png" alt="" width="200px">
                <hr width="60%">
                <h1 class="title">Bem-vindo</h1>
                <img src="../../imagens/admin/avatar.png" alt="" class="foto-perfil">
                <h1 style="font-size: 45px; color: whitesmoke; ">ADMIN</h1>

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

        <div class="div2">
            <div class="conteudo flex-wrap">
                <h1>Ong's Cadastradas</h1>

                <table class="tabelas">
                    <tr class="colunas">
                        <td class="item">Nome</td>
                        <td class="item">Telefone</td>
                        <td class="item">CEP</td>
                        <td class="item">Estado</td>
                        <td class="item">Cidade</td>
                        <td class="item">Bairro</td>
                        <td class="item">Rua</td>
                        <td class="item">Numº</td>
                        <td class="item">Complem.</td>
                    </tr>

                    <?php
                    $ong = new Ong();
                    $listarOng = $ong->ListarOngs();

                    foreach ($listarOng as $linha) { ?>
                        <tr class="linhas">

                            <td class="item"><?php echo $linha['nomeOng']; ?></td>
                            <td class="item"><?php echo $linha['telefoneOng']; ?></td>
                            <td class="item"><?php echo $linha['cepOng']; ?></td>
                            <td class="item"><?php echo $linha['estadoOng']; ?></td>
                            <td class="item"><?php echo $linha['cidadeOng']; ?></td>
                            <td class="item"><?php echo $linha['bairroOng']; ?></td>
                            <td class="item"><?php echo $linha['logradouroOng']; ?></td>
                            <td class="item"><?php echo $linha['numOng']; ?></td>
                            <td class="item"><?php echo $linha['complementoOng']; ?></td>

                            <form class="formExcluirOng" action="excluirOng.php" method="POST">
                                <td class="item" style="background: rgba(255,255,255,0); border: none;">
                                    <button class="botao" style="background: rgba(255,255,255,0); border: none;">
                                        <img src="../../imagens/admin/bin.png" width="30px" style="cursor:pointer;">
                                    </button>
                                </td>
                                <input type="hidden" name="idOng" value="<?php echo $linha['idOng']; ?>">
                            </form>

                            <form method="POST" action="editarOng.php">
                                <input type="hidden" name="idOng" value="<?php echo $linha['idOng']; ?>">
                                <td class="item" style="background: rgba(255,255,255,0); border: none;">
                                    <button type="submit" class="botao" style="background: rgba(255,255,255,0); border: none;">
                                        <img src="../../imagens/admin/update.png" width="30px" style="cursor:pointer;">
                                    </button>
                                </td>
                            </form>

                        </tr>
                    <?php } ?>

                </table>


                <h1>Clientes Cadastrados</h1>

                <table class="tabelas">
                    <tr class="colunas">
                        <td class="item">Nome</td>
                        <td class="item">CPF</td>
                        <td class="item">RG</td>
                        <td class="item">CEP</td>
                        <td class="item">Estado</td>
                        <td class="item">Cidade</td>
                        <td class="item">Bairro</td>
                        <td class="item">Rua</td>
                        <td class="item">Numº</td>
                        <td class="item">Complem.</td>
                    </tr>

                    <?php
                    $cliente = new Cliente();
                    $listarCliente = $cliente->ListarCliente();

                    foreach ($listarCliente as $linha) { ?>
                        <tr class="linhas">

                            <td class="item"><?php echo $linha['nomeCliente']; ?></td>
                            <td class="item"><?php echo $linha['cpfCliente']; ?></td>
                            <td class="item"><?php echo $linha['rgCliente']; ?></td>
                            <td class="item"><?php echo $linha['cepCliente']; ?></td>
                            <td class="item"><?php echo $linha['estadoCliente']; ?></td>
                            <td class="item"><?php echo $linha['cidadeCliente']; ?></td>
                            <td class="item"><?php echo $linha['bairroCliente']; ?></td>
                            <td class="item"><?php echo $linha['ruaCliente']; ?></td>
                            <td class="item"><?php echo $linha['numCliente']; ?></td>
                            <td class="item"><?php echo $linha['complementoCliente']; ?></td>

                            <form class="formExcluirCliente" action="excluirCliente.php" method="POST">
                                <td class="item" style="background: rgba(255,255,255,0); border: none;">
                                    <button class="botaoCliente" style="background: rgba(255,255,255,0); border: none;">
                                        <img src="../../imagens/admin/bin.png" width="30px" style="cursor:pointer;">
                                    </button>
                                </td>
                                <input type="hidden" name="idCliente" value="<?php echo $linha['idCliente']; ?>">

                            </form>

                            <form class="formEditarCliente" action="editarCliente.php" method="POST">

                                <input type="hidden"
                                    name="idCliente"
                                    value="<?php echo $linha['idCliente']; ?>">

                                <td class="item" style="background: rgba(255,255,255,0); border: none;">

                                    <button type="submit"
                                        class="botaoCliente"
                                        style="background: rgba(255,255,255,0); border: none;">

                                        <img src="../../imagens/admin/update.png"
                                            width="30px"
                                            style="cursor:pointer;">

                                    </button>

                                </td>

                            </form>
                        </tr>
                    <?php } ?>

                </table>


                <h1>Animais Cadastrados</h1>

                <table class="tabelas">
                    <tr class="colunas">
                        <td class="item">Nome</td>
                        <td class="item">Idade</td>
                        <td class="item">Cor</td>
                        <td class="item">Sexo</td>
                        <td class="item">Especie</td>
                        <td class="item">Porte</td>
                        <td class="item">Raça</td>
                        <td class="item">Foto</td>
                    </tr>

                    <?php
                    $animal = new Animal();
                    $listarTudo = $animal->ListarTudo();

                    foreach ($listarTudo as $linha) { ?>
                        <tr class="linhas">

                            <td class="item"><?php echo $linha['nomeAnimal']; ?></td>
                            <td class="item"><?php echo $linha['idadeAnimal']; ?></td>
                            <td class="item"><?php echo $linha['coloracaoAnimal']; ?></td>
                            <td class="item"><?php echo $linha['sexoAnimal']; ?></td>
                            <td class="item"><?php echo $linha['nomeRacaAnimal']; ?></td>
                            <td class="item"><?php echo $linha['nomePorteAnimal']; ?></td>
                            <td class="item"><?php echo $linha['descEspecie']; ?></td>

                            <td class="item foto">
                                <img src="../../imagens/animais/<?php echo $linha['fotoAnimal']; ?>"
                                    width="80px" style="border-radius:50%; min-block-size:75px;">
                            </td>

                            <form class="formExcluir" action="excluir.php" method="POST">
                                <td class="item" style="background: rgba(255,255,255,0); border: none;">
                                    <button class="botao" style="background: rgba(255,255,255,0); border: none;">
                                        <img src="../../imagens/admin/bin.png" width="30px" style="cursor:pointer;">
                                    </button>
                                </td>

                                <input type="hidden" name="idAnimal" value="<?php echo $linha['idAnimal']; ?>">
                            </form>

                        </tr>
                    <?php } ?>

                </table>


                <h1>Animais Adotados</h1>

                <table class="tabelas">
                    <tr class="colunas">
                        <td class="item">Nome</td>
                        <td class="item">Idade</td>
                        <td class="item">Cor</td>
                        <td class="item">Sexo</td>
                        <td class="item">Especie</td>
                        <td class="item">Porte</td>
                        <td class="item">Raça</td>
                        <td class="item">Foto</td>
                    </tr>

                    <?php
                    $animal = new Animal();
                    $listarTudo = $animal->ListarAdotados();

                    foreach ($listarTudo as $linha) { ?>
                        <tr class="linhas">

                            <td class="item"><?php echo $linha['nomeAnimal']; ?></td>
                            <td class="item"><?php echo $linha['idadeAnimal']; ?></td>
                            <td class="item"><?php echo $linha['coloracaoAnimal']; ?></td>
                            <td class="item"><?php echo $linha['sexoAnimal']; ?></td>
                            <td class="item"><?php echo $linha['nomeRacaAnimal']; ?></td>
                            <td class="item"><?php echo $linha['nomePorteAnimal']; ?></td>
                            <td class="item"><?php echo $linha['descEspecie']; ?></td>

                            <td class="item">
                                <img src="../../imagens/animais/<?php echo $linha['fotoAnimal']; ?>"
                                    width="80px" style="border-radius:50%; height:75px;">
                            </td>

                        </tr>
                    <?php } ?>

                </table>

            </div>
        </div>
    </div>


    <script src="excluir.js"></script>
</body>

</html>