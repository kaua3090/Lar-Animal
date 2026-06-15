<?php
// session_start();

require_once '../../classes/Conexao.php';
require_once '../../classes/Animal.php';
require_once '../../classes/Ong.php';
require_once '../../classes/Cliente.php';

// $idOng =  $_SESSION['idOng'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/animais-adotados.css">
    <title>Área da ONG</title>
</head>

<body>
    <div class="parent">
        <div class="div1">
            <form class="banner">
                <center><img src="../../imagens/ong/<?php echo $_SESSION['fotoOng']; ?>" alt="" class="icon-profile"></center>
            </form>
            <form>
                <div class="nome-icon">
                    <center><label><b>Bem-vindo</b></label>
                    <hr style="border: 1px solid #131f29;">
                        <label><b>ONG: <?php echo $_SESSION['nomeOng']; ?></b> </label>
                    </center>
                    <a href="formulario-animal.php"><input type="button" value="Cadastrar Animal"></a>
                </div>
                <center>
                    <div class="grid-icons">
                        <a href="../ong/areaOng.php">
                            <div class="icons">
                                <img src="../../imagens/ong/home.png" alt="">
                                <label>Pagina Inicial</label>
                            </div>
                        </a>
                        <a href="animais-adotados.php">
                            <div class="icons">
                                <img src="../../imagens/ong/pet-house.png" alt="">
                                <label>Animais Adotados</label>
                            </div>
                        </a>
                        <a href="../ong/ong-config.php">
                            <div class="icons">
                                <img src="../../imagens/ong/settings.png" alt="">
                                <label>Configurações</label>
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
            </form>
        </div>

        <div class="div2">

            <center>
                <h1>Animais Adotados</h1>
            </center>
            <form class="fundo">
            <?php
            $dados = new Ong();
            $lista = $dados->ListAll($idDaOng);
            foreach ($lista as $linha) { ?>
                <div class="card-group">
                    <div class="card">
                        <img src="../../imagens/animais/carimbo.png" alt="" class="carimbo">
                        <img src="../../imagens/animais/<?php echo $linha['fotoAnimal']; ?>" alt="">

                        <div class="dados">
                            <label style="font-size: 35px; text-align:center;"><?php echo $linha['nomeAnimal']; ?></label>
                            <hr>
                            <label>Idade: <span style="color: red;"><?php echo $linha['idadeAnimal']; ?> anos</span></label>
                            <label>Cor: <span style="color: red;"><?php echo $linha['coloracaoAnimal']; ?></span></label>
                            <label>Sexo: <span style="color: red;"><?php echo $linha['sexoAnimal']; ?></span></label>
                            <label>Porte: <span style="color: red;"><?php echo $linha['nomePorteAnimal']; ?></span></label>
                            <label>Raça: <span style="color: red;"><?php echo $linha['nomeRacaAnimal']; ?></span></label>
                            <label>Especie: <span style="color: red;"><?php echo $linha['descEspecie']; ?></span></label>
                        </div>
                    </div>
                    
                    <div class="card">
                        <img src="../../imagens/paginaInicial/<?php echo $linha['fotoCliente']; ?>" alt="">

                        <div class="dados">
                            <label style="font-size: 35px; text-align:center;"><?php echo $linha['nomeCliente']; ?></label>
                            <hr>
                            <label>Fone: <span style="color: red;"><?php echo $linha['telefoneCliente']; ?></span></label>
                            <label>CPF: <span style="color: red;"><?php echo $linha['cpfCliente']; ?></span></label>
                            <label>RG: <span style="color: red;"><?php echo $linha['rgCliente']; ?></span></label>
                            <label>E-mail: <span style="color: red;"><?php echo $linha['emailCliente']; ?></span></label>
                            <label>CEP: <span style="color: red;"><?php echo $linha['cepCliente']; ?></span></label>
                        </div>
                    </div>
                </div>
                <hr style="height: 1px; background: rgba(51, 78, 90, 0.323); border-radius: 55px;">
                <?php } ?>             
            </form>           
        </div>
    </div>

</body>
</html>