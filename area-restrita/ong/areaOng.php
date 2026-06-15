<?php
session_start();

require_once '../../classes/Conexao.php';
require_once '../../classes/Animal.php';
require_once '../../classes/Ong.php';

// 🔥 correção principal: variável definida
$idDaOng = $_SESSION['idOng'];

try {
    $ong = new Ong();
    $listaong = $ong->listar($idDaOng);
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/ong.css">
    <title>Área da ONG</title>
</head>

<body>

<div class="parent">

    <div class="div1">

        <form class="banner">
            <center>
                <img src="../../imagens/ong/<?php echo $_SESSION['fotoOng'] ?? 'default.png'; ?>" 
                     class="icon-profile">
            </center>
        </form>

        <form>

            <div class="nome-icon">
                <center>
                    <label><b>Bem-vindo</b></label>
                    <hr style="border: 1px solid #131f29;">

                    <label>
                        <b>ONG: <?php echo $_SESSION['nomeOng'] ?? ''; ?></b>
                    </label>
                </center>

                <a href="../animal/formulario-animal.php">
                    <input type="button" value="Cadastrar Animal">
                </a>
            </div>

            <center>
                <div class="grid-icons">

                    <a href="areaOng.php">
                        <div class="icons">
                            <img src="../../imagens/ong/home.png">
                            <label>Pagina Inicial</label>
                        </div>
                    </a>

                    <a href="../animal/animais-adotados.php">
                        <div class="icons">
                            <img src="../../imagens/ong/pet-house.png">
                            <label>Animais Adotados</label>
                        </div>
                    </a>

                    <a href="ong-config.php">
                        <div class="icons">
                            <img src="../../imagens/ong/settings.png">
                            <label>Configurações</label>
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

        </form>
    </div>

    <div class="div2">

        <h1>Cachorros</h1>

        <div class="container">

            <?php
            $animal = new Animal();
            $listarAnimal = $animal->ListarCachorroAdotados($idDaOng);

            if ($listarAnimal) {
                foreach ($listarAnimal as $linha) {
            ?>

            <div class="card cor1">
                <form>
                    <img src="../../imagens/animais/<?php echo $linha['fotoAnimal']; ?>" 
                         class="fotoDoAnimal">

                    <label class="nomeDoAnimal">
                        <?php echo $linha['nomeAnimal']; ?>
                    </label>

                    <div class="cardInfo">
                        <label>Idade: <span><?php echo $linha['idadeAnimal']; ?> anos</span></label>
                        <label>Cor: <span><?php echo $linha['coloracaoAnimal']; ?></span></label>
                        <label>Sexo: <span><?php echo $linha['sexoAnimal']; ?></span></label>
                        <label>Porte: <span><?php echo $linha['nomePorteAnimal']; ?></span></label>
                        <label>Raça: <span><?php echo $linha['nomeRacaAnimal']; ?></span></label>
                    </div>
                </form>
            </div>

            <?php
                }
            }
            ?>

        </div>

        <h1>Gatos</h1>

        <div class="container">

            <?php
            $animal = new Animal();
            $listarAnimal = $animal->ListarGatoAdotados($idDaOng);

            if ($listarAnimal) {
                foreach ($listarAnimal as $linha) {
            ?>

            <div class="card cor1">
                <form>
                    <img src="../../imagens/animais/<?php echo $linha['fotoAnimal']; ?>" 
                         class="fotoDoAnimal">

                    <label class="nomeDoAnimal">
                        <?php echo $linha['nomeAnimal']; ?>
                    </label>

                    <div class="cardInfo">
                        <label>Idade: <span><?php echo $linha['idadeAnimal']; ?> anos</span></label>
                        <label>Cor: <span><?php echo $linha['coloracaoAnimal']; ?></span></label>
                        <label>Sexo: <span><?php echo $linha['sexoAnimal']; ?></span></label>
                        <label>Porte: <span><?php echo $linha['nomePorteAnimal']; ?></span></label>
                        <label>Raça: <span><?php echo $linha['nomeRacaAnimal']; ?></span></label>
                    </div>
                </form>
            </div>

            <?php
                }
            }
            ?>

        </div>

    </div>

</div>

</body>
</html>