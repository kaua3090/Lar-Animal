<?php

try{

        require_once '../../classes/Conexao.php';
        require_once '../../classes/Ong.php';

        $ong = new Ong();
        
        $ong->setNomeOng($_POST['txtNome']);
        $ong->setCepOng($_POST['txtCep']);
        $ong->setEstadoOng($_POST['txtEstado']);
        $ong->setCidadeOng($_POST['txtCidade']);
        $ong->setBairroOng($_POST['txtBairro']);
        $ong->setLogradouroOng($_POST['txtRua']);
        $ong->setNumOng($_POST['txtNum']);
        $ong->setComplOng($_POST['txtComplemento']);
        $ong->setLoginOng($_POST['txtEmail']);
        $ong->setSenhaOng($_POST['txtSenha']);
        $ong->setTelefoneOng($_POST['txtTelefone']);

        $ong->FotoOng = $_FILES['image']['name'];

        $arquivo = $_FILES['image']['tmp_name'];
        
        $ong->caminhoimagem = "../../imagens/ong/";

        move_uploaded_file($arquivo,
                            $ong->caminhoimagem . $ong->FotoOng);
        
        echo $ong->Cadastrar($ong->getNomeOng(), $ong->getCepOng(), $ong->getEstadoOng(), 
                             $ong->getCidadeOng(), $ong->getBairroOng(), $ong->getLogradouroOng(), $ong->getNumOng(),
                             $ong->getComplOng(), $ong->getLoginOng(), $ong->getSenhaOng(), $ong->getTelefoneOng(), $ong->FotoOng);

        header('Location: ../../login.php');
        exit;
    }
    catch(Exception $e){
        echo "ERRO: " . $e->getMessage();
    }

    
?>