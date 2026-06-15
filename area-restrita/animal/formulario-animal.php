<?php
require_once '../../classes/Conexao.php';
require_once '../../classes/Animal.php';
require_once '../../classes/Ong.php';


try {
    $pdo = new PDO("mysql:host=localhost;dbname=bdlaranimal", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sexo
    $sqlSexo = $pdo->query("SELECT * FROM tbsexoanimal");
    $sexoAnimal = $sqlSexo->fetchAll(PDO::FETCH_ASSOC);

    // Porte
    $sqlPorte = $pdo->query("SELECT * FROM tbporteanimal");
    $porteAnimal = $sqlPorte->fetchAll(PDO::FETCH_ASSOC);

    // Espécie
    $sqlEspecie = $pdo->query("SELECT * FROM tbespecieanimal");
    $especieAnimal = $sqlEspecie->fetchAll(PDO::FETCH_ASSOC);

    // Raça
    $sqlRaca = $pdo->query("SELECT * FROM tbracaanimal");
    $racaAnimal = $sqlRaca->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/animal.css">

    <title>Cadastrar Animal</title>
</head>

<body>

    <div class="parent">

        <div class="div1">

            <form class="banner">
                <center>
                    <img src="../../imagens/ong/<?php echo $_SESSION['fotoOng']; ?>" alt="" class="icon-profile">
                </center>
            </form>

            <form>

                <div class="nome-icon">

                    <center>
                        <label><b>Bem-vindo</b></label>

                        <hr style="border: 1px solid #131f29;">

                        <label>
                            <b>ONG: <?php echo $_SESSION['nomeOng']; ?></b>
                        </label>
                    </center>

                    <a href="formulario-animal.php">
                        <input type="button" value="Cadastrar Animal">
                    </a>

                </div>

                <center>

                    <div class="grid-icons">

                        <a href="../ong/areaOng.php">
                            <div class="icons">
                                <img src="../../imagens/ong/home.png" alt="">
                                <label>Página Inicial</label>
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

            <form method="POST"
                  enctype="multipart/form-data"
                  action="animalTry.php"
                  class="formAnimal">

                <div class="max-width">

                    <div class="imageContainer">
                        <img src="../../imagens/form-animal/camera.png"
                             alt="Selecione a foto"
                             id="imgPhoto">
                    </div>

                </div>

                <input type="file" name="image" id="imagem" required>

                <label>Nome</label>
                <input type="text"
                       name="txtNomeAnimal"
                       id="txtNomeAnimal"
                       required>

                <!-- SEXO -->
                <label>Sexo:</label>

                <select name="txtSexoAnimal"
                        id="txtSexoAnimal"
                        required>

                    <option selected disabled>*Selecione*</option>

                    <?php foreach ($sexoAnimal as $sexo) { ?>

                        <option value="<?php echo $sexo['idSexoAnimal']; ?>">
                            <?php echo $sexo['sexoAnimal']; ?>
                        </option>

                    <?php } ?>

                </select>

                <!-- IDADE -->
                <label>Idade</label>

                <input type="text"
                       name="txtIdadeAnimal"
                       id="txtIdadeAnimal"
                       required>

                <!-- COR -->
                <label>Coloração</label>

                <input type="text"
                       name="txtCorAnimal"
                       id="txtCorAnimal"
                       required>

                <!-- PORTE -->
                <label>Porte:</label>

                <select name="txtPorteAnimal"
                        id="txtPorteAnimal"
                        required>

                    <option selected disabled>*Selecione*</option>

                    <?php foreach ($porteAnimal as $porte) { ?>

                        <option value="<?php echo $porte['idPorteAnimal']; ?>">
                            <?php echo $porte['nomePorteAnimal']; ?>
                        </option>

                    <?php } ?>

                </select>

                <!-- ESPÉCIE -->
                <label>Espécie:</label>

                <select name="txtEspecieAnimal"
                        id="txtEspecieAnimal"
                        required>

                    <option selected disabled>*Selecione*</option>

                    <?php foreach ($especieAnimal as $especie) { ?>

                        <option value="<?php echo $especie['idEspecieAnimal']; ?>">
                            <?php echo $especie['descEspecie']; ?>
                        </option>

                    <?php } ?>

                </select>

                <!-- RAÇA -->
                <label>Raça</label>

                <select name="txtRacaAnimal"
                        id="txtRacaAnimal"
                        required>

                    <option selected disabled>*Selecione*</option>

                    <?php foreach ($racaAnimal as $raca) { ?>

                        <option value="<?php echo $raca['idRacaAnimal']; ?>">
                            <?php echo $raca['nomeRacaAnimal']; ?>
                        </option>

                    <?php } ?>

                </select>

                <center>
                    <input type="submit" value="Cadastrar">
                </center>

            </form>

        </div>

    </div>

    <script src="../../js/foto.js"></script>

</body>
</html>