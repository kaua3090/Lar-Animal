<?php
require_once './classes/Conexao.php';
require_once './classes/Animal.php';
require_once './classes/Cliente.php';

// session_start();
if (!isset($_SESSION['idCliente'])) {
    header('Location: ./login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/paginaInicial.css">
    <title>Perfil do usuario: Status da Adoção </title>
</head>

<body>

    <div class="navbar">
        <nav></nav>
        
    </div>

    <div class="parent">

        <div class="div1">
            <center>
                <img src="./imagens/paginaInicial/Lar-Animal.png" alt="" width="200px">
                <hr width="60%">
                <h1 class="title">Bem-vindo</h1>
                <img src="./imagens/paginaInicial/<?php echo $_SESSION['fotoCliente']; ?>" alt="" class="foto-perfil">
                <h1 style="font-size: 45px; color: whitesmoke; "><?php echo $_SESSION['nomeCliente']; ?></h1>

                <div class="grid-icons">

                    <a href="paginaInicial.php">
                        <div class="icons">
                            <img src="./imagens/ong/home.png" alt="">
                            <label>Página Inicial</label>
                        </div>
                    </a>

                    <a href="./usuario/perfil-adocao.php">
                        <div class="icons">
                            <img src="./imagens/ong/pet-house.png" alt="">
                            <label>Status da Adoção</label>
                        </div>
                    </a>
                    <a href="./usuario/perfil-editar.php">
                        <div class="icons">
                            <img src="./imagens/ong/settings.png" alt="">
                            <label>Configurações</label>
                        </div>
                    </a>
                    <a href="login.php">
                        <div class="icons">
                            <img src="./imagens/ong/close.png" alt="">
                            <label>Sair</label>
                        </div>
                    </a>
                </div>
            </center>
        </div>

        <div class="div2">
            <center>
                <h1>Animais Disponíveis</h1>
            </center>

            <div class="container">
            <?php
            $animal = new Animal();
            $listarTudo = $animal->ListarTudo();
            foreach ($listarTudo as $linha) { ?>
                <form action="statusAnimal.php" method="POST">
                    <button type="submit" class="card cor1">
                        <div>
                            <img src="./imagens/animais/<?php echo $linha['fotoAnimal']; ?>" class="fotoDoAnimal" alt="">
                            <label class="nomeDoAnimal"><?php echo $linha['nomeAnimal']; ?></label>
                            <div class="cardInfo">
                                <label>Idade: <span><?php echo $linha['idadeAnimal']; ?> anos</span></label>
                                <label>Cor: <span><?php echo $linha['coloracaoAnimal']; ?></span></label>
                                <label>Sexo: <span><?php echo $linha['sexoAnimal']; ?></span></label>
                                <label>Porte: <span><?php echo $linha['nomePorteAnimal']; ?></span></label>
                                <label>Raça: <span><?php echo $linha['nomeRacaAnimal']; ?></span></label>
                                <input type="hidden" name="idAnimal" value=<?php echo $linha['idAnimal']; ?>>
                            </div>
                        </div>
                    </button>
                </form>
            <?php } ?>
        </div>          

        </div>
    </div>

    <!-- <script src="./js/foto.js"></script> -->
</body>

</html>