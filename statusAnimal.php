<?php
// Inclui arquivos essenciais
require_once 'global.php';
require_once './classes/Conexao.php';
require_once './classes/Animal.php';
require_once './classes/Ong.php';

// Data atual (dia, mês e ano)
$dia = date('d');
$mes = date('m');
$ano = date('Y');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styleStatusAnimal.css" />
    <title>Detalhes do Animal</title>
</head>
<body>
    <div class="parent">
        <!-- Área com detalhes do animal -->
        <div class="div1">
            <?php
            // Lista detalhes do animal pelo ID enviado via POST
            $animal = new Animal();
            $listarAnimal = $animal->listar2($_POST['idAnimal']);

            foreach ($listarAnimal as $linha) { ?>
                <div class="container">
                    <div class="estrutura">
                        <!-- Imagem do animal -->
                        <img class="imagem" src='./imagens/animais/<?php echo $linha['fotoAnimal']; ?>'>
                    </div>
                    <div>
                        <!-- Informações do animal -->
                        <label><span style="font-weight: bold;">Nome: </span><?php echo $linha['nomeAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Idade: </span><?php echo $linha['idadeAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Cor: </span><?php echo $linha['coloracaoAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Sexo: </span><?php echo $linha['sexoAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Porte: </span><?php echo $linha['nomePorteAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Raça: </span><?php echo $linha['nomeRacaAnimal']; ?></label><br>
                        <label><span style="font-weight: bold;">Espécie: </span><?php echo $linha['descEspecie']; ?></label><br>
                        <label><span style="font-weight: bold;">Data do pedido de Adoção: </span><?php echo $dia . "/" . $mes . "/" . $ano; ?></label>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Área com informações da ONG -->
        <?php
        $ong = new Animal();
        $listar = $ong->listarOng($_POST['idAnimal']);
        foreach ($listar as $linha) { ?>
            <div class="div2">
                <!-- Nome da ONG -->
                <h2>
                    <span style="color: white;">ONG: </span>
                    <span style="color: #1e6b7c;"><?php echo $linha['nomeOng']; ?></span>
                </h2>
                <!-- Mapa do endereço da ONG -->
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7314.8626691192285!2d-46.40398356511229!3d-23.552947199999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce65086cafaf55%3A0xf7da96815e7611da!2sETEC%20de%20Guaianases!5e0!3m2!1spt-BR!2sbr!4v1631887573079!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <!-- Informações de contato da ONG -->
                <div class="container2">
                    <div>
                        <label><span style="font-weight: bold;">Telefone: </span><?php echo $linha['telefoneOng']; ?></label><br>
                        <label><span style="font-weight: bold;">CEP: </span><?php echo $linha['cepOng']; ?></label><br>
                        <label><span style="font-weight: bold;">Rua: </span><?php echo $linha['logradouroOng']; ?></label><br>
                        <label><span style="font-weight: bold;">N°: </span><?php echo $linha['numOng']; ?></label><br>
                        <label><span style="font-weight: bold;">Bairro: </span><?php echo $linha['bairroOng']; ?></label><br>
                        <label><span style="font-weight: bold;">Cidade: </span><?php echo $linha['cidadeOng']; ?></label><br>
                        <label><span style="font-weight: bold;">Estado: </span><?php echo $linha['estadoOng']; ?></label>
                    </div>
                </div>

                <?php
                // Dados para o envio do formulário
                $idAnimal = $_POST['idAnimal'];
                $idCliente = $_SESSION['idCliente'];
                $status = "adotado";
                ?>

                <!-- Formulário para confirmar adoção -->
                <form action="status-inserir.php" method="post" class="formMsg">
                    <input type="hidden" name='hIdAnimal' value="<?php echo $idAnimal; ?>" />
                    <input type="hidden" name='hIdCliente' value="<?php echo $idCliente; ?>" />
                    <input type="hidden" name='hStatus' value="<?php echo $status; ?>" />

                    <label class="nota" style="font-weight: bold;">
                        Estou ciente que após confirmar os meus dados...<br>
                        <input type="checkbox" required> Estou ciente!
                    </label><br>

                    <button type="submit" class="botao" onclick="Mensage()">Finalizar</button>
                    <a href="paginaInicial.php"><input type="button" class="botao2" value="Voltar"></a>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

<script>
    // Função para exibir mensagem ao clicar no botão
    function Mensage() {
        alert("🐶Animal Adotado com sucesso!😸");
    }
</script>
</html>