<?php
session_start();
include('View/autentication/login-invalid.php');

include_once('./db/db-conection.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>System Fisio - Adicionar Paciente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">


    <!-- ESTYLE PARA ESTILIZAR O PRELOAD -->
    <link rel="stylesheet" href="assets/css/style-preload.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body onload="loading()">

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <div class="main-wrapper">

        <div class="header-outer">
            <div class="header">
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
                <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                    <img src="assets/img/sidebar/icon-21.png" alt="">
                </a>



                <ul class="nav user-menu float-right">
                    <li class="nav-item dropdown has-arrow">
                        <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                            <span class="user-img"><img class="rounded-circle" src="assets/img/user-06.jpg" width="30" alt="Admin">
                                <span class="status online"></span></span>
                            <span><?php echo $_SESSION['usuario']; ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                            <a class="dropdown-item" href="edit-profile.html">Editar Perfil</a>
                            <a class="dropdown-item" href="settings.html">Configurações</a>
                            <a class="dropdown-item" href="View/autentication/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mobile-user-menu float-right">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                        <a class="dropdown-item" href="edit-profile.html">Editar Perfil</a>
                        <a class="dropdown-item" href="settings.html">Configurações</a>
                        <a class="dropdown-item" href="View/autentication/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <div class="header-left">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo1.png" width="50" height="50" alt="">
                            <span class="text-success" style="font-family: sans-serif pridi regular;">System Fisio</span>
                        </a>
                    </div>
                    <ul class="sidebar-ul">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="index.php"><img src="assets/img/sidebar/icon-6.png" alt="icon"><span>Agenda</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span> Pacientes </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="all-pacientes.php"><span>Todos os Pacientes</span></a></li>
                                <li><a href="add-paciente.php"><span>Adicionar Paciente</span></a></li>

                            </ul>
                        </li>

                        <li class="menu-title">RELATÓRIOS</li>
                        <li class="active">
                            <a href="relatorio-atendimentos.php"><img src="assets/img/sidebar/icon-12.png" alt="icon">
                                <span> dos atendimentos</span></a>
                        </li>


                        <li class="menu-title">Configuração geral</li>
                        <li>
                            <a href="settings.html"><img src="assets/img/sidebar/icon-14.png" alt="icon"> <span>Configurações</span></a>
                        </li>

                        <li class="menu-title"><span>Planos e equipes</span></li>
                        <li>
                            <a href="users.html"> <img src="assets/img/sidebar/icon-4.png" alt="icon"><span>Usuários</span></a>
                        </li>
                        <li>
                            <a href="users.html"> <img src="assets/img/sidebar/icon-4.png" alt="icon"><span>Profissionais</span></a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <h5 class="text-uppercase mb-0 mt-0 page-title">Relatório de Atendimento</h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <ul class="breadcrumb float-right p-0 mb-0">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><span>Relatório de atendimentos</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-page">
                    <div class="row filter-row">
                        <div class="col-sm-2 col-md-1">
                            <div class="form-group form-focus select-focus">
                                <input class="form-control" type="number" name="" id="" min="0" max="6">
                                <label class="focus-label">Nº</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2">
                            <div class="form-group form-focus select-focus">
                                <select class="select form-control">
                                    <option>Selecione um período</option>                                   
                                    <option>Trimestre</option>                                   
                                </select>
                                <label class="focus-label">Por período</label>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus select-focus">
                                <input type="month" class=" form-control">
                                <label class="focus-label">Por Mês</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">


                            <div class="form-group form-focus select-focus">
                                <select class="select form-control">
                                    <option>Selecione um ano</option>
                                    <?php
                                    for ($cont = 2022; $cont < 2051; $cont++) { ?>
                                        <option><?php echo $cont; ?></option>
                                    <?php }
                                    ?>


                                </select>
                                <label class="focus-label">Por ano</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <a href="#" class="btn btn-search rounded btn-block mb-3"> Filtra </a>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-5 col-4">
                        </div>
                        <div class="col-sm-7 col-8 text-right ">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-white">EXCEL</button>
                                <button class="btn btn-white">PDF</button>
                                <button class="btn btn-white"><i class="fas fa-print fa-lg"></i> Imprimir</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead class="thead-light">

                                        <tr>
                                            <td colspan="13" class="text-center p-1 " scope="col" style="font-size: 16px; ">Ano de <span> <?php echo date("Y"); ?> </span></td>
                                        </tr>
                                        <tr>
                                            <th>TIPOS</th>
                                            <th>JAN</th>
                                            <th>FEV </th>
                                            <th>MAR </th>
                                            <th>ABR </th>
                                            <th>MAI</th>
                                            <th>JUN</th>
                                            <th>JUL</th>
                                            <th>AGO </th>
                                            <th>SET</th>
                                            <th>OUT </th>
                                            <th>NOV</th>
                                            <th>DEZ</th>

                                            <!-- <th class="text-right">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- BUSCAR OS VALORES DO RELATORIO  DA TABELA TIPO_RECURSO_TRATAMENTO-->
                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===

                                        // $queryAtendimentos = "SELECT * FROM trt JOIN avaliacao_paciente ap on ap.cod_avaliacao = trt.ordem_avaliacao join agendamento_paciente apc on apc.ordem_paciente = ap.ordem_paciente join dias_semana_paciente dsp on dsp.ordem_agendamento = apc.cod_agendamento";

                                        $querySelectRecPaciente = "SELECT * FROM tipo_recurso_tratamento   ";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_recurso'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data_cad_tipo_recurso'];

                                                // echo $ordemRecurso;

                                                //PEGAR SOMENTE O ANO QUE O PACIENTE FOI CADASTRADO O RECURSO DO PACIENTE
                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                // PAGAR SOMENTE O MES
                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;                                              


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            }
                                        }
                                        ?>




                                        <tr>
                                            <td>FISIOTERAPIA </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                            <!-- <span class="badge badge-success-border">Paid</span> -->

                                        </tr>

                                        <!-- BUSCAR OS VALORES DO RELATORIO  DA TABELA TIPO_SITUACAO_TRATAMENTO-->
                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT * FROM tipo_situacao_paciente  ";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_situacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data'];

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td>HIPERTENSOS </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>

                                       
                                         <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT * FROM tipo_situacao_paciente ";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_situacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data'];

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td>DIABETICOS </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>


                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT * FROM tipo_situacao_paciente ";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_situacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data'];

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '3' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            }
                                        }
                                        ?>



                                        <tr>
                                            <td>IDOSOS </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>

                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT * FROM tipo_situacao_paciente ";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_situacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data'];

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '5' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            }
                                        }
                                        ?>



                                        <tr>
                                            <td>GESTANTES </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>


                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT tcp.ordem_classificacao, tcp.data_cad_tipo_classificacao, p.data_nasc_paciente FROM  tipo_classificacao_paciente tcp join avaliacao_paciente ap on ap.cod_avaliacao = tcp.ordem_avaliacao join pacientes p on p.cod_paciente = ap.ordem_paciente";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_classificacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data_cad_tipo_classificacao'];
                                                $dataNascPaciente  = $row_cont_rec_paciente['data_nasc_paciente'];

                                                $date = new DateTime($dataNascPaciente);
						                        $interval = $date->diff(new DateTime(date('Y-m-d')));
						                        $idadePaciente =  $interval->format('%Y');

                                                // echo $idadePaciente;

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;  

                                                
                                                //SO CONTAR SE O PACIENTE FOR INFANTIL 

                                             if($idadePaciente <= 5){                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }

                                             }
                                            }

                                        }
                                        ?>

                                        <tr>
                                            <td>NEUROLOGICO INFATIL </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>

                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT tcp.ordem_classificacao, tcp.data_cad_tipo_classificacao, p.data_nasc_paciente FROM  tipo_classificacao_paciente tcp join avaliacao_paciente ap on ap.cod_avaliacao = tcp.ordem_avaliacao join pacientes p on p.cod_paciente = ap.ordem_paciente";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                                $ordemRecurso = $row_cont_rec_paciente['ordem_classificacao'];
                                                $dataCadastroRec  = $row_cont_rec_paciente['data_cad_tipo_classificacao'];
                                                $dataNascPaciente  = $row_cont_rec_paciente['data_nasc_paciente'];

                                                $date = new DateTime($dataNascPaciente);
						                        $interval = $date->diff(new DateTime(date('Y-m-d')));
						                        $idadePaciente =  $interval->format('%Y');

                                                // echo $idadePaciente;

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;  

                                                
                                                //SO CONTAR SE O PACIENTE FOR INFANTIL 

                                             if($idadePaciente > 18 ){                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '1' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }

                                             }
                                            }

                                        }
                                        ?>

                                        <tr>
                                            <td>NEUROLOGICO ADULTO </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>


                                        <?php
                                        //== QUERY DE TODOS OS DADOS DO PACIENTE ===
                                        $querySelectRecPaciente = "SELECT p.data_cad_paciente,  p.data_nasc_paciente FROM  pacientes p";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                               
                                                $dataCadastroRec  = $row_cont_rec_paciente['data_cad_paciente'];
                                                $dataNascPaciente  = $row_cont_rec_paciente['data_nasc_paciente'];

                                                $date = new DateTime($dataNascPaciente);
						                        $interval = $date->diff(new DateTime(date('Y-m-d')));
						                        $idadePaciente =  $interval->format('%Y');

                                                 echo $idadePaciente;

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;  

                                                
                                                //SO CONTAR SE O PACIENTE FOR INFANTIL 

                                             if($idadePaciente >= 0 AND $idadePaciente <= 5 ){                                           


                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                if ( $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ( $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ( $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ( $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ( $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ( $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ( $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ( $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ( $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ( $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ( $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ( $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }

                                             }
                                            }

                                        }
                                        ?>

                                        <tr>
                                            <td>CRIÂNÇAS DE 0 A 5 ANOS </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>


                                         <?php
                                        //== QUERY DE TODOS OS DADOS DO paciente Ortopedicos PACIENTE OTEPEDICO ===
                                        $querySelectRecPaciente = "SELECT tcp.ordem_classificacao, tcp.data_cad_tipo_classificacao, p.data_nasc_paciente FROM  tipo_classificacao_paciente tcp join avaliacao_paciente ap on ap.cod_avaliacao = tcp.ordem_avaliacao join pacientes p on p.cod_paciente = ap.ordem_paciente";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);

                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {

                                               
                                                $ordemRecurso  = $row_cont_rec_paciente['ordem_classificacao'];
                                                $dataNascPaciente  = $row_cont_rec_paciente['data_nasc_paciente'];

                                                $date = new DateTime($dataNascPaciente);
						                        $interval = $date->diff(new DateTime(date('Y-m-d')));
						                        $idadePaciente =  $interval->format('%Y');

                                                 echo $idadePaciente;

                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;  

                                                
                                     
                                                 //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                 if ($ordemRecurso == '2' and $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ($ordemRecurso == '2' and $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }


                                            
                                            }

                                        }
                                        ?>

                                        <tr>
                                            <td>ORTOPEDICOS </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>


                                         <?php
                                        //== QUERY DE TODOS OS DADOS DO ATENDIMENTOS NA HIDROTERAPIA ===
                                        $querySelectRecPaciente = "SELECT * FROM atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on 
                                        dsp.ordem_agendamento = apc.cod_agendamento  where apc.ordem_recurso_tratamento = 2";

                                        $queryResultRecPaciente = $mysqli->query($querySelectRecPaciente);
                                                                               

                                        if (mysqli_affected_rows($mysqli) > 0) {

                                            $contRecJan = 0;
                                            $contRecFev = 0;
                                            $contRecMar = 0;
                                            $contRecAbr = 0;
                                            $contRecMai = 0;
                                            $contRecJun = 0;
                                            $contRecJul = 0;
                                            $contRecAgo = 0;
                                            $contRecSet = 0;
                                            $contRecOut = 0;
                                            $contRecNov = 0;
                                            $contRecDez = 0;
                                            while ($row_cont_rec_paciente = mysqli_fetch_array($queryResultRecPaciente)) {                                               
                                            
                                                $dataCadastroRec  = $row_cont_rec_paciente['data_atendimento'];                                               


                                                $mesAnoRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesAnoRecCad = DateTime::createFromFormat("Y-m-d", $mesAnoRecCad);
                                                $mesAnoRecCad = $mesAnoRecCad->format("Y");

                                                $mesMesRecCad = preg_replace('/[mm]/', '', $dataCadastroRec);
                                                $mesMesRecCad = DateTime::createFromFormat("Y-m-d", $mesMesRecCad);
                                                $mesMesRecCad = $mesMesRecCad->format("m");

                                                //PEGANDO O ANO ATUAL 
                                                $mesAnoAtual = date("Y");

                                                // echo $mesAnoRecCad . " ";

                                                // echo $mesMesRecCad;

                                                // echo $mesAnoAtual;
                                                
                                     
                                                 //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 01 JANEIRO
                                                 if ( $mesMesRecCad == '01'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJan += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 02 FEVEREIRO
                                                if ( $mesMesRecCad == '02'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecFev += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 03 MARÇO
                                                if ( $mesMesRecCad == '03'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMar += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 04 ABRIL
                                                if ( $mesMesRecCad == '04'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAbr += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 05 MAIO
                                                if ( $mesMesRecCad == '05'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecMai += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 06 JUNHO
                                                if ( $mesMesRecCad == '06'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJun += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 07 JULHO
                                                if ( $mesMesRecCad == '07'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecJul += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 08 AGOSTO
                                                if ( $mesMesRecCad == '08'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecAgo += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 09 SETEMBRO
                                                if ($mesMesRecCad == '09'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecSet += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 010 OUTUBRO
                                                if ( $mesMesRecCad == '10'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecOut += 1;
                                                }

                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 11 NOVEMBRO
                                                if ( $mesMesRecCad == '11'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecNov += 1;
                                                }
                                                //CONTAR QUANTOS É FISIO NO ANO ATUAL NO MES 12 DEZEMBRO
                                                if ( $mesMesRecCad == '12'  and $mesAnoRecCad == $mesAnoAtual) {
                                                    $contRecDez += 1;
                                                }
                                            
                                            }

                                        }
                                        ?>

                                        <tr>
                                            <td>  ATENDIMENTO HIDROTERAPIA </td>
                                            <td><?php echo $contRecJan; ?></td>
                                            <td><?php echo $contRecFev; ?></td>
                                            <td><?php echo $contRecMar; ?></td>
                                            <td><?php echo $contRecAbr; ?></td>
                                            <td><?php echo $contRecMai; ?></td>
                                            <td><?php echo $contRecJun; ?></td>
                                            <td><?php echo $contRecJul; ?></td>
                                            <td><?php echo $contRecAgo; ?></td>
                                            <td><?php echo $contRecSet; ?></td>
                                            <td><?php echo $contRecOut; ?></td>
                                            <td><?php echo $contRecNov; ?></td>
                                            <td><?php echo $contRecDez; ?></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notification-box">
                    <div class="msg-sidebar notifications msg-noti">
                        <div class="topnav-dropdown-header">
                            <span>Messages</span>
                        </div>
                        <div class="drop-scroll msg-list-scroll">
                            <ul class="list-box">
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">R</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Richard Miles </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item new-message">
                                            <div class="list-left">
                                                <span class="avatar">J</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Ruth C. Gault</span>
                                                <span class="message-time">1 Aug</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">T</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Tarah Shropshire </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">M</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Mike Litorus</span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">C</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Catherine Manseau </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">D</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Domenic Houston </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">B</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Buster Wigton </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">R</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Rolland Webber </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">C</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Claire Mapes </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">M</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Melita Faucher</span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">J</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Jeffery Lalor</span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">L</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Loren Gatlin</span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">T</span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Tarah Shropshire</span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="chat.html">See all messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.slimscroll.js"></script>

    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="assets/js/app.js"></script>

    <!-- SCRIPT PARA POP UP -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <!-- SCRIPT PARA O PRELOAD DA PAGINA -->
    <script src="assets/js/script-preload.js"></script>
</body>

</html>