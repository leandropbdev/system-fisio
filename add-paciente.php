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

				<ul class="nav float-left">
					<li>
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
							</a>
							<form action="search.html">
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
													<p class="noti-details"><span class="noti-title">John Doe</span> is now following you </p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">T</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> sent you a message.</p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">L</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Misty Tison</span> like your photo.</p>
													<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">G</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Rolland Webber</span> booking appoinment for meeting.</p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">T</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> like your photo.</p>
													<p class="noti-time"><span class="notification-time">2 days ago</span></p>
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
						<li>
							<a href="index.php"><img src="assets/img/sidebar/icon-6.png" alt="icon"><span>Agenda</span></a>
						</li>
						<li class="submenu">
							<a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span> Pacientes </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="all-pacientes.php"><span>Todos os Pacientes</span></a></li>
								<li><a class="active" href="add-paciente.php"><span>Adicionar Paciente</span></a></li>


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
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<!-- text-uppercase -->
							<h5 class=" mb-0 mt-0 page-title">Adicionar Paciente </h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<ul class="breadcrumb float-right p-0 mb-0">
								<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
								<li class="breadcrumb-item"><a href="all-pacientes.php">Paciente</a></li>
								<li class="breadcrumb-item"><span> Add Paciente</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-content">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">

									<div class="row ">
										<div class="col-lg-12 col-md-6 col-sm-6 col-12">
											<form id="form">

												<div class="row ">
													<div class="col-lg-6 col-md-6 col-sm-6 col-12  " style="margin:  auto;">
														<div class="form-group">
															<label>Fisioterapeuta: <span id="alert_fisio"></span> </label>
															<select class="form-control select" name="fisio" id="fisio" style="border-color:red;">
																<option value="0" selected>Selecionar a Fisioterapeuta</option>
																<?php
																// BUCAR BAIRROS
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
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label>Nome:* <span id="alert_nome"></span></label>
															<input type="text" class="form-control" name="nome_paciente" id="nome_paciente" placeholder="Nome do paciente" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-6">
														<div class="form-group">
															<label>Data de nascimento:* <span id="alert_data_nasc"></span></label>
															<input type="date" class="form-control" id="data_nasc_paciente" name="data_nasc_paciente">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-6">
														<div class="form-group">
															<label>Sexo:* <span id="alert_sexo"></span></label>
															<select class="form-control select" id="sexo_paciente" name="sexo_paciente" required>
																<option value="0" selected>Sexo do paciente</option>
																<option value="M">Masculino</option>
																<option value="F">Feminino</option>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-3 col-md-6 col-sm-6 col-4">
														<div class="form-group">
															<label>Nº SUS:*</label>
															<input type="text" class="form-control" name="sus_paciente">
														</div>
													</div>
													<div class="col-lg-3 col-md-6 col-sm-6 col-3">
														<div class="form-group">
															<label>CPF:</label>
															<input type="text" id="cpf" class="form-control cpf" name="cpf_paciente">
														</div>
													</div>
													<div class="col-lg-3 col-md-6 col-sm-6 col-3">
														<div class="form-group">
															<label>Etnia:</label>
															<select class="form-control select" name="etnia_paciente">
																<option selected value="">Etnia do paciente</option>
																<?php
																// BUCAR BAIRROS
																$querySelectEtnia = "SELECT * FROM etnia";
																$resultQueryEtnia = mysqli_query($mysqli, $querySelectEtnia);

																while ($row_result_etnia = mysqli_fetch_array($resultQueryEtnia)) {
																	$cod_etnia = $row_result_etnia['cod_etnia'];
																	$nome_etnia = $row_result_etnia['nome_etnia'];

																?>
																	<option value="<?php echo $nome_etnia ?>"><?php echo $nome_etnia; ?></option>

																<?php

																}

																?>
															</select>
														</div>
													</div>

													<div class="col-lg-3 col-md-6 col-sm-6 col-3">
														<div class="form-group">
															<label>Profissão:</label>
															<input type="text" class="form-control" name="profissao_paciente">
														</div>
													</div>
												</div>

												<div class="row">

													<div class="col-lg-4 col-md-6 col-sm-6 col-4">
														<div class="form-group">
															<label>Rua:</label>
															<input type="text" class="form-control" placeholder="Rua, numero da casa" name="endereco_paciente">
														</div>
													</div>

													<div class="col-lg-4 col-md-6 col-sm-6 col-4">
														<div class="form-group">
															<label>Bairro:</label>
															<select class="form-control select" name="bairro_paciente">
																<option selected value="">Bairro do paciente</option>
																<?php
																// BUCAR BAIRROS
																$querySelectBairro = "SELECT * FROM bairros";
																$resultQueryBairro = mysqli_query($mysqli, $querySelectBairro);

																while ($row_result_bairro = mysqli_fetch_array($resultQueryBairro)) {
																	$cod_bairro = $row_result_bairro['cod_bairro'];
																	$nome_Bairro = $row_result_bairro['nome_bairro'];

																?>
																	<option value="<?php echo $nome_Bairro ?>"><?php echo $nome_Bairro; ?></option>

																<?php

																}

																?>


															</select>
														</div>

													</div>

													<div class="col-lg-4 col-md-6 col-sm-6 col-4">
														<div class="form-group">
															<label>Telefone:</label>
															<input type="text" id="telefone" class="form-control" name="telefone_paciente">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label>Situação do Paciente:</label>
														<div class="form-group">
															<?php
															$querySelecSituacaoP = "SELECT * FROM situacao_paciente";
															$result_situacaoP = mysqli_query($mysqli, $querySelecSituacaoP);

															while ($row_result_situacaoP = mysqli_fetch_array($result_situacaoP)) {

																$nomeSituacao = $row_result_situacaoP['nome_situacao'];
																$codSituacao = $row_result_situacaoP['cod_situacao'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codSituacao; ?>" name="situacao_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeSituacao; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>


												<div class="row">
													<div class="col-lg-8 col-md-6 col-sm-6 col-8">
														<div class="form-group">
															<label>Diagnóstico Médico:</label>
															<textarea class="form-control" rows="2" name="diag_medico_paciente"> </textarea>
														</div>

													</div>

													<div class="col-lg-4 col-md-6 col-sm-6 col-4">
														<div class="form-group">
															<label>cid:</label>
															<input type="text" class="form-control" name="cid_paciente">
														</div>

													</div>


												</div>

												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label>Diagnóstico Fisioterapêutico:</label>
															<textarea class="form-control" rows="2" name="diag_fisio_paciente"></textarea>
														</div>

													</div>
												</div>

												<hr>
												<div class="row mb-3">
													<div class="col-lg-12 col-md-12 col-sm-12 col-12">
														<h4 class="card card-title p-2">Avaliação do paciente:</h4>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">Queixa do Paciente :</label>
															<textarea class="form-control" rows="1" name="queixa_paciente"></textarea>
														</div>

													</div>
													<div class="col-lg-4 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">HMA :</label>
															<textarea class="form-control" rows="1" name="hma_paciente"></textarea>
														</div>

													</div>
													<div class="col-lg-4 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">Tratamento Realizado :</label>
															<textarea class="form-control" rows="1" name="trata_realizado_paciente"></textarea>
														</div>

													</div>
												</div>


												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Estado do Paciente:</label>
														<div class="form-group">
															<?php
															$querySelecEstadoP = "SELECT * FROM estado_paciente";
															$result_estadoP = mysqli_query($mysqli, $querySelecEstadoP);

															while ($row_result_estadoP = mysqli_fetch_array($result_estadoP)) {

																$nomeEstado = $row_result_estadoP['nome_estado'];
																$codEstado = $row_result_estadoP['cod_estado'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codEstado; ?>" name="estado_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeEstado; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>



												<div class="row">
													<div class="col-lg-2 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Exames :</label>
														<div class="form-group">
															<div class="form-check form-check-inline" style="margin-left: 10px;">
																<input class="form-check-input" type="checkbox" id="exameSim" onclick="exmeSim()">
																<label class="form-check-label" for="inlineRadio1">Sim</label>
															</div>
															<div class="form-check form-check-inline" style="margin-left: 10px; border-radius:50px">
																<input class="form-check-input" type="checkbox" id="exameNao" onclick="exmeNao()">
																<label class="form-check-label" for="inlineRadio2">Não</label>
															</div>
														</div>

													</div>

													<div class="col-lg-4 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">Descrição :</label>
															<textarea class="form-control" rows="1" id="desc_exame" disabled name="desc_exame_paciente"></textarea>
														</div>
													</div>


													<div class="col-lg-2 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Medicamentos :</label>
														<div class="form-group">
															<div class="form-check form-check-inline" style="margin-left: 10px;">
																<input class="form-check-input" type="checkbox" id="medicamentoSim" onclick="medSim()">
																<label class="form-check-label" for="inlineRadio3">Sim</label>
															</div>
															<div class="form-check form-check-inline" style="margin-left: 10px;">
																<input class="form-check-input" type="checkbox" id="medicamentoNao" onclick="medNao()">
																<label class="form-check-label" for="inlineRadio4">Não</label>
															</div>
														</div>

													</div>

													<div class="col-lg-4 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">Descrição :</label>
															<textarea class="form-control" rows="1" disabled name="desc_medicamento_paciente" id="desc_medicamento_paciente"></textarea>
														</div>

													</div>




												</div>

												<div class="row">
													<div class="col-lg-2 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Cirurgia :</label>
														<div class="form-group">
															<div class="form-check form-check-inline" style="margin-left: 10px;">
																<input class="form-check-input" type="checkbox" id="cirurgiaSim" onclick="ciruSim()">
																<label class="form-check-label" for="inlineRadio5">Sim</label>
															</div>
															<div class="form-check form-check-inline" style="margin-left: 10px;">
																<input class="form-check-input" type="checkbox" id="cirurgiaNao" onclick="ciruNao()">
																<label class="form-check-label" for="inlineRadio6">Não</label>
															</div>
														</div>

													</div>

													<div class="col-lg-10 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label style="font-weight: bold;">Descrição :</label>
															<textarea class="form-control" rows="1" disabled name="desc_cirurgia_paciente" id="desc_cirurgia_paciente"></textarea>
														</div>

													</div>
												</div>



												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Inspeção/Palpação :</label>
														<div class="form-group">
															<?php
															$querySelecEstadoP = "SELECT * FROM inspecao";
															$result_estadoP = mysqli_query($mysqli, $querySelecEstadoP);

															while ($row_result_estadoP = mysqli_fetch_array($result_estadoP)) {
																$codInspecao = $row_result_estadoP['cod_inspecao'];
																$nomeInspecao = $row_result_estadoP['nome_inspecao'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codInspecao; ?>" name="inspecao_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeInspecao; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">intensidade da Dor :</label>
														<div class="form-group">
															<img src="assets/img/EVA-2.png" alt="EVA" style="width: 100%;">
														</div>

													</div>
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<?php

															for ($i = 0; $i < 11; $i++) {


															?>
																<div class="form-check form-check-inline" style="margin-left: 14px; top:-15px">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $i; ?>" name="eva_paciente">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo "Grau " . $i; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>


												<hr>
												<div class="row mb-3">
													<div class="col-lg-12 col-md-12 col-sm-12 col-12">
														<h4 class="card card-title p-2">Plano Terapêutico:</h4>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Classificação do paciente :</label>
														<div class="form-group">
															<?php
															$querySelecClassificacaoP = "SELECT * FROM classificacao_paciente";
															$result_classificacaoP = mysqli_query($mysqli, $querySelecClassificacaoP);

															while ($row_result_classificacaoP = mysqli_fetch_array($result_classificacaoP)) {
																$codClassificacao = $row_result_classificacaoP['cod_classificacao'];
																$nomeClassificao = $row_result_classificacaoP['nome_classificacao'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codClassificacao; ?>" name="classificacao_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeClassificao; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>



												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Tratamentos :</label>
														<div class="form-group">
															<?php
															$querySelecTratamentoP = "SELECT * FROM tratamento_paciente";
															$result_TratamentoP = mysqli_query($mysqli, $querySelecTratamentoP);

															while ($row_result_tratamentoP = mysqli_fetch_array($result_TratamentoP)) {
																$codTratamento = $row_result_tratamentoP['cod_tratamento'];
																$nomeTratamento = $row_result_tratamentoP['nome_tratamento'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codTratamento; ?>" name="tratamento_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeTratamento; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 col-md-6 col-sm-6 col-12">
														<label style="font-weight: bold;">Recursos Terapêuticos :</label>
														<div class="form-group">
															<?php
															$querySelecRecursoTratamento = "SELECT * FROM recurso_tratamento";
															$result_RecursoTratamento = mysqli_query($mysqli, $querySelecRecursoTratamento);

															while ($row_result_recurso_tratamento = mysqli_fetch_array($result_RecursoTratamento)) {
																$codRecTratamento = $row_result_recurso_tratamento['cod_recurso'];
																$nomeRecTratamento = $row_result_recurso_tratamento['nome_recurso'];

															?>
																<div class="form-check form-check-inline" style="margin-left: 10px;">
																	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codRecTratamento; ?>" name="recurso_paciente[]">
																	<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeRecTratamento; ?> </label>
																</div>


															<?php     }    ?>

														</div>

													</div>
												</div>




												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-12">
														<div class="form-group text-center custom-mt-form-group">
															<button class="btn btn-primary mr-2" type="button" id="btn_cadstro">Salvar</button>
															<button class="btn btn-secondary" type="reset">Cancelar</button>
														</div>
													</div>
												</div>


											</form>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
										<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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

	<!-- SCRIPT PARA CASDATRO DO PACIENTE E VALIDAÇÃO DO FORMULARIO -->
	<script src="assets/js/cadastro-paciente.js"></script>


	<!-- SCRIPT PARA COLOCAR MASCARA NOS CAMPOS -->
	<script src="assets/js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
	<!-- COLOCANDO MASCARA NO FOMRULARIO -->
	<script>
		$(document).ready(function() {
			$('#cpf').mask('000.000.000-00', {
				placeholder: '___.___.___-___'
			});

			$('#telefone').mask('(00) 00000-0000', {
				placeholder: '(__) ____-____'
			});


		})
	</script>


</body>

</html>