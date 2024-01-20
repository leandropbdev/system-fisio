<?php
session_start();
include('View/autentication/login-invalid.php');

include_once('./db/db-conection.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>System Fisio - Agenda </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">

	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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

				<ul class="nav float-left">
					<li>
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
							</a>
							<form action="search.html ">
								<input class="form-control" type="text" placeholder="Search here">
								<button class="btn" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</li>
					<li>
						<a href="index.php" class="mobile-logo d-md-block d-lg-none d-block"><img src="assets/img/logo1.png" alt="" width="30" height="30"></a>
					</li>
				</ul>

				<ul class="nav user-menu float-right">
					<li class="nav-item dropdown d-none d-sm-block">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<img src="assets/img/sidebar/icon-22.png" alt="">
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span>Notifications</span>
							</div>
							<div class="drop-scroll">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="John Doe" src="assets/img/user-06.jpg" class="img-fluid rounded-circle">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">John Doe</span> is
														now following you </p>
													<p class="noti-time"><span class="notification-time">4 mins
															ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">T</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Tarah
															Shropshire</span> sent you a message.</p>
													<p class="noti-time"><span class="notification-time">6 mins
															ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">L</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Misty Tison</span>
														like your photo.</p>
													<p class="noti-time"><span class="notification-time">8 mins
															ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">G</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Rolland
															Webber</span> booking appoinment for meeting.</p>
													<p class="noti-time"><span class="notification-time">12 mins
															ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">T</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Bernardo
															Galaviz</span> like your photo.</p>
													<p class="noti-time"><span class="notification-time">2 days
															ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="activities.html">View all Notifications</a>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown d-none d-sm-block">
						<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="assets/img/sidebar/icon-23.png" alt=""> </a>
					</li>
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
						<li class="active">
							<a href="index.php"><img src="assets/img/sidebar/icon-6.png" alt="icon"><span>Agenda</span></a>
						</li>
						<li class="submenu">
							<a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span> Pacientes</span><span class="menu-arrow"></span></a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="all-pacientes.php"><span>Todos os Pacientes</span></a></li>
								<li><a href="add-paciente.php"><span>Adicionar Paciente</span></a></li>

							</ul>
						</li>
						<li class="submenu">
							<a href="#"><img src="assets/img/sidebar/icon-10.png" alt="icon"><span> Atendimentos </span>
								<span class="menu-arrow"></span></a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="invoices.html"><span>Invoices</span></a></li>
								<li><a href="payments.html"><span>Payments</span></a></li>
								<li><a href="expenses.html"><span>Expenses</span></a></li>
								<li><a href="provident-fund.html"><span>Provident Fund</span></a></li>
								<li><a href="taxes.html"><span>Taxes</span></a></li>
							</ul>
						</li>
						<li class="menu-title">RELATÓRIOS</li>
						<li>
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
						<div class="col-md-6">
							<h3 class="page-title mb-0">Agenda</h3>
						</div>
						<div class="col-md-6">
							<ul class="breadcrumb mb-0 p-0 float-right">
								<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a>
								</li>
								<li class="breadcrumb-item"><span>Agenda</span></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8 col-4">
					</div>
					<div class="col-sm-4 col-8 text-right add-btn-col">
						<a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_event"><i class="fas fa-plus"></i> Novo agendamento</a>
					</div>
				</div>

				<?php

				//== QUERY DE TODOS OS DADOS DO PACIENTE ===
				$querySelectPaciente = "SELECT * FROM pacientes p join avaliacao_paciente a on a.ordem_paciente = p.cod_paciente  ORDER BY nome_paciente";

				$queryResultPaciente = $mysqli->query($querySelectPaciente);

				if (mysqli_affected_rows($mysqli) > 0) {


					$contIdoso = 0;
					$contSitIndigena = 0;
					while ($row_cont_paciente = mysqli_fetch_array($queryResultPaciente)) {

						$etniaPaciente = $row_cont_paciente['etnia_paciente'];


						$dataNascPacienteBd = $row_cont_paciente['data_nasc_paciente'];

						$dataNascPaciente = preg_replace('/[mm]/', '', $dataNascPacienteBd);
						$dataNascPaciente = DateTime::createFromFormat("Y-m-d", $dataNascPaciente);
						$dataNascPaciente = $dataNascPaciente->format("d/m/Y");

						$date = new DateTime($dataNascPacienteBd);
						$interval = $date->diff(new DateTime(date('Y-m-d')));
						$idadePaciente =  $interval->format('%Y');



						if ($idadePaciente >= '60') {
							// echo $idadePaciente;
							$contIdoso += 1;
						}

						//CONTAR QUANTOS INDIGENAS
						if ($etniaPaciente != "") {
							// echo $etniaPaciente;
							$contSitIndigena += 1;
						}
					}
				}

				//BUCAR QUANTOS TEM DIABETES 
				//== QUERY DE TODOS OS DADOS DO PACIENTE ===
				$querySelectSitPaciente = "SELECT * FROM tipo_situacao_paciente ";

				$queryResultSitPaciente = $mysqli->query($querySelectSitPaciente);

				if (mysqli_affected_rows($mysqli) > 0) {


					$contSituacao = 0;
					while ($row_cont_sit_paciente = mysqli_fetch_array($queryResultSitPaciente)) {

						$ordem_situacao = $row_cont_sit_paciente['ordem_situacao'];


						//CONTAR QUANTOS É DIABETICO
						if ($ordem_situacao == '2') {
							$contSituacao += 1;
						}
					}
				}


				//BUCAR QUANTOS HIPERTENSOS 
				//== QUERY DE TODOS OS DADOS DO PACIENTE ===
				$querySelectSitHipPaciente = "SELECT * FROM tipo_situacao_paciente ";

				$queryResultSitHipPaciente = $mysqli->query($querySelectSitHipPaciente);

				if (mysqli_affected_rows($mysqli) > 0) {


					$contSituacaoHiper = 0;
					while ($row_cont_sit_hipertense_paciente = mysqli_fetch_array($queryResultSitHipPaciente)) {

						$ordem_sit_hipertense = $row_cont_sit_hipertense_paciente['ordem_situacao'];


						//CONTAR QUANTOS É DIABETICO
						if ($ordem_sit_hipertense == '1') {
							$contSituacaoHiper += 1;
						}
					}
				}


				?>

				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="dash-widget dash-widget5">
							<span class="float-left"><img src="assets/img/dash/idoso.png" alt="" width="80"></span>
							<div class="dash-widget-info text-right">
								<span>Idosos</span>
								<h3><?php if (isset($contIdoso)) {
										echo $contIdoso;
									} else {
										echo "0";
									}  ?></h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="dash-widget dash-widget5">
							<div class="dash-widget-info text-left d-inline-block">
								<span>Diabeticos</span>
								<h3><?php if (isset($contSituacao)) {
										echo $contSituacao;
									} else {
										echo "0";
									} ?></h3>
							</div>
							<span class="float-right"><img src="assets/img/dash/diabete.png" width="80" alt=""></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="dash-widget dash-widget5">
							<span class="float-left"><img src="assets/img/dash/hipertenso.png" alt="" width="80"></span> <!-- #776fd6  !-->
							<div class="dash-widget-info text-right">
								<span>Hipertensos</span>
								<h3><?php if (isset($contSituacaoHiper)) {
										echo $contSituacaoHiper;
									} else {
										echo "0";
									} ?></h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="dash-widget dash-widget5">
							<div class="dash-widget-info d-inline-block text-left">
								<span>Indígenas</span>
								<h3><?php if (isset($contSitIndigena)) {
										echo $contSitIndigena;
									} else {
										echo "0";
									} ?></h3>
							</div>
							<span class="float-right"><img src="assets/img/dash/indio.png" alt="" width="80"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-12 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="row align-items-center">
									<div class="col-auto">
										<div class="page-title">
											Agendamentos <span id="msg_filtro"></span>
										</div>
									</div>
									<div class="col text-right">
										<div class=" mt-sm-0 mt-2">
											<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
											<div class="dropdown-menu dropdown-menu-right">
												<!-- status 1 = Agendando 
												status 2 = Finalizado po alta
												status 3 = finalizado por ausencia -->
												<button class="dropdown-item btn_filtro_agendado" status="1">Agendandos</button>

												<div role="separator" class="dropdown-divider"></div>

												<button class="dropdown-item btn_filtro_agendado" status="2">Concluidos</button>

												<div role="separator" class="dropdown-divider"></div>

												<button class="dropdown-item btn_filtro_agendado" status="3">Finalizado por ausência</button>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<!-- <div id="calendar" class="overflow-hidden"></div> -->
								<div class="row">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header">
												<?php

												date_default_timezone_set('America/Manaus');
												$dia = date('l');

												switch ($dia) {
													case 'Monday':
														$diaSemana = 'Segunda-Feira';
														break;
													case 'Tuesday':
														$diaSemana = 'Terça-Feira';
														break;
													case 'Wednesday':
														$diaSemana = 'Quarta-Feira';
														break;
													case 'Thursday':
														$diaSemana = 'Quinta-Feira';
														break;
													case 'Friday':
														$diaSemana = 'Sexta-Feira';
														break;
													case 'Saturday':
														$diaSemana = 'Sábado';
														break;
													case 'Sunday':
														$diaSemana = 'Domingo';
														break;
												}

												$dia = date('d');
												$mes = date('m');
												$ano = date('Y');

												switch ($mes) {
													case '01':
														$mes = 'janairo';
														break;
													case '02':
														$mes = 'fevereiro';
														break;
													case '03':
														$mes = 'março';
														break;
													case '04':
														$mes = 'abril';
														break;
													case '05':
														$mes = 'maio';
														break;
													case '06':
														$mes = 'junho';
														break;
													case '07':
														$mes = 'julho';
														break;
													case '08':
														$mes = 'agosto';
														break;
													case '09':
														$mes = 'setembro';
														break;
													case '10':
														$mes = 'outubro';
														break;
													case '11':
														$mes = 'novembro';
														break;
													case '12':
														$mes = 'dezembro';
														break;
												}

												?>

												<h5 class="text-bold card-title text-center"><?php echo $mes;  ?> <?php echo $ano;  ?></h5>
											</div>

											<div class="card-body " id="body_table_agem">
												<div class="table-responsive">
													<table class="table table-bordered m-b-0">
														<thead class="thead-light text-center">
															<tr>
																<th style="width: 10px;"></th>
																<th>Seg </th>
																<th>Ter</th>
																<th>Qua</th>
																<th>Qui</th>
																<th>Sex</th>
															</tr>
															<tr style="background:blue; height:5px;">
																<th style="width: 10px; "></th>
																<td style=" background:#ddd; height:5px;">Ortopedico </td>
																<td style=" background:#ddd;">Neuro</td>
																<td style=" background:#ddd;">Ortopedico</td>
																<td style=" background:#ddd;">Neuro</td>
																<td style=" background:#ddd;">Ortopedico</td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th style="width: 10px; background:#eee;">7:00</th>
																<!-- ====== SEGUNDA  07:00 HORAS data-toggle="modal" data-target="#add_event" =======-->

																<td style="width: 20px; ">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '07:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];

																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>


																<!-- TEÇA-FEIRA AS 07:00 HORAS -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '07:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>


																	<?php

																	}
																	?>

																</td>

																<!-- QUARTA-FEIRA 07:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '07:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 07:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '07:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 07:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '07:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>




															<!-- // ========================== LINHA DAS  08:00 =========================================== -->
															<tr>
																<th style="width: 10px; background:#eee;">8:00</th>
																<!-- ====== SEGUNDA  08:00 HORAS =======-->
																<td style="width: 20px; ">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '08:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];

																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 08:00 HORAS -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '08:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>


																	<?php

																	}
																	?>

																</td>

																<!-- QUARTA-FEIRA 8:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '08:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 8:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '08:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 8:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '08:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>

															<!-- =============================== LINHA DAS 08:30 ======================================= -->
															<tr>
																<th style="width: 10px; background:#eee;">8:30</th>
																<!-- ====== SEGUNDA  08:00 HORAS =======-->
																<td style="width: 20px; ">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '08:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];

																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 08:30 HORAS -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '08:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>


																	<?php

																	}
																	?>

																</td>

																<!-- QUARTA-FEIRA 8:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '08:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}

																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 8:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '08:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 8:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '08:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>
																	<?php

																	}
																	?>
																</td>
															</tr>





															<!-- ======================== LINHA DAS 09:00 =================================================== -->
															<tr><!-- ====== SEGUNDA  09:00 HORAS =======-->
																<th style="width: 10px; background:#eee;">9:00</th>
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '09:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 09:00 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '09:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>
																<!-- QUANTA-FEIRA 09:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '09:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>

																<!-- QUINTA-FEIRA 09:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '09:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!--SEXTA-FEIRA 09:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '09:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>

															</tr>

															<!-- ========================== LINHA DAS 09:30 ================================ -->
															<tr><!-- ====== SEGUNDA  09:30 HORAS =======-->
																<th style="width: 10px; background:#eee;">9:30</th>
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '09:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 09:30 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '09:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>
																<!-- QUANTA-FEIRA 09:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '09:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>

																<!-- QUINTA-FEIRA 09:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '09:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!--SEXTA-FEIRA 09:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '09:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>

															</tr>


															<!-- ==================== LINHA DAS 10:00 ================== -->
															<tr>
																<th style="width: 10px; background:#eee;">10:00</th>
																<!-- ====== SEGUNDA  10:00 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '10:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 10:00 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '10:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 10:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '10:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 10:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '10:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 10:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '10:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>

															<!--======================= LINHA DAS 10:30 =========================== -->
															<tr>
																<th style="width: 10px; background:#eee;">10:30</th>
																<!-- ====== SEGUNDA  10:30 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '10:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 10:30 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '10:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 10:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '10:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 10:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '10:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 10:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '10:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>




															<!-- ====================== LINHA DAS 14:00 ====================		 -->
															<tr>
																<th style="width: 10px; background:#eee;">14:00</th>
																<!-- ====== SEGUNDA  14:00 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '14:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 14:00 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '14:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 14:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '14:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 14:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '14:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 14:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '14:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>

															<!--	=========================== LINHA DAS 14:30 ===============   -->
															<tr>
																<th style="width: 10px; background:#eee;">14:30</th>
																<!-- ====== SEGUNDA  14:30 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '14:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 14:30 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '14:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 14:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '14:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 14:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '14:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 14:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '14:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>




															<!--	============================== LINHA DAS 15:00 ================= -->
															<tr>
																<th style="width: 10px; background:#eee;">15:00</th>
																<!-- ====== SEGUNDA  15:00 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '15:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 15:00 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '15:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 15:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '15:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 15:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '15:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 15:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '15:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>

															<!-- =========================== LINHA DAS 15:30 ==================== -->
															<tr>
																<th style="width: 10px; background:#eee;">15:30</th>
																<!-- ====== SEGUNDA  16:30 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '15:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 15:30 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '15:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 15:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '15:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 15:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '15:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 15:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '15:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>




															<!-- ============================= LINHA DAS 16:00 ============= -->
															<tr>
																<th style="width: 10px; background:#eee;">16:00</th>
																<!-- ====== SEGUNDA  16:00 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '16:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 16:00 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '16:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 16:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '16:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 16:00 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '16:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 16:00 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '16:00:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>

															<!-- ================ LINHA DAS 16:30 ======================  -->
															<tr>
																<th style="width: 10px; background:#eee;">16:30</th>
																<!-- ====== SEGUNDA  16:30 HORAS =======-->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '16:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 1 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>


																</td>

																<!-- TEÇA-FEIRA AS 16:30 HORAS -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '16:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 2 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- QUARTA-FEIRA 16:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '16:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
																<!-- QUINTA-FEIRA 16:30 HORAS	 -->
																<td style="width: 20px;">

																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '16:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 4 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}



																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {

																			$cor = "";
																			$core = "orange";
																		}

																	?>

																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; background:<?php echo $core; ?>" ;><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																											echo $confirm;
																																																																																										} ?></span></span></a></br>

																	<?php

																	}
																	?>
																</td>

																<!-- SEXTA-FEIRA 16:30 HORAS	 -->
																<td style="width: 20px;">
																	<?php
																	$querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '16:30:00' and status = '1' order by p.nome_paciente desc";

																	$queryResult = mysqli_query($mysqli, $querySelectAgnda);

																	while ($row_value_agd = mysqli_fetch_array($queryResult)) {

																		$codAgendamento = $row_value_agd['cod_agendamento'];
																		$statusAgendamento = $row_value_agd['status'];
																		$codDiasSemPaciente = $row_value_agd['cod_dias_sem_paciente'];
																		$nomeDiasSemana = $row_value_agd['nome_dias_semana'];


																		$observacao = $row_value_agd['observacao'];


																		$nomeProfissional = $row_value_agd['nome_profissional'];
																		$codProfissional = $row_value_agd['cod_profissional'];
																		$codPaciente = $row_value_agd['cod_paciente'];
																		$nomePaciente = $row_value_agd['nome_paciente'];
																		$horarioInicial = substr($row_value_agd['horario_inicio'], 0, 5);
																		$horarioFinal = substr($row_value_agd['horario_final'], 0, 5);


																		// substr($nomePaciente, 0, 1)
																		$codProcedimento = $row_value_agd['ordem_recurso_tratamento'];
																		$procedimento = $row_value_agd['nome_recurso'];
																		$telefone = $row_value_agd['telefone_paciente'];
																		$rua = $row_value_agd['rua_paciente'];
																		$bairro = $row_value_agd['bairro_paciente'];

																		// echo $codAgendamento;

																		//  CONTAR O TATAL DE PRESENCA DO PACIENTE 
																		$queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
																		$row_presenca = mysqli_fetch_assoc($query_cont);
																		$contPresenca = $row_presenca['qtda_presenca'];


																		// echo $contPresenca;

																		//  CONTAR O TATAL DE FALTAS DO PACIENTE 
																		$queryAtendiemntoContAusencia = "SELECT count(cod_atendimento) AS qtda_ausencia FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '0'"; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
																		$query_cont_ausencia = mysqli_query($mysqli, $queryAtendiemntoContAusencia);
																		$row_ausencia = mysqli_fetch_assoc($query_cont_ausencia);
																		$contAusencia = $row_ausencia['qtda_ausencia'];


																		$querySelectDiasSem = "SELECT * FROM dias_semana_paciente WHERE cod_dias_sem_paciente = '$codDiasSemPaciente' ";
																		$queryResultDiasSem = $mysqli->query($querySelectDiasSem);

																		while ($row_value_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {

																			$ordemAgendamentoDiasSem = $row_value_dias_sem['ordem_agendamento'];

																			$ordemDiasSem = $row_value_dias_sem['ordem_cod_dias_semana'];
																		}


																		// MOSTRA SE JA FOI ATENDIDO OU NÃO
																		$queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento' and ordem_cod_dias_semana = 5 and data_atendimento = CURRENT_DATE";
																		$query_result = $mysqli->query($queryAtendimento);

																		if (mysqli_affected_rows($mysqli) > 0) {

																			while ($row_value_atendimento = mysqli_fetch_array($query_result)) {
																				$frequencia = $row_value_atendimento['frequencia'];


																				// echo $frequencia;

																				if ($frequencia == 1) {
																					$confirm = "<i class='fas fa-check'></i>";
																				} else if ($frequencia == 0) {
																					$confirm = "<i class='fas fa-times'></i>";
																				} else if ($frequencia == "") {
																					$confirm = "";
																				}
																			}
																		} else {
																			$confirm = "";
																		}


																		// MUDAR A COR DO MARCADO DE AGENDAMENTO CASO AUSENCIA ACIMA DE 3
																		if ($contAusencia  >= 3) {
																			$cor = "bg-danger";
																		} else {
																			$cor = "bg-warning";
																		}


																	?>


																		<a href="#" class="btn bg-primary p-0 btn_detalhe_agendamento" diaSemana="<?php echo $nomeDiasSemana; ?>" codDiasSemana="<?php echo $ordemDiasSem; ?>" observacao="<?php echo $observacao; ?>" codProfissional="<?php echo $codProfissional; ?>" statusAgendamento="<?php echo $statusAgendamento; ?>" codDiasSemPaciente="<?php echo $codDiasSemPaciente; ?>" codAgendamento="<?php echo $codAgendamento; ?>" horarioInicial="<?php echo $horarioInicial; ?>" horarioFinal="<?php echo $horarioFinal; ?>" nomeProfissional="<?php echo $nomeProfissional; ?>" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" codProcedimento="<?php echo $codProcedimento; ?>" procedimento="<?php echo $procedimento; ?>" telefone="<?php echo $telefone; ?>" rua="<?php echo $rua; ?>" bairro="<?php echo $bairro; ?>" presenca="<?php echo $contPresenca; ?>" ausencia="<?php echo $contAusencia; ?>" style="padding:0px; margin-top:1px;" data-toggle="modal" data-target="#my_event">
																			<span class="badge  <?php echo $cor; ?> text-white badge-border p-2 mt-2 " style="width: 160px; text-align:left; "><?php echo $horarioInicial . ' - ' . $horarioFinal; ?></br><?php echo substr($nomePaciente, 0, 18); ?> <span style="margin-left:10%;"><?php if (isset($confirm)) {
																																																																																			echo $confirm;
																																																																																		} ?></span></span> </a></br>


																	<?php

																	}
																	?>
																</td>
															</tr>




														</tbody>
													</table>
												</div>
											</div>

										</div>
									</div>
								</div>
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

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/jquery.slimscroll.js"></script>

	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

	<script src="assets/js/fullcalendar.min.js"></script>
	<script src="assets/js/jquery.fullcalendar.js"></script>

	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/raphael/raphael-min.js"></script>
	<script src="assets/js/apexcharts.js"></script>
	<script src="assets/js/chart-data.js"></script>

	<script src="assets/js/app.js"></script>

	<!-- SCRIPT PARA POP UP -->
	<script src="assets/js/sweetalert2.all.min.js"></script>

	<script src="assets/js/cadastro-agendamento.js"></script>

	<!-- SCRIPT DE DETALHE DO AGENDAMENTO  -->
	<script src="assets/js/detalhe-agendamento.js"></script>

	<!-- SCRIPT DE FILTRO DO AGENDAMENTO  -->
	<script src="assets/js/filtro-agendamento.js"></script>

	<!-- SCRIPT PARA O PRELOAD DA PAGINA -->
	<script src="assets/js/script-preload.js"></script>

	<!-- adicionar novo agendamento -->
	<div id="add_event" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Novo agendamento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form">


						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<label>Dia da semana:<span class="text-danger">*</span></label>
								<div class="form-group bg-primary ">
									<?php
									$querySelecDiasSemana = "SELECT * FROM dias_semana";
									$result_diaSem = mysqli_query($mysqli, $querySelecDiasSemana);

									while ($row_result_diaSem = mysqli_fetch_array($result_diaSem)) {

										$nomeSem = $row_result_diaSem['nome_dias_semana'];
										$codSem = $row_result_diaSem['cod_dias_semana'];

									?>
										<div class="form-check form-check-inline text-center" style="padding:5px; margin:0px 18px">
											<input class="form-check-input" type="checkbox" id="dias_semana" value="<?php echo $codSem; ?>" name="dias_sem[]">
											<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeSem; ?> </label>
										</div>


									<?php     }    ?>

								</div>

							</div>


						</div>



						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">

								<div class="form-group">
									<label>Horário inicial: <span class="text-danger" id="alert_horarioInicio">*</span></label>
									<input class="form-control" type="time" id="horario_inicio" name="horario_inicial">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">

								<div class="form-group">
									<label>Horário final: <span class="text-danger" id="alert_horarioFinal">*</span></label>
									<input class="form-control" type="time" id="horario_final" name="horario_final">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Profissional:<span class="text-danger" id="alert_profissional">*</span></label>
									<select class="form-control select" name="profissional" id="profissional">
										<option selected value="">Selecione o profissional</option>
										<?php

										$querySelectProf = "SELECT * FROM profissionais";
										$resultQueryProf = mysqli_query($mysqli, $querySelectProf);

										while ($row_result_prof = mysqli_fetch_array($resultQueryProf)) {
											$cod_profissional = $row_result_prof['cod_profissional'];
											$nome_profissional = $row_result_prof['nome_profissional'];

										?>
											<option value="<?php echo $cod_profissional ?>"><?php echo $nome_profissional; ?></option>

										<?php

										}

										?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Paciente: <span class="text-danger" id="alert_nomePaciente">*</span></label>
									<input type="text" class="form-control  pesquisa " name="nome_paciente" id="pesquisa" placeholder="Nome do paciente">
								</div>

							</div>
						</div>
						<!-- //==== MOSTRAR O RESULTADO DA BUSCA == -->
						<span class=" resultado  " id="result_paciente">

						</span>

						<!-- <div class="row proc_principal" >
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Procedimento:<span class="text-danger" id="alert_procedimento">*</span></label>
									<select class="form-control select" name="procedimento" id="procedimento">
										<option selected value="" id="proce_cad">Selecione o procedimento</option>
										<?php

										$querySelectProcedimento = "SELECT * FROM recurso_tratamento";
										$resultQueryProcediemnto = mysqli_query($mysqli, $querySelectProcedimento);

										while ($row_result_procediemnto = mysqli_fetch_array($resultQueryProcediemnto)) {
											$cod_recurso = $row_result_procediemnto['cod_recurso'];
											$nome_recurso = $row_result_procediemnto['nome_recurso'];

										?>
											<option value="<?php echo $cod_recurso ?>"><?php echo $nome_recurso; ?></option>

										<?php

										}

										?>
									</select>
								</div>
							</div>
						</div> -->

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Observações:<span class="text-danger">*</span></label>
									<textarea class="form-control" rows="2" name="observacao"></textarea>
								</div>

							</div>
						</div>


						<div class="submit-section text-center">
							<button class="btn btn-primary  submit-btn" type="button" id="btn_cad_agendamento">Agendar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!-- //DETALHE DO AGENDAMENTO -->
	<div class="modal custom-modal fade none-border" id="my_event">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content" style="border-radius:3px;">
				<div class="modal-header   p-2" style="background:#eee;">
					<h4 class="modal-title" style="font-size:16px;"> <span id="horario_agd">*</span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body ">

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codAgendamento" id="codAgendamentoDetalhe"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codProfissional" id="codProfissionalDetalhe" placeholder="cod Profissional"></input>
					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="nomeProfissional" id="nomeProfissionalDetalhe" placeholder="nome Profissional"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codPaciente" id="codPacienteDetalhe" placeholder="cod paciente"></input>
					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="nomePaciente" id="nomePacienteDetalhe" placeholder="nome paciente"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codProcedimento" id="codProcedimentoDetalhe" placeholder="cod paciente"></input>
					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="nomeProcedimento" id="nomeProcedimentoDetalhe" placeholder="nome paciente"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="horarioInicial" id="horarioInicialDetalhe" placeholder="Horario Inicial"></input>
					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="horarioFinal" id="horarioFinalDetalhe" placeholder="Horario Final"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="observacao" id="observacaoDetalhe" placeholder="Observação "></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codDiasSemPaciente" id="codDiasSemPaciente"></input>

					<input style="background:#eee;" type="hidden" class="form-control " rows="2" name="codDiasSemanaDetalhe" id="codDiasSemanaDetalhe"></input>

					<span style="margin-top:-80px; ">Fisioterapeuta: <span id="profissional_agd"></span> </span><br>


					<span>Paciente: <a href="http://"> <span id="paciente_agd"></span> </a></span><br>
					<span>Procedimento: <span id="procedimento_agd"></span> </span><br>
					<span>Celular: <span id="telefone_agd"></span></span><br>
					<span>Endereço: <span id="endereco_agd"></span> </span><br>
					<span>Presença: <span id="presenca_agd"></span> </span><br>
					<span>Ausência: <span id="ausencia_agd"></span> </span><br>

					<div class="row mb-3">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 " style="height:25px;">

							<div class="form-group">
								<span>Status:</span>

							</div>
						</div>
						<div class="col-lg-8 col-md-6 col-sm-6 col-12 " style="padding:1px;   height:25px;">
							<div class="form-group ">
								<select style="height: 25px; font-size:13px; padding:2px; width:90px; margin:0px; background:#eee;" class="form-control select" name="status" onchange="altualizaSelect()" id="status" aria-label="Default select example">
									<option selected id="statusDetalhe"> </option>
									<option value="1" id="statusDetAgem">Agendado</option>
									<option value="2" id="statusDetCom">Receber alta</option>
									<option value="3" id="statusDetFin">Arquivar </option>

								</select>
							</div>
						</div>
					</div>




					<div id="form_evolucao" style="display:none">
						<div class="form-group p-1">
							<label>Evolução do paciente:</label>
							<textarea style="background:#eee;" class="form-control " rows="2" name="descricao_evolucao" id="descricao_evolucao"></textarea>
						</div>

						<div class="form-group p-1">
							<label style="display:block;">Avaliação do atendimento</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio1" value="otimo">
								<label class="form-check-label" for="inlineRadio1">Otimo </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio2" value="bom">
								<label class="form-check-label" for="inlineRadio2">Bom</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio3" value="ruim">
								<label class="form-check-label" for="inlineRadio3">Ruim</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio4" value="não declara" checked>
								<label class="form-check-label" for="inlineRadio3">Não declarar</label>
							</div>
						</div>

					</div>


					<div class="form-group p-1">
						<label>Observação:</label>
						<textarea style="background:#eee;" class="form-control " rows="2" name="observacao_Atendiemnto" id="obs_atendimento"></textarea>
					</div>

					<div style="border-bottom:2px solid #eee; background:#eee;  "> </div>

				</div>


				<div class="modal-footer justify-content-center  " style="margin-top:-18px;">
					<button type="button" class="btn btn-success  save-event submit-btn btn_frequencia" frequencia="1" style="font-size:13px;"><i class="fas fa-check"></i></button>
					<button type="button" class="btn btn-warning save-event submit-btn text-white btn_frequencia" frequencia="0" style="font-size:13px;"><i class="fas fa-times"></i></button>
					<button type="button" class="btn btn-info  btn_edt_agendamento" data-toggle="modal" data-target="#edt_agen" style="font-size:12px;"><i class="fas fa-edit"></i></button>
					<button type="button" class="btn btn-danger btn_delete01 " data-toggle="modal" data-target="#alert_delete" style="font-size:12px;"><i class="fas fa-trash"></i></button>
				</div>

			</div>
		</div>
	</div>

	<!-- // ===== EDITAR AGENDAMENTO DO AGENDAMENTO === -->
	<div id="edt_agen" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar agendamento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_edt">

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<input style="background:#eee;" type="hidden" class="form-control" rows="2" name="codAgendamento_edt" id="codAgendamento_edt"></input>
								<input style="background:#eee;" type="hidden" class="form-control" rows="2" name="codDiasSemPaciente_edt" id="codDiasSemPaciente_edt"></input>
								<label>Dia da semana:<span class="text-danger">*</span></label>
								<div class="form-group bg-primary ">
									<?php
									$querySelecDiasSemana = "SELECT * FROM dias_semana";
									$result_diaSem = mysqli_query($mysqli, $querySelecDiasSemana);
									$contDiasSem = 1;
									while ($row_result_diaSem = mysqli_fetch_array($result_diaSem)) {

										$nomeSem = $row_result_diaSem['nome_dias_semana'];
										$codSem = $row_result_diaSem['cod_dias_semana'];

									?>
										<div class="form-check form-check-inline text-center" style="padding:5px; margin:0px 18px">
											<input class="form-check-input dias_semana_edt<?php echo $contDiasSem; ?>" type="checkbox" id="dias_semana_edt" value="<?php echo $codSem; ?>" name="dias_sem_edt[]">
											<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeSem; ?> </label>
										</div>


									<?php $contDiasSem++;
									}    ?>

								</div>

							</div>


						</div>



						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">

								<div class="form-group">
									<label>Horário inicial: <span class="text-danger" id="alert_horarioInicio">*</span></label>
									<input class="form-control" type="time" id="horario_inicio_edt" name="horario_inicial_edt">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">

								<div class="form-group">
									<label>Horário final: <span class="text-danger" id="alert_horarioFinal">*</span></label>
									<input class="form-control" type="time" id="horario_final_edt" name="horario_final_edt">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Profissional:<span class="text-danger" id="alert_profissional">*</span></label>
									<select class="form-control select" name="profissional_edt" id="profissional_edt">
										<option selected value="" id="option_prof_edt">Selecione o profissional</option>
										<?php

										$querySelectProf = "SELECT * FROM profissionais";
										$resultQueryProf = mysqli_query($mysqli, $querySelectProf);

										while ($row_result_prof = mysqli_fetch_array($resultQueryProf)) {
											$cod_profissional = $row_result_prof['cod_profissional'];
											$nome_profissional = $row_result_prof['nome_profissional'];

										?>
											<option value="<?php echo $cod_profissional ?>"><?php echo $nome_profissional; ?></option>

										<?php

										}

										?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Paciente: <span class="text-danger" id="alert_nomePaciente">*</span></label>
									<input type="text" class="form-control  " name="nome_paciente_edt" id="nome_paciente_edt" placeholder="Nome do paciente" disabled>
									<input type="hidden" class="form-control " name="cod_paciente_edt" id="cod_paciente_edt" placeholder="codigo do paciente">
								</div>

							</div>
						</div>


						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-3">
								<div class="form-group">
									<label>Procedimento:<span class="text-danger" id="alert_procedimento">*</span></label>
									<select class="form-control select" name="procedimento_edt" id="procedimento_edt">
										<option selected value="" id="option_proc_edt">Selecione o procedimento</option>
										<?php

										$querySelectProcedimento = "SELECT * FROM recurso_tratamento";
										$resultQueryProcediemnto = mysqli_query($mysqli, $querySelectProcedimento);

										while ($row_result_procediemnto = mysqli_fetch_array($resultQueryProcediemnto)) {
											$cod_recurso = $row_result_procediemnto['cod_recurso'];
											$nome_recurso = $row_result_procediemnto['nome_recurso'];

										?>
											<option value="<?php echo $cod_recurso ?>"><?php echo $nome_recurso; ?></option>

										<?php

										}

										?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Observações:<span class="text-danger">*</span></label>
									<textarea class="form-control" rows="2" name="observacao_edt" id="observacao_edt"></textarea>
								</div>

							</div>
						</div>
						<div class="submit-section text-center">
							<button class="btn btn-primary  submit-btn" type="button" id="btn_cad_agendamento_edt">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- ALERT DO DELELTE , SE QUER REALMENTE DELETAR O AGENDAMENTO  -->
	<div class="modal custom-modal fade none-border" id="alert_delete">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content" style="border-radius:3px;">
				<div class="modal-header   p-2" style="background:#eee;">
					<h4 class="modal-title" style="font-size:16px;">Deletar agendamento </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body ">
					<form id="formDelete">
						<div class="form-group " style="display:none">
							<input type="hidden" style="background:#eee;" class="form-control " rows="2" name="codAgendamento" id="codAgendamentoDelete"></input>
							<input type="hidden" style="background:#eee;" class="form-control " rows="2" name="codDiasSem" id="codDiasSemDelete"></input>
						</div>
						<h5 class="text-center">Deseja deletar esse agendamento?</h5>

						<div class="form-check form-check-inline text-center">
							<input class="form-check-input" type="checkbox" id="todos_agendamento" value="1" name="todos_agendamento">
							<label class="form-check-label" for="inlineCheckbox1 ">Deletar todos ? </label>
						</div>


						<div style="border-bottom:2px solid #eee; background:#eee;  "> </div>

				</div>
				<div class="modal-footer justify-content-center  " style="margin-top:-18px;">
					<button type="button" class="btn btn-info  btn_delete_agendamento" style="font-size:13px;">Sim</button>
					<button type="button" class="btn btn-danger delete-event submit-btn" data-dismiss="modal" style="font-size:13px;">Não</button>
				</div>

				</form>

			</div>
		</div>
	</div>


	<!-- //  ======  MODAL DE EVOLUÇÃO DO PACIENTE  === -->
	<div class="modal custom-modal fade none-border" id="modal_ev_paciente">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content" style="border-radius:3px;">
				<div class="modal-header   p-2" style="background:#eee;">
					<h4 class="modal-title" style="font-size:16px;">Evolução do paciente </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body ">
					<form id="formEvolucao">
						<div class="form-group " style="display:none;">
							<input type="hidden" style="background:#eee;" class="form-control " rows="2" name="codProfissional" id="codProfissional"></input>
							<input type="hidden" style="background:#eee;" class="form-control " rows="2" name="codPaciente" id="codPaciente"></input>
						</div>


						<div class="form-group p-1">
							<label>Descrição:</label>
							<textarea style="background:#eee;" class="form-control " rows="2" name="descricao_evolucao" id="descricao_evolucao"></textarea>
						</div>

						<div class="form-group p-1">
							<label style="display:block;">Avaliação do atendimento</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio1" value="otimo">
								<label class="form-check-label" for="inlineRadio1">Otimo </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio2" value="bom">
								<label class="form-check-label" for="inlineRadio2">Bom</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="avaliacao_at" id="inlineRadio3" value="ruim">
								<label class="form-check-label" for="inlineRadio3">Ruim</label>
							</div>
						</div>



						<div style="border-bottom:2px solid #eee; background:#eee;  "> </div>

				</div>
				<div class="modal-footer justify-content-center  " style="margin-top:-18px;">
					<button type="button" class="btn btn-info  btn_cad_ev_paciente" style="font-size:13px;">Salva</button>
					<button type="button" class="btn btn-danger delete-event submit-btn" data-dismiss="modal" style="font-size:13px;">Cancelar</button>
				</div>

				</form>

			</div>
		</div>
	</div>


	<!--  ==== MODAL ALERT DE CADASTRO === !-->
	<!-- <div class="modal custom-modal fade none-border" id="Modal-confirm">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content" style="border-radius:3px;">
				<div class="modal-header   p-2" style="background:#eee;">
					<h4 class="modal-title" style="font-size:16px;">Alerta de confirmação</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body body-teste ">

				</div>
			</div>
		</div>
	</div> -->


	<script>
		// Busca do paceinte 
		$(function() {
			//Pesquisar os paciente sem refresh na página
			$(".pesquisa").keyup(function() {
				//  alert("Ola mundo");

				var pesquisa = $(this).val();

				//Verificar se há algo digitado
				if (pesquisa != '') {
					var dados = {
						palavra: pesquisa
					}
					$.post('View/BuscaPaciente/busca-paciente.php', dados, function(retorna) {
						//Mostra dentro da ul os resultado obtidos 
						$(".resultado").html(retorna);
					});
				} else {
					$(".resultado").html('');
				}
			});
		});
	</script>


</body>

</html>