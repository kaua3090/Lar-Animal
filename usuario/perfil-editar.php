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
    <link rel="stylesheet" href="../css/perfil-editar.css">
    <title>Perfil do usuario: Editar</title>
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
            <div class="conteudo">
            <?php   
                 $Cliente = $_SESSION['idCliente'];

            ?>
                <form action="editar.php" method="POST" class="formulario">
                    <h1 class="title">Editar: <u style="color: #418997;">Dados Pessoais</u></h1>
                    
                    <div class="cx1">
                        <label>Nome
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtNome" id="txtNome" required value="<?php echo $_SESSION['nomeCliente']; ?>">
                    </div>

                    <div class="cx2">
                        <label>CPF
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtCpf" id="txtCpf" required value="<?php echo $_SESSION['cpfCliente']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx3">
                        <label>RG
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtRg" id="txtRg" required value="<?php echo $_SESSION['rgCliente']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx4">
                        <label>E-mail
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtEmail" id="txtEmail" required value="<?php echo $_SESSION['emailCliente']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx5">
                        <label>Telefone
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtTelefone" id="txtTelefone" required value="<?php echo $_SESSION['telefoneCliente']; ?>" required>
                    </div>

                    <div class="cx6">
                        <label>Senha
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtSenha" id="txtSenha" required>
                    </div>

                    <div class="cx7">
                        <label>Confirmar Senha
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtSenha2" id="txtSenha2">
                    </div>

                  

                    <div class="cx8">
                        <label>Cep
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtCep" id="txtCep" value="<?php echo $_SESSION['cepCliente']; ?>" required>
                    </div>

                    <div class="cx9">
                        <label>Rua
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtRua" id="txtRua" required value="<?php echo $_SESSION['ruaCliente']; ?>"
                            readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx10">
                        <label>Numº
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtNum" id="txtNum" value="<?php echo $_SESSION['numCliente']; ?>" required>
                    </div>

                    <div class="cx11">
                        <label>Complemento</label>
                        <input type="text" name="txtComplemento" id="txtComplemento" value="<?php echo $_SESSION['complementoCliente']; ?>" placeholder="Opcional">
                    </div>

                    <div class="cx12">
                        <label>Bairro
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtBairro" id="txtBairro" value="<?php echo $_SESSION['bairroCliente']; ?>" 
                            required readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx13">
                        <label>Cidade
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <input type="text" name="txtCidade" id="txtCidade" value="<?php echo $_SESSION['cidadeCliente']; ?>" 
                            required readonly style="color: grey ; cursor:default;">
                    </div>

                    <div class="cx14">
                        <label>Estado
                            <tagname title="Esse campo é brigatório!" style=color:red;>*</tagname>
                        </label>
                        <select name="txtEstado" required>
                            <option selected><?php echo $_SESSION['estadoCliente']; ?></option>
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
                    <div class="botoes">
                        <input type="hidden" name="nIdCliente" value="<?php echo $Cliente ?>" />
                        <button type="submit" class="botao" onclick="Validar()">Atualizar</button>
                        
                        <a href="perfil-adocao.php"><input type="button" value="Voltar" class="botao2"></a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>

<script>

function Validar() {
  //   const btn = document.getElementsByClassName("botao");
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

const HTML_cep = document.getElementById("txtCep");
HTML_cep.addEventListener("blur", (e) => {
     let valor_cep = document.getElementById("txtCep").value;
     let search = valor_cep.replace("-", "");
     fetch(`https://viacep.com.br/ws/${search}/json/`).then((response) => {
          response.json().then(data => {
               console.log(data);
               document.getElementById("txtCidade").value = data.localidade;
               document.getElementById("txtBairro").value = data.bairro;
               document.getElementById("txtRua").value = data.logradouro;
          })
     })
})

</script>