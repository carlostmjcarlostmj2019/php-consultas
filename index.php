<?php

// Array com as consultas disponíveis
$consultas = array(
    array(
        "title" => "Consulta CNPJ",
        "description" => "Realize consultas por Cadastro Nacional da Pessoa Jurídica e obtenha informações detalhadas.",
        "link" => "consulta/cnpj.php",
        "icon" => "fas fa-building"
    ),
    array(
        "title" => "Consulta CEP",
        "description" => "Consulte informações de endereços a partir de um Código de Endereçamento Postal.",
        "link" => "consulta/cep.php",
        "icon" => "fas fa-map-marker-alt"
    ),
    array(
        "title" => "Consulta DDD",
        "description" => "Consulte as Cidades a partir de um Discagem Direta a Distância.",
        "link" => "consulta/ddd.php",
        "icon" => "fas fa-phone-alt"
    ),
    array(
        "title" => "Consulta Banks",
        "description" => "Consulte informações sobre bancos.",
        "link" => "consulta-banks.php",
        "icon" => "fas fa-university"
    ),
    array(
        "title" => "Consulta Corretoras",
        "description" => "Consulte informações sobre corretoras.",
        "link" => "consulta-corretoras.php",
        "icon" => "fas fa-chart-line"
    ),
    array(
        "title" => "Consulta CPTEC",
        "description" => "Consulte informações meteorológicas do Centro de Previsão de Tempo e Estudos Climáticos.",
        "link" => "consulta-cptec.php",
        "icon" => "fas fa-cloud-sun"
    ),
    array(
        "title" => "Consulta Feriados Nacionais",
        "description" => "Consulte os feriados nacionais do Brasil.",
        "link" => "consulta-feriados.php",
        "icon" => "fas fa-calendar-alt"
    ),
    array(
        "title" => "Consulta FIPE",
        "description" => "Consulte informações sobre veículos na tabela FIPE.",
        "link" => "consulta-fipe.php",
        "icon" => "fas fa-car"
    ),
    array(
        "title" => "Consulta IBGE",
        "description" => "Consulte informações estatísticas do Instituto Brasileiro de Geografia e Estatística.",
        "link" => "consulta-ibge.php",
        "icon" => "fas fa-chart-bar"
    ),
    array(
        "title" => "Consulta ISBN",
        "description" => "Consulte informações sobre livros por seu International Standard Book Number.",
        "link" => "consulta-isbn.php",
        "icon" => "fas fa-book"
    ),
    array(
        "title" => "Consulta NCM",
        "description" => "Consulte informações sobre o Nomenclatura Comum do Mercosul.",
        "link" => "consulta-ncm.php",
        "icon" => "fas fa-box"
    ),
    array(
        "title" => "Consulta PIX",
        "description" => "Consulte informações sobre o Sistema de Pagamentos Instantâneos brasileiro.",
        "link" => "consulta-pix.php",
        "icon" => "fas fa-money-check"
    ),
    array(
        "title" => "Consulta Registro.br",
        "description" => "Consulte informações sobre domínios na internet brasileira.",
        "link" => "consulta-registro-br.php",
        "icon" => "fas fa-globe"
    ),
    array(
        "title" => "Consulta Taxas",
        "description" => "Consulte informações sobre taxas diversas.",
        "link" => "consulta-taxas.php",
        "icon" => "fas fa-dollar-sign"
    )
);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas BrasilAPI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            height: 90%;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }
        .container {
            width: 90%;
            height: 90%;
            margin-bottom: 20px;
        }
        .btn-consultar {
            width: 50%;
            position: relative;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Consultas BrasilAPI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user-plus"></i> Cadastro</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($consultas as $consulta) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="<?php echo $consulta['icon']; ?>"></i> <?php echo $consulta['title']; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $consulta['description']; ?></p>
                    </div>
                    <a href="<?php echo $consulta['link']; ?>" class="btn btn-primary btn-consultar"><i class="fas fa-search"></i> Consultar</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 BrasilAPI. Todos os direitos reservados.</p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
