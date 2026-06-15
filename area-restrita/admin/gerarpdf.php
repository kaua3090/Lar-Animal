<?php

use Dompdf\Dompdf;

require_once '../../classes/Conexao.php';
$conexao = Conexao::pegarConexao();

require_once '../../dompdf/autoload.inc.php';
require_once '../../global.php';
require_once '../../classes/Cliente.php';

// Ong
$array =  Array();
$querySelect = ("
                select COUNT(idOng) 'ong' from tbong 
                ");
$stmt = $conexao->query($querySelect);
$stmt->execute();

$i = 0;

while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $array[$i]= $row['ong'];

    $i++;
}

//Cliente
$array2 =  Array();
$querySelect2 = ("
                select COUNT(idCliente) 'cliente' from tbcliente 
                ");
$stmt2 = $conexao->query($querySelect2);
$stmt2->execute();

$i = 0;

while($row2 = $stmt2->fetch(PDO::FETCH_BOTH)){
    $array2[$i]= $row2['cliente'];

    $i++;
}

//Animais
$arrayAnimal =  Array();
$querySelectAnimal = ("
                select COUNT(idAnimal) 'animal' from tbanimal
                ");
$stmtAnimal = $conexao->query($querySelectAnimal);
$stmtAnimal->execute();

$i = 0;

while($rowAnimal = $stmtAnimal->fetch(PDO::FETCH_BOTH)){
    $arrayAnimal[$i]= $rowAnimal['animal'];

    $i++;
}

//Cachorro
$arrayCachorro =  Array();
$querySelectCachorro = ("
                select COUNT(idAnimal) 'cachorro' from tbanimal where idEspecieAnimal = 1 
                ");
$stmtCachorro = $conexao->query($querySelectCachorro);
$stmtCachorro->execute();

$i = 0;

while($rowCachorro = $stmtCachorro->fetch(PDO::FETCH_BOTH)){
    $arrayCachorro[$i]= $rowCachorro['cachorro'];

    $i++;
}

//Gato
$arrayGato =  Array();
$querySelectGato = ("
                select COUNT(idAnimal) 'gato' from tbanimal where idEspecieAnimal = 2 
                ");
$stmtGato = $conexao->query($querySelectGato);
$stmtGato->execute();

$i = 0;

while($rowGato = $stmtGato->fetch(PDO::FETCH_BOTH)){
    $arrayGato[$i]= $rowGato['gato'];

    $i++;
}

//Animais Adotados
$arrayAdotados =  Array();
$querySelectAdotados = ("
                select COUNT(idRegistroAdocao) 'Adotados' from tbregistroadocao
                ");
$stmtAdotados = $conexao->query($querySelectAdotados);
$stmtAdotados->execute();

$i = 0;

while($rowAdotados = $stmtAdotados->fetch(PDO::FETCH_BOTH)){
    $arrayAdotados[$i]= $rowAdotados['Adotados'];

    $i++;
}

$dompdf = new Dompdf();

$dompdf->loadHtml("
<p style='text-align:center; color: #5eaa73; font-size: 50px;'>Lar Animal</p>

<p style='text-align:center; font-size:22px ;margin-top: -2rem;'>Administrador</p>
    
<div>
    <h2 style='border: 1px solid black; padding: 0.5rem;'>Ong's Cadastradas</h2>
    <h3 style='font-weight: normal;'>Qtde. de Ongs: $array[0] </h3>
    <hr>
</div>

<div>
    <h2 style='border: 1px solid black; padding: 0.5rem;'>Clientes Cadastrados</h2>
    <h3 style='font-weight: normal;'>Qtde. de Clientes: $array2[0] </h3>
    <hr>
</div>

<div>
    <h2 style='border: 1px solid black; padding: 0.5rem;'>Animais Cadastrados</h2>
    <h3 style='font-weight: normal;'>Total de Animais: $arrayAnimal[0] </h3>
    <h3 style='font-weight: normal;'>Qtde. de Cachorros: $arrayCachorro[0] </h3>
    <h3 style='font-weight: normal;'>Qtde. de Gatos:  $arrayGato[0]</h3>
    <hr>
</div>

<div>
    <h2 style='border: 1px solid black; padding: 0.5rem;'>Animais Adotados</h2>
    <h3 style='font-weight: normal;'>Qtde. de Animais: $arrayAdotados[0] </h3>
    <hr>
</div>

");

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "dados_graficos.pdf",
    array(
        "Attachment" => true
    )
);

?>