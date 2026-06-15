<?php 
require_once '../../classes/Cliente.php'; 
require_once '../../classes/Ong.php' ;

?>
    
<?php

try {
    $cliente = new Cliente();
    $listacliente = $cliente->Grafico();

    $ong = new Ong();
    $listaOng = $ong->GraficoOng();

    $animal = new Animal();
    $listaAnimal = $animal->GraficoAnimal();
    $listaAnimal2 = $animal->GraficoAnimal2();
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Area do Administrador</title>
</head>

<body>

    <?php
    $cliente = $listacliente[0] ?? 0;

    $ong = $listaOng[0] ?? 0;

    $cachorro = $listaAnimal[0] ?? 0;
    $gato = $listaAnimal[1] ?? 0;

    $totalAnimal = $listaAnimal2[0] ?? 0;
    ?>


    </div>

    <div class="parent">

        <div class="div1">
            <center>
                <img src="../../imagens/paginaInicial/Lar-Animal.png" alt="" width="200px">
                <hr width="60%">
                <h1 class="title">Bem-vindo</h1>
                <img src="../../imagens/admin/avatar.png" alt="" class="foto-perfil">
                <h1 style="font-size: 45px; color: whitesmoke; ">ADMIN</h1>

                <div class="grid-icons">
                    <a href="admin.php">
                        <div class="icons">
                            <img src="../../imagens/admin/grafico-icon.png" alt="">
                            <label>Gráficos</label>
                        </div>
                    </a>
                    <a href="dadosGerais.php">
                        <div class="icons">
                            <img src="../../imagens/admin/people-icon.png" alt="">
                            <label>Dados Gerais</label>
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

        </div>


        <div class="div2">
            <div class="nomes">
                <h1>Gráficos</h1>
            </div>

            <form action="">
                <center>
                    <a href="gerarpdf.php">
                        <input type="button" value="imprimir dados" class="imprimir">
                    </a>
                </center>
                <!-- <div class="conteudo"> -->

                <div id="graficos">
                    <div class="item item-1">
                        <canvas id="grafico1"></canvas>
                    </div>
                    <div class="item item-2">
                        <canvas id="grafico2"></canvas>
                    </div>

                    <div class="item item-3">
                        <canvas id="grafico3"></canvas>
                    </div>
                </div>
                <!-- </div> -->
            </form>
        </div>
    </div>



    <!-- JAVASCRIPT UTILIZADO -->





    <!-- Importa a biblioteca Chart.js -->
    <!-- Sem isso, nada funciona: o objeto Chart simplesmente não existe -->
    <script src="../../js/chart.js"></script>


    <!-- Grafico 1 -->
    <script>
        const labels = [
            'Clientes',
            'ONGs',
            'Animais Adotados',

        ];

        const data = {
            labels: labels,

            datasets: [{
                label: 'Total cadastrados',

                data: [
                    <?php echo (int)$cliente ?>,
                    <?php echo (int)$ong ?>,
                    <?php echo (int)$totalAnimal ?>
                ],

                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)'
                ],

                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)'
                ],

                borderWidth: 1
            }]
        };

        new Chart(document.getElementById('grafico1'), {
            type: 'bar',

            data: data,

            options: {
                responsive: true,
                maintainAspectRatio: false
            },

            plugins: {
                legend: {
                    display: true
                },

                title: {
                    display: true,
                    text: 'Dados do Sistema'
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        });

        new Chart(document.getElementById('grafico2'), {

            type: 'bar',

            options: {
                responsive: true,
                maintainAspectRatio: false
            },

            data: {

                labels: ['Clientes', 'ONGs', 'Cães', 'Gatos'],

                datasets: [{
                    label: 'Total cadastrados',

                    data: [
                        <?php echo (int)$cliente ?>,
                        <?php echo (int)$ong ?>,
                        <?php echo (int)$cachorro ?>,
                        <?php echo (int)$gato ?>
                    ],

                    backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#ffce56',
                        '#4bc0c0'
                    ],

                    borderColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#ffce56',
                        '#4bc0c0'
                    ],

                    borderWidth: 1,

                    borderRadius: 8,

                    barThickness: 25
                }]
            },

            options: {

                indexAxis: 'y',

                responsive: true,

                plugins: {

                    legend: {
                        display: false
                    },

                    title: {
                        display: true,
                        text: 'Dados do Sistema'
                    }
                },

                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });


        new Chart(document.getElementById('grafico3'), {
            type: 'pie',
            options: {
                responsive: true,
                maintainAspectRatio: false
            },
            data: {
                labels: ['Cães', 'Gatos'],

                datasets: [{
                    data: [
                        <?php echo (int)$cachorro ?>,
                        <?php echo (int)$gato ?>
                    ],

                    backgroundColor: ['#36a2eb', '#ff6384']
                }]
            }
        });
        
    </script>




</body>

</html>