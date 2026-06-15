<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleLogin.css">
    <title>Página Inicial</title>
</head>
<body>   
    <div class="parent">    
        <div class="div1"> 
            <div class="logo-text">
                <img src="./imagens/login/Lar-Animal.png" class="logo-pet" alt="">
            </div>
            
            <div class="title1">
                Ainda não tem uma conta?
            </div>

            <div class="title2">
                Cadastre-se!
            </div>
            
            <div class="container">
                <a href="formulario-cliente.php"><img src="./imagens/login/cliente.png" class="img1" alt=""></a>
                
                <a href="formulario-ong.php"><img src="./imagens/login/ong.png" class="img2" alt=""> </a>                      
            </div>          
        </div>

        <div class="div2"> 
            <img class="decor1" src="./imagens/login/decoration.png" alt="">

           <form class="formulario" method="POST" action="valida-login.php">
               <div class="title">
                   <text>Bem-vindo</text>
               </div>
               <div class="subtitle">
                   <text>Crie uma conta agora mesmo e adote seu animalzinho</text>
               </div>
               <div class="campos">
                    <label>E-mail</label>
                    <input type="text" id="email" name="email">
                    <label>Senha</label>
                    <input type="password" id="senha" name="senha" style="font-size: 30px;">
               </div>
              <center><input class="botao" type="submit" value="Entrar"></center>    
              <div class="cadastros">
               <a href="formulario-cliente.php">Cadastro de Cliente</a> |
               <a href="formulario-ong.php">Cadastro de Ong</a>
           </div>         
           </form>
           <img class="decor2" src="./imagens/login/decoration.png" alt="">
           
        </div>
    </div>


    <script>

const params = new URLSearchParams(window.location.search);
const erro = params.get('erro');

if(erro === 'email'){

    const emailInput = document.getElementById('email');

    const mensagem = document.createElement('p');
    mensagem.innerText = 'E-mail não encontrado';
    mensagem.style.color = 'red';
    mensagem.style.fontSize = '14px';
    mensagem.style.marginTop = '5px';

    emailInput.insertAdjacentElement('afterend', mensagem);
}

if(erro === 'senha'){

    const senhaInput = document.getElementById('senha');

    const mensagem = document.createElement('p');
    mensagem.innerText = 'Senha incorreta';
    mensagem.style.color = 'red';
    mensagem.style.fontSize = '14px';
    mensagem.style.marginTop = '5px';

    senhaInput.insertAdjacentElement('afterend', mensagem);
}

</script>
</body>
</html>