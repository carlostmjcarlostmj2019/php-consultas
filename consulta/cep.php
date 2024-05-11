<?php

require_once('../config.php');

if(isset($_POST['ObterCEP']))
{
    $api = new API();
    $cep = isset($_POST['cep']) ? preg_replace("/[^0-9]/", "", $_POST['cep']) : "";
    $resultado = $api->obterCEP($cep);
	
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP - BrasilAPI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 80px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }
        .btn-consultar {
            width: 100%;
        }
        .resultado {
            margin-top: 20px;
            padding: 20px;
        }
        .resultado h5 {
            margin-bottom: 15px;
            color: #007bff;
        }
        .resultado p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Consulta de CEP - BrasilAPI</a>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-building"></i> Consulta CEP</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="inputCEP">CEP</label>
                            <input type="text" class="form-control" id="inputCEP" name="cep" placeholder="Digite o CEP" required>
                        </div>
                        <button type="submit" name="ObterCEP" class="btn btn-primary btn-consultar"><i class="fas fa-search"></i> Consultar</button>
                    </form>
                </div>
				 <?php if(isset($resultado)) { ?>
                    <div class="card-footer">
    <div class="resultado">
        <h5 class="mb-4">Resultado da Consulta:</h5>
        <?php if(isset($resultado['cep'])) { ?>
            <p><strong>CEP:</strong> <?php echo Formatar::cep($resultado['cep']); ?></p>
        <?php } ?>
        <?php if(isset($resultado['state'])) { ?>
            <p><strong>Estado:</strong> <?php echo $resultado['state']; ?></p>
        <?php } ?>
        <?php if(isset($resultado['city'])) { ?>
            <p><strong>Cidade:</strong> <?php echo $resultado['city']; ?></p>
        <?php } ?>
        <?php if(isset($resultado['neighborhood'])) { ?>
            <p><strong>Região:</strong> <?php echo $resultado['neighborhood']; ?></p>
        <?php } ?>
        <?php if(isset($resultado['street'])) { ?>
            <p><strong>Rua:</strong> <?php echo $resultado['street']; ?></p>
        <?php } ?>
        <?php if(isset($resultado['service'])) { ?>
            <p><strong>Serviço:</strong> <?php echo $resultado['service']; ?></p>
        <?php } ?>
        <!-- Adicione mais campos conforme necessário -->
    </div>
</div>

				<?php } ?>

            </div>
        </div>
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
