<?php
session_start();

require_once '../../classes/Conexao.php';
require_once '../../classes/Animal.php';
require_once '../../classes/Ong.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/ong-config.css">
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
                    <a href="../animal/formulario-animal.php"><input type="button" value="Cadastrar Animal"></a>
                </div>
                <center>
                    <div class="grid-icons">
                        <a href="areaOng.php">
                            <div class="icons">
                                <img src="../../imagens/ong/home.png" alt="">
                                <label>Pagina Inicial</label>
                            </div>
                        </a>
                        <a href="../animal/animais-adotados.php">
                            <div class="icons">
                                <img src="../../imagens/ong/pet-house.png" alt="">
                                <label>Animais Adotados</label>
                            </div>
                        </a>
                        <a href="ong-config.php">
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
        <?php   
            $Ong = $_SESSION['idOng'];

        ?>
        <div class="div2">
            <form method="POST" action="editarOng.php" class="formulario">
                <h1>Atualizar Dados: <span style="color: royalblue;"><u>ONG</u></span></h1>
                <div class="form-group">
                    <!-- <center>    -->
                    <div class="cx1">
                        <label>Nome da Instituição
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtNomeOng" id="txtNomeOng" value="<?php echo $_SESSION['nomeOng']; ?>" required>
                    </div>

                    <div class="cx1">
                        <label>Telefone
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtTelefoneOng" id="txtTelefoneOng" value="<?php echo $_SESSION['telefoneOng']; ?>" required>
                    </div>

                    <div class="cx4">
                        <label>E-mail
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtEmailOng" id="txtEmailOng" value="<?php echo $_SESSION['loginOng']; ?>" 
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx6">
                        <label>Senha
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtSenhaOng" id="txtSenhaOng" required>
                    </div>

                    <div class="cx7">
                        <label>Confirmar Senha
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtSenha2Ong" id="txtSenha2Ong" required>
                    </div>

                    <h3 style="margin: 5% 0 3% 6% ;">Localização:</h3>

                    <div class="cx8">
                        <label>Cep
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtCepOng" id="txtCepOng" value="<?php echo $_SESSION['cepOng']; ?>" required>
                    </div>

                    <div class="cx9">
                        <label>Rua
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtRuaOng" id="txtRuaOng" value="<?php echo $_SESSION['logradouroOng']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx10">
                        <label>Numº
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtNumOng" id="txtNumOng" value="<?php echo $_SESSION['numOng']; ?>" required>
                    </div>

                    <div class="cx11">
                        <label>Complemento</label>
                        <input type="text" name="txtComplementoOng" id="txtComplementoOng" value="<?php echo $_SESSION['complementoOng']; ?>" placeholder="Opcional">
                    </div>

                    <div class="cx12">
                        <label>Bairro
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtBairroOng" id="txtBairroOng" value="<?php echo $_SESSION['bairroOng']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx13">
                        <label>Cidade
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <input type="text" name="txtCidadeOng" id="txtCidadeOng" value="<?php echo $_SESSION['cidadeOng']; ?>" 
                            required readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx14">
                        <label>Estado
                            <span title="Esse campo é obrigatório!" style=color:red;>*</span>
                        </label>
                        <select name="txtEstadoOng" required>
                            <option selected><?php echo $_SESSION['estadoOng']; ?></option>
                            <option>Acre</option>
                            <option>Alagoas</option>
                            <option>Amapá</option>
                            <option>Amazonas</option>
                            <option>Bahia</option>
                            <option>Ceará</option>
                            <option>Distrito Federal</option>
                            <option>Espírito Santo</option>
                            <option>Goiás</option>
                            <option>Maranhão</option>
                            <option>Mato Grosso do Sul</option>
                            <option>Minas Gerais</option>
                            <option>Pará</option>
                            <option>Paraíba</option>
                            <option>Paraná</option>
                            <option>Pernambuco</option>
                            <option>Piauí</option>
                            <option>Rio de Janeiro</option>
                            <option>Rio Grande do Norte</option>
                            <option>Rio Grande do Sul</option>
                            <option>Rondônia</option>
                            <option>Roraima</option>
                            <option>Santa Catarina</option>
                            <option>São Paulo</option>
                            <option>Sergipe</option>
                            <option>Tocantins</option>
                        </select>
                    </div>
                    <!-- </center> -->
                </div>
                <div class="botoes">
                    <input type="hidden" name="nIdOng" value="<?php echo $Ong ?>" />
                    <input type="submit" value="Atualizar" class="botao">

                    <a href="areaOng.php"><input type="button" value="Voltar" class="botao2"></a>
                </div>

            </form>

            <!-- <script src="../js/foto.js"></script> -->

        </div>
    </div>
</body>
</html>

<script>

function Validar() {
  const form = document.getElementsByClassName("formulario");

  for (formulario of form) {
    formulario.addEventListener("submit", function (event) {
      event.preventDefault();


    //   const option = window.confirm(
    //     "Você tem certeza que deseja apagar esse Animal?"
    //   );

      if (form) {      
            alert("✅Cadastro atualizado com SUCESSO!, você sera redirecionado para a página de Login✅");
          
            event.target.submit();
            window.location("login.php");
            return true;
      }

    });
  }
}

//API CORREIOS
const HTML_cep = document.getElementById("txtCepOng");
HTML_cep.addEventListener("blur", (e) => {
     let valor_cep = document.getElementById("txtCepOng").value;
     let search = valor_cep.replace("-", "");
     fetch(`https://viacep.com.br/ws/${search}/json/`).then((response) => {
          response.json().then(data => {
               console.log(data);
               document.getElementById("txtCidadeOng").value = data.localidade;
               document.getElementById("txtBairroOng").value = data.bairro;
               document.getElementById("txtRuaOng").value = data.logradouro;
          })
     })
})

</script>