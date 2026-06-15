<?php
require_once 'global.php';
require_once './classes/Conexao.php';
require_once './classes/Animal.php';
require_once './classes/Ong.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleFormulario.css">
    <title>Document</title>
</head>
<body>

<div class="parent">
<div class="div1"> 
    <div class="container">
        <figure class="avatar">          
            <img src="./imagens/formulario/crie.png" alt="" class="img1">
            <img src="./imagens/formulario/Doar.png" alt="" class="img2">
                        <img src="./imagens/formulario/cadastreLinhaOng.png" alt="" class="img4">
            <img src="./imagens/formulario/animais-2.png" alt="" class="img-6">     
        </figure>
    </div> 
</div>


<div class="div2"> 
<div class="conteudo">
    <form name="cadastro" method="POST" enctype="multipart/form-data" action="./area-restrita/ong/cadastro-ong.php" class="formulario">
        <h1 class="title">Area de cadastro: <u style="color: #418997;">ONG</u></h1>
        
        <center>   
        <div class="cx1">
            <label>Nome da Instituição
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtNome" id="txtNome" required>
        </div>

        <div class="cx15">
            <label>Telefone
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtTelefone" id="txtTelefone" required>
        </div>

        <div class="cx8">
            <label>Cep
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtCep" id="txtCep" required>
        </div>

        <div class="cx14">
            <label>Estado
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <select name="txtEstado" id="txtEstado" required>
                <option selected disabled>*Selecione*</option>
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

        <div class="cx13">
            <label>Cidade
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtCidade" id="txtCidade" required
                readonly style="background: rgb(194, 194, 194) ; cursor:default;">
        </div>

        <div class="cx12">
            <label>Bairro
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtBairro" id="txtBairro" required
                readonly style="background: rgb(194, 194, 194) ; cursor:default;">
        </div>

        <div class="cx9">
            <label>Rua
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtRua" id="txtRua" required
                readonly style="background: rgb(194, 194, 194) ; cursor:default;"> 
        </div>

        <div class="cx10">
            <label>Numº
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtNum" id="txtNum" required>
        </div>

        <div class="cx11">
            <label>Complemento</label>
            <input type="text" name="txtComplemento" id="txtComplemento" placeholder="Opcional">
        </div>

        <div class="cx4">
            <label>E-mail
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtEmail" id="txtEmail" required>
        </div>

        <div class="cx6">
            <label>Senha
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtSenha" id="txtSenha" required onblur="Senha()">
        </div>

        <div class="cx7"> 
            <label>Confirmar Senha
                <span title="Esse campo é obrigatório!" style=color:red;>*</span>
            </label>
            <input type="text" name="txtConfirmarSenha" id="txtConfirmarSenha" required>
        </div>
        <div class="cx2">
            <label style="font-size: 19px;">Foto
                <span title="Foto obrigatório!" style=color:red;>*</span>
            </label>
                <input type="file" required name="image" id="imagem">
        </div>
    
    </center>
        <button type="submit" class="botao" onclick="Validar()">Cadastrar</button>
        <a href="login.php" class="voltar">Voltar</a>
    </form>
    </div>
</div>
</div>
</body>
</html>

<script src="./js/consultaCep.js"></script>
<script src="./js/formulario-cliente.js"></script>