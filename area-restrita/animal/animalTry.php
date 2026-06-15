<?php
    session_start();

    try{
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Animal.php';

        $animal = new Animal();
        $animal->setNomeAnimal($_POST['txtNomeAnimal']);
        $animal->setSexoAnimal($_POST['txtSexoAnimal']);
        $animal->setIdadeAnimal($_POST['txtIdadeAnimal']);
        // $imagem = $_POST['imagem'];
        $animal->setColoracao($_POST['txtCorAnimal']);
        $animal->setPorteAnimal($_POST['txtPorteAnimal']);
        $animal->setEspecieAnimal($_POST['txtEspecieAnimal']);
        $animal->setRacaAnimal($_POST['txtRacaAnimal']);
        
        $animal->FotoAnimal = $_FILES['image']['name'];

        $arquivo = $_FILES['image']['tmp_name'];
        
        $animal->caminhoimagem = "../../imagens/animais/";

        //$imagem->nomeimagem = "5-23.jpg";
        //jpg, png, gif, bmp, psd, jpeg
        
        /*
            "foto.jpg"
            nome = foto.
            extensao = jpeg - pega os 4 últimos caracteres

            nome = 7 . extensao
            nome = 7jpeg
            
        */

        //imagem.jpg => 8.jpg IMG00123.jpg | IMG00123.jpg

        move_uploaded_file($arquivo, 
                        $animal->caminhoimagem . $animal->FotoAnimal);
        
      //  $imagem->caminhoimagem = $imagem->caminhoimagem . $imagem->fotoNoticia;
      //  echo $animal->cadastrar($imagem);

        $animal->CadastrarAnimal($animal->getNomeAnimal(), $animal->getIdadeAnimal(), $animal->getColoracao()
                                ,$animal->getSexoAnimal(), $animal->getEspecieAnimal(), $animal->getRacaAnimal()
                                ,$animal->getPorteAnimal(), $_SESSION['idOng'], $animal->FotoAnimal);

        header('Location: ../ong/areaOng.php');
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

    
?>
