<?php
session_start();

require_once "classes/Cliente.php";
require_once "classes/Ong.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

// ADMIN
if ($email === 'adm@laranimal.com' && $senha === 'adm2026') {
    header('Location: ./area-restrita/admin/admin.php');
    exit;
}

$cliente = new Cliente();
$ong = new Ong();

$usuario = null;
$tipo = null;

// =========================
// LOGIN CLIENTE
// =========================

$dadosCliente = $cliente->Selecionar($email);


if (
    $dadosCliente &&
    (
        password_verify($senha, $dadosCliente['senhaCliente']) ||
        $senha === $dadosCliente['senhaCliente']
    )
) {
    $usuario = $dadosCliente;
    $tipo = 'cliente';
}

// =========================
// LOGIN ONG
// =========================

if (!$usuario) {

    $dadosOng = $ong->Selecionar($email);


    if (
        $dadosOng &&
        (
            password_verify($senha, $dadosOng['senhaOng']) ||
            $senha === $dadosOng['senhaOng']
        )
    ) {
        $usuario = $dadosOng;
        $tipo = 'ong';
    }
}

// =========================
// USUÁRIO NÃO ENCONTRADO
// =========================

if (!$usuario) {
    header('Location: login.php?erro=senha');
    exit;
}

// =========================
// SESSÃO CLIENTE
// =========================

if ($tipo === 'cliente') {

    $_SESSION['idCliente'] = $usuario['idCliente'];
    $_SESSION['nomeCliente'] = $usuario['nomeCliente'];

    $_SESSION['cpfCliente'] = $usuario['cpfCliente'];
    $_SESSION['rgCliente'] = $usuario['rgCliente'];
    $_SESSION['emailCliente'] = $usuario['emailCliente'];
    $_SESSION['telefoneCliente'] = $usuario['telefoneCliente'];

    $_SESSION['cepCliente'] = $usuario['cepCliente'];
    $_SESSION['ruaCliente'] = $usuario['ruaCliente'];
    $_SESSION['numCliente'] = $usuario['numCliente'];
    $_SESSION['complementoCliente'] = $usuario['complementoCliente'];
    $_SESSION['bairroCliente'] = $usuario['bairroCliente'];
    $_SESSION['cidadeCliente'] = $usuario['cidadeCliente'];
    $_SESSION['estadoCliente'] = $usuario['estadoCliente'];

    $_SESSION['fotoCliente'] = $usuario['fotoCliente'] ?? 'default.png';

    header('Location: paginaInicial.php');
    exit;
}

// =========================
// SESSÃO ONG
// =========================

if ($tipo === 'ong') {

    $_SESSION['idOng'] = $usuario['idOng'];
    $_SESSION['nomeOng'] = $usuario['nomeOng'];
    $_SESSION['telefoneOng'] = $usuario['telefoneOng'];
    $_SESSION['loginOng'] = $usuario['loginOng'];

    $_SESSION['cepOng'] = $usuario['cepOng'];
    $_SESSION['logradouroOng'] = $usuario['logradouroOng'];
    $_SESSION['bairroOng'] = $usuario['bairroOng'];
    $_SESSION['cidadeOng'] = $usuario['cidadeOng'];
    $_SESSION['estadoOng'] = $usuario['estadoOng'];

    $_SESSION['numOng'] = $usuario['numOng'];
    $_SESSION['complementoOng'] = $usuario['complementoOng'];

    $_SESSION['fotoOng'] = $usuario['fotoOng'] ?? 'default.png';

    header('Location: area-restrita/ong/areaOng.php');
    exit;
}