<?php

require_once('../config.php');

if(isset($_POST['ObterCNPJ']))
{
    $api = new API();
    $cnpj = isset($_POST['cnpj']) ? preg_replace("/[^0-9]/", "", $_POST['cnpj']) : "";
    $resultado = $api->obterCNPJ($cnpj);
	
}

?>
<!DOCTYPE html>
+<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CNPJ - BrasilAPI</title>
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        <a class="navbar-brand" href="#">Consulta de CNPJ - BrasilAPI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-building"></i> Consulta CNPJ</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="inputCNPJ">CNPJ</label>
                                <input type="text" class="form-control" id="inputCNPJ" name="cnpj"
                                    placeholder="Digite o CNPJ" required>
                            </div>
                            <button type="submit" name="ObterCNPJ" class="btn btn-primary btn-consultar"><i
                                    class="fas fa-search"></i> Consultar</button>
                        </form>
                    </div>
                    <?php if(isset($resultado)) { ?>
                    <div class="card-footer">
                        <div class="resultado">
                            <h5>Resultado da Consulta:</h5>
                            <?php if (!empty($resultado['cnpj'])) { ?>
                            <p><strong>CNPJ:</strong> <?php echo Formatar::cnpj($resultado['cnpj']); ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['razao_social'])) { ?>
                            <p><strong>Razão Social:</strong> <?php echo $resultado['razao_social']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['nome_fantasia'])) { ?>
                            <p><strong>Nome Fantasia:</strong> <?php echo $resultado['nome_fantasia']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['descricao_situacao_cadastral'])) { ?>
                            <p><strong>Situação Cadastral:</strong>
                                <?php echo $resultado['descricao_situacao_cadastral']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['data_situacao_cadastral'])) { ?>
                            <p><strong>Data Situação Cadastral:</strong>
                                <?php echo Formatar::data($resultado['data_situacao_cadastral']); ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['motivo_situacao_cadastral'])) { ?>
                            <p><strong>Motivo Situação Cadastral:</strong>
                                <?php echo $resultado['motivo_situacao_cadastral']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['codigo_natureza_juridica'])) { ?>
                            <p><strong>Código Natureza Jurídica:</strong>
                                <?php echo $resultado['codigo_natureza_juridica']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['data_inicio_atividade'])) { ?>
                            <p><strong>Data Início Atividade:</strong>
                                <?php echo Formatar::data($resultado['data_inicio_atividade']); ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['cnae_fiscal'])) { ?>
                            <p><strong>CNAE Fiscal:</strong> <?php echo $resultado['cnae_fiscal']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['cnae_fiscal_descricao'])) { ?>
                            <p><strong>Descrição CNAE Fiscal:</strong>
                                <?php echo $resultado['cnae_fiscal_descricao']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['descricao_tipo_de_logradouro']) || !empty($resultado['logradouro']) || !empty($resultado['numero']) || !empty($resultado['complemento']) || !empty($resultado['bairro']) || !empty($resultado['cep']) || !empty($resultado['uf'])) { ?>
                            <p><strong>Endereço:</strong>
                                <?php echo $resultado['descricao_tipo_de_logradouro'] . " " . $resultado['logradouro'] . ", " . $resultado['numero'] . " - " . $resultado['complemento'] . ", " . $resultado['bairro'] . ", " . Formatar::cep($resultado['cep']) . " - " . $resultado['uf']; ?>
                            </p>
                            <?php } ?>
                            <?php if (!empty($resultado['codigo_municipio'])) { ?>
                            <p><strong>Código Município:</strong> <?php echo $resultado['codigo_municipio']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['municipio'])) { ?>
                            <p><strong>Município:</strong> <?php echo $resultado['municipio']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['ddd_telefone_1'])) { ?>
                            <p><strong>DDD Telefone 1:</strong>
                                <?php echo Formatar::Celular($resultado['ddd_telefone_1']); ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['ddd_telefone_2'])) { ?>
                            <p><strong>DDD Telefone 2:</strong>
                                <?php echo $resultado['ddd_telefone_2']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['ddd_fax'])) { ?>
                            <p><strong>DDD Fax:</strong> <?php echo Formatar::ddd($resultado['ddd_fax']); ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['qualificacao_do_responsavel'])) { ?>
                            <p><strong>Qualificação do Responsável:</strong>
                                <?php echo $resultado['qualificacao_do_responsavel']; ?></p>
                            <?php } ?>

                            <?php if (!empty($resultado['capital_social'])){ ?>
                            <p><strong>Capital Social:</strong> <?php echo $resultado['capital_social']; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['descricao_porte'])) { ?>
                            <p><strong>Porte:</strong> <?php echo $resultado['descricao_porte']; ?></p>
                            <?php } ?>

                            <?php if (!empty($resultado['opcao_pelo_simples'])) { ?>
                            <p><strong>Opção pelo Simples:</strong>
                                <?php echo $resultado['opcao_pelo_simples'] ? 'Sim' : 'Não'; ?></p>
                            <?php } ?>

                            <?php if (!empty($resultado['data_opcao_pelo_simples'])) { ?>
                            <p><strong>Data Opção pelo Simples:</strong>
                                <?php echo Formatar::data($resultado['data_opcao_pelo_simples']); ?></p>
                            <?php } ?>

                            <?php if (!empty($resultado['data_exclusao_do_simples'])) { ?>
                            <p><strong>Data Exclusão do Simples:</strong>
                                <?php echo $resultado['data_exclusao_do_simples']; ?></p>
                            <?php } ?>

                            <?php if (!empty($resultado['opcao_pelo_mei'])) { ?>
                            <p><strong>Opção pelo MEI:</strong>
                                <?php echo $resultado['opcao_pelo_mei'] ? 'Sim' : 'Não'; ?></p>
                            <?php } ?>
                            <?php if (!empty($resultado['situacao_especial'])) { ?>

                            <p><strong>Situação Especial:</strong> <?php echo $resultado['situacao_especial']; ?></p>
                            <?php } ?>


                            <?php if (!empty($resultado['data_situacao_especial'])) { ?>

                            <p><strong>Data Situação Especial:</strong>
                                <?php echo $resultado['data_situacao_especial']; ?></p>

                            <?php } ?>




                            <?php if(isset($resultado['cnaes_secundarios']) && !empty($resultado['cnaes_secundarios'])) { ?>
                                <p><strong>CNAEs Secundários:</strong></p>
                                <ul>
                                    <?php foreach($resultado['cnaes_secundarios'] as $cnae) { ?>
                                        <?php if(!empty($cnae['codigo']) && !empty($cnae['descricao'])) { ?>
                                            <li>
                                                <p><strong>Código:</strong> <?php echo $cnae['codigo']; ?></p>
                                                <p><strong>Descrição:</strong> <?php echo $cnae['descricao']; ?></p>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            <?php } ?>

                            <?php if (!empty($resultado['qsa'])) { ?>

                            <?php if(isset($resultado['qsa'])) { ?>
                            <p><strong>Quadro de Sócios e Administradores:</strong></p>
                            <ul>
                            <?php foreach($resultado['qsa'] as $qsa) { ?>
    <li>
        <p><strong>Identificador de Sócio:</strong> <?php echo $qsa['identificador_de_socio']; ?></p>
        <p><strong>Nome Sócio:</strong> <?php echo $qsa['nome_socio']; ?></p>
        <p><strong>CNPJ/CPF do Sócio:</strong> <?php echo $qsa['cnpj_cpf_do_socio']; ?></p>
        <p><strong>Qualificação do Sócio:</strong> <?php echo $qsa['codigo_qualificacao_socio']; ?></p>
        <?php if (isset($qsa['percentual_capital_social'])) { ?>
            <p><strong>Percentual Capital Social:</strong> <?php echo $qsa['percentual_capital_social']; ?></p>
        <?php } ?>
        <p><strong>Data Entrada Sociedade:</strong> <?php echo Formatar::data($qsa['data_entrada_sociedade']); ?></p>
    </li>
<?php } ?>


                            </ul>
                            <?php } ?>
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
