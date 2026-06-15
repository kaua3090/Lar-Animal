<?php

require_once '../dompdf/autoload.inc.php';
require_once 'global.php';

require_once '../classes/Conexao.php';
$conexao = Conexao::pegarConexao();

use Dompdf\Dompdf;

session_start();

$dia = DATE('d');
$mes = DATE('m')+1;
$ano = DATE('Y');

$nomeAnimal = $_POST['txtNomeAnimal'];
$idadeAnimal = $_POST['txtIdadeAnimal'];
$corAnimal = $_POST['txtCorAnimal'];
$sexoAnimal = $_POST['txtSexoAnimal'];
$porteAnimal = $_POST['txtPorteAnimal'];
$racaAnimal = $_POST['txtRacaAnimal'];
$especieAnimal = $_POST['txtEspecieAnimal'];

$nomeCliente = $_SESSION['nomeCliente'];
$cpfCliente = $_SESSION['cpfCliente'];
$rgCliente = $_SESSION['rgCliente'];
$cepCliente = $_SESSION['cepCliente'];

$OngNome = $_POST['txtNomeOng'];
$OngTelefone = $_POST['txtTelefoneOng'];
$OngCep = $_POST['txtCepOng'];
$OngRua = $_POST['txtRuaOng'];
$OngNum = $_POST['txtNumOng'];
$OngCidade = $_POST['txtCidadeOng'];
$OngBairro = $_POST['txtBairroOng'];
$OngEstado = $_POST['txtEstadoOng'];

$dompdf = new DOMPDF();

$dompdf->loadHtml("
<p style='text-align:center; color: #5eaa73; font-size: 35px;'>Lar Animal</p>

<p style='text-align:center; font-size: 16px; margin-top: -2rem;'>Compareça na <b>$OngNome</b>, em até: $dia/$mes/$ano</p>

<div>
    <h3 style='border: 1px solid black; padding: 0.3rem; font-weight: while;'><b>Seus Dados</b>: $nomeCliente</h3>
    <h4 style='font-weight: normal;'><b><u>CPF</u>:</b> $cpfCliente  </h4>
    <h4 style='font-weight: normal;'><b><u>RG</u>:</b> $rgCliente  </h4>
    <h4 style='font-weight: normal;'><b><u>CEP</u>:</b> $cepCliente  </h4>
</div>

<div>
    <h3 style='border: 1px solid black; padding: 0.3rem; font-weight: while;'><b>Dados do Animal</b>: $nomeAnimal</h3>
    <h4 style='font-weight: normal;'><b><u>Idade</u>:</b> $idadeAnimal anos </h4>
    <h4 style='font-weight: normal;'><b><u>Coloração</u>:</b> $corAnimal </h4>
    <h4 style='font-weight: normal;'><b><u>Espécie</u>:</b> $especieAnimal  </h4>
    <h4 style='font-weight: normal;'><b><u>Raça</u>:</b> $racaAnimal  </h4>
    <h4 style='font-weight: normal;'><b><u>Sexo</u>:</b> $sexoAnimal  </h4>
    <hr>
</div>

    
<div>
    <h3 style='border: 1px solid black; padding: 0.3rem; font-weight: while;'><b>ONG</b>: $OngNome</h3>
    <h4 style='font-weight: normal;'><b><u>Telefone</u>:</b> $OngTelefone </h4>
    <h4 style='font-weight: normal;'><b><u>CEP</u>:</b> $OngCep </h4>
    <h4 style='font-weight: normal;'><b><u>Rua</u>:</b> $OngRua </h4>
    <h4 style='font-weight: normal;'><b><u>N°</u>:</b> $OngNum </h4>
    <h4 style='font-weight: normal;'><b><u>Cidade</u>:</b> $OngCidade </h4>
    <h4 style='font-weight: normal;'><b><u>Bairro</u>:</b> $OngBairro </h4>
    <h4 style='font-weight: normal;'><b><u>Estado</u>:</b> $OngEstado </h4>

    <hr>

<p>Observação: compareça com esse documento no dia!</p>    
</div>



");

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "Documento.pdf",
    array(
        "Attachment" => false
    )
);

?>