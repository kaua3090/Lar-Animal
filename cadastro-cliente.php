<?php 
    require_once 'classes/Conexao.php';
    require_once('classes/Cliente.php');
    // require_once('classes/TelefoneCliente.php');

    try{

        header('Location: login.php');

        $cliente = new Cliente();
        $cliente->setNomeCliente($_POST['txtNome']);
        $cliente->setCpfCliente($_POST['txtCpf']);
        $cliente->setRgCliente($_POST['txtRg']);
        $cliente->setCepCliente($_POST['txtCep']);
        $cliente->setEstadoCliente($_POST['txtEstado']);
        $cliente->setCidadeCliente($_POST['txtCidade']);
        $cliente->setBairroCliente($_POST['txtBairro']);
        $cliente->setRuaCliente($_POST['txtRua']);
        $cliente->setNumCliente($_POST['txtNum']);
        $cliente->setComplCliente($_POST['txtComplemento']);
        $cliente->setEmailCliente($_POST['txtEmail']);
        $cliente->setSenhaCliente($_POST['txtSenha']);
        $cliente->setTelefoneCliente($_POST['txtTelefone']);

        $cliente->FotoCliente = $_FILES['image']['name'];

        $arquivo = $_FILES['image']['tmp_name'];

        $cliente->caminhoimagem = "./imagens/paginaInicial/";

        move_uploaded_file($arquivo,
                            $cliente->caminhoimagem . $cliente->FotoCliente);

        $cliente->Cadastrar($cliente->getNomeCliente(), $cliente->getCpfCliente(), $cliente->getRgCliente()
                            ,$cliente->getCepCliente(), $cliente->getEstadoCliente(), $cliente->getCidadeCliente()
                            ,$cliente->getBairroCliente(), $cliente->getRuaCliente(), $cliente->getNumCliente()
                            ,$cliente->getComplCliente(), $cliente->getEmailCliente(), $cliente->getSenhaCliente()
                            ,$cliente->getTelefoneCliente(), $cliente->FotoCliente);


                            
        // $telefoneCliente = new TelefoneCliente();
        // $telefoneCliente->setTelefoneCliente($_POST['txtTelefone']);
        //$telefoneCliente->Cadastrar($telefoneCliente->getTelefoneCliente(), $cliente->Listar().$_SESSION['idCliente']);

        // $telefoneCliente->Cadastrar($cliente->Listar().$_SESSION['idCliente']);

        
    }       
    catch(Exception $e){
        echo "ERRO " . $e->getMessage();
    }

?>