<?php
session_start();
include('View/autentication/login-invalid.php');
include_once('./db/db-conection.php');

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>System Fisio - Sobre o Paciente </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

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
						<a href="index.html" class="logo">
							<img src="assets/img/logo1.png" width="40" height="40" alt="">
							<span class="text-success" style="font-family: sans-serif pridi regular;">System Fisio</span>
						</a>
					</div>
					<ul class="sidebar-ul">
						<li class="menu-title">Menu</li>
						<li>
							<a href="index.php"><img src="assets/img/sidebar/icon-6.png" alt="icon"><span>Agenda</span></a>
						</li>
						<li class="submenu">
							<a href="#" class="active"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span> Pacientes</span><span class="menu-arrow"></span></a>
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
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<h5 class="text-uppercase mb-0 mt-0 page-title">Sobre o Paciente</h5>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<ul class="breadcrumb float-right p-0 mb-0">
								<li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
								<li class="breadcrumb-item"><a href="all-pacientes.php">Pacientes</a></li>
								<li class="breadcrumb-item"><span> Sobre o Paciente</span></li>
							</ul>
						</div>
					</div>
				</div>

				<?php

				$codPacienteForm = isset($_POST['codPaciente']) ? $_POST['codPaciente'] : null;
				//== QUERY DE TODOS OS DADOS DO PACIENTE ===
				$querySelectPaciente = "SELECT * FROM pacientes p join avaliacao_paciente a on a.ordem_paciente = p.cod_paciente  WHERE cod_paciente = '$codPacienteForm'  ORDER BY nome_paciente";

				$queryResultPaciente = $mysqli->query($querySelectPaciente);

				if (mysqli_affected_rows($mysqli) > 0) {



					while ($row_cont_paciente = mysqli_fetch_array($queryResultPaciente)) {
						$codPaciente = $row_cont_paciente['cod_paciente'];
						$nomePaciente = $row_cont_paciente['nome_paciente'];
						$susPaciente = $row_cont_paciente['sus_paciente'];
						$sexoPaciente = $row_cont_paciente['sexo_paciente'];
						$cpfPaciente = $row_cont_paciente['cpf_paciente'];
						$dataNascPacienteBd = $row_cont_paciente['data_nasc_paciente'];

						$dataNascPaciente = preg_replace('/[mm]/', '', $dataNascPacienteBd);
						$dataNascPaciente = DateTime::createFromFormat("Y-m-d", $dataNascPaciente);
						$dataNascPaciente = $dataNascPaciente->format("d/m/Y");

						$date = new DateTime($dataNascPacienteBd);
						$interval = $date->diff(new DateTime(date('Y-m-d')));
						$idadePaciente =  $interval->format('%Y');



						$telefonePaciente = $row_cont_paciente['telefone_paciente'];
						$ruaPaciente = $row_cont_paciente['rua_paciente'];
						$bairroPaciente = $row_cont_paciente['bairro_paciente'];
						$profissaoPaciente = $row_cont_paciente['profissao_paciente'];
						$etniaPaciente = $row_cont_paciente['etnia_paciente'];

						$diagMedPeciente = $row_cont_paciente['diag_medico_paciente'];
						$cidPeciente = $row_cont_paciente['cid_paciente'];

						$diagFisioPeciente = $row_cont_paciente['diag_fisio_paciente'];

						$dataCadPaciente = $row_cont_paciente['data_cad_paciente'];

						$dataCadPaciente = preg_replace('/[mm]/', '', $dataCadPaciente);
						$dataCadPaciente = DateTime::createFromFormat("Y-m-d", $dataCadPaciente);
						$dataCadPaciente = $dataCadPaciente->format("m/Y");

						$codAvaliacao = $row_cont_paciente['cod_avaliacao'];
					}
				}


				?>





				<div class="content-page">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="aboutprofile-sidebar">
								<div class="row">
									<div class="col-lg-4 col-md-12 col-sm-12 col-12">
										<div class="aboutprofile">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-12">
															<div class="aboutprofile-pic">
																<img class="card-img-top" src="assets/img/user-06.jpg" alt="Card image">
															</div>
															<div class="aboutprofile-name">
																<h5 class="text-center mt-2"><?php echo $nomePaciente; ?></h5>
																<p class="text-center">paciente: <?php echo $codPaciente; ?></p>
															</div>
															<ul class="list-group list-group-flush">
																<li class="list-group-item"><b>Sexo</b><a href="#" class="float-right"><?php if ($sexoPaciente == "M") {
																																			echo "Masculino";
																																		} else {
																																			echo "Feminino";
																																		}  ?></a></li>


																<?php
																if ($susPaciente) { ?>
																	<li class="list-group-item"><b>SUS</b><a href="#" class="float-right"><?php echo $susPaciente; ?></a></li>
																<?php } ?>

																<?php
																if ($cpfPaciente) { ?>
																	<li class="list-group-item"><b>CPF</b><a href="#" class="float-right"><?php echo $cpfPaciente; ?></a></li>
																<?php }

																?>

																<li class="list-group-item"><b>Idade</b><a href="#" class="float-right"><?php echo $dataNascPaciente; ?> - <?php echo $idadePaciente; ?> anos</a></li>
																<?php
																if ($telefonePaciente) { ?>
																	<li class="list-group-item"><b>Telefone</b><a href="#" class="float-right"><?php echo $telefonePaciente; ?></a></li>
																<?php } ?>

																<?php
																if ($ruaPaciente and $bairroPaciente) { ?>
																	<li class="list-group-item"><b>Endereço</b><a href="#" class="float-right"><?php echo $ruaPaciente . " - " . $bairroPaciente; ?></a></li>
																<?php } ?>

																<?php
																if ($profissaoPaciente) { ?>
																	<li class="list-group-item"><b>Profissão</b><a href="#" class="float-right"><?php echo $profissaoPaciente; ?></a></li>
																<?php } ?>

																<?php
																if ($etniaPaciente) { ?>
																	<li class="list-group-item"><b>Etnia</b><a href="#" class="float-right"><?php echo $etniaPaciente; ?></a></li>
																<?php } ?>

																<li class="list-group-item"><b>Data do Cadastro</b><a href="#" class="float-right"><?php echo $dataCadPaciente; ?></a></li>

															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="aboutprofile-address mt-4">
											<div class="card">
												<div class="card-header">
													<h4 class="page-title">Diagnóstico Médico </h4>
												</div>
												<div class="card-body">
													<h5>cid: <?php if ($cidPeciente) {
																	echo $cidPeciente;
																} ?></h5>
													<p><?php if ($diagMedPeciente) {
															echo $diagMedPeciente;
														} ?></p>
												</div>
											</div>
										</div>

										<div class="aboutprofile-address mt-4">
											<div class="card">
												<div class="card-header">
													<h4 class="page-title">Diagnóstico Fisioterapêutico </h4>
												</div>
												<div class="card-body">
													<p><?php if ($diagFisioPeciente) {
															echo $diagFisioPeciente;
														} ?></p>
												</div>
											</div>
										</div>
										<div class="aboutme-profile">
											<div class="card">
												<div class="card-header">
													<h4 class="page-title">Sobre o Agendamento </h4>
												</div>
												<div class="card-body">
													<p>Hello I am Michael V. Buttars .Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><b>ID</b><a href="#" class="float-right">FD-00d1</a></li>
														<li class="list-group-item"><b>Gender</b><a href="#" class="float-right">Male</a></li>
														<li class="list-group-item"><b>Seminors Done</b><a href="#" class="float-right">30+</a></li>
														<li class="list-group-item"><b>Degree</b><a href="#" class="float-right">P.H.D</a></li>
														<li class="list-group-item"><b>Desgination</b><a href="#" class="float-right">Maths Teacher</a></li>
														<li class="list-group-item"><b>Joining Date</b><a href="#" class="float-right">16/09/2018</a></li>
													</ul>
													<div class="aboutme-start">
														<div class="row">
															<div class="col-lg-4 col-md-6 col-4">
																<div class="aboutme-starttitle text-uppercase">
																	37
																</div>
																<div class="aboutme-startname text-uppercase">
																	Presenças
																</div>
															</div>
															<div class="col-lg-4 col-md-6 col-4">
																<div class="aboutme-starttitle text-uppercase">
																	52
																</div>
																<div class="aboutme-startname text-uppercase">
																	Faltas
																</div>
															</div>
															<div class="col-lg-4 col-md-6 col-4">
																<div class="aboutme-starttitle text-uppercase">
																	50
																</div>
																<div class="aboutme-startname text-uppercase">
																	Total de Sessões
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="aboutme-profile">
											<div class="card">
												<div class="card-header">
													<h4 class="page-title">Evolução do Paciente </h4>
												</div>
												<div class="card-body">
													<ul class="list-group list-group-flush mb-2">
														<li class="list-group-item"><b>Data </b><a href="#" class="float-right">16/09/2018</a></li>
														<li class="list-group-item"><b>Fisioterapeuta</b><a href="#" class="float-right">Gaby</a></li>
													</ul>
													<h5>Resultados:</h5>
													<p>Hello I am Michael V. Buttars .Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><b>Estado de Saúde </b><a href="#" class="float-right">FD-00d1</a></li>
														<li class="list-group-item"><b>Conduta Aplicada</b><a href="#" class="float-right">Male</a></li>
														<li class="list-group-item"><b>Intercorrências</b><a href="#" class="float-right">30+</a></li>
														<li class="list-group-item"></li>
													</ul>
												</div>

												<div class="card-body">
													<ul class="list-group list-group-flush mb-2">
														<li class="list-group-item"><b>Data </b><a href="#" class="float-right">16/09/2018</a></li>
														<li class="list-group-item"><b>Fisioterapeuta</b><a href="#" class="float-right">Gaby</a></li>
													</ul>
													<h5>Resultados:</h5>
													<p>Hello I am Michael V. Buttars .Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><b>Estado de Saúde </b><a href="#" class="float-right">FD-00d1</a></li>
														<li class="list-group-item"><b>Conduta Aplicada</b><a href="#" class="float-right">Male</a></li>
														<li class="list-group-item"><b>Intercorrências</b><a href="#" class="float-right">30+</a></li>
														<li class="list-group-item"></li>
													</ul>
												</div>


											</div>
										</div>
										<div class="aboutprofile-address mt-4">
											<div class="card">
												<div class="card-header">
													<h4 class="page-title">Address</h4>
												</div>
												<div class="card-body">
													<address class="text-center">
														4850 Edgewood Road <br>
														Washington, AR 71862
													</address>
												</div>
											</div>
										</div>
									</div>


									<div class="col-lg-8 col-md-12 col-sm-12 col-12">
										<div class="profile-content">
											<div class="row">
												<div class="col-lg-12">
													<div class="card">

														<div class="card-header">
															<span class="page-title">Histórico do paciente</span>
															<a href="#" class="btn btn-primary btn-rounded float-right btn_nova_av" codpaciente="<?= $codPacienteForm; ?>" data-toggle="modal" data-target="#add_new_event"><i class="fas fa-plus"></i> Nova avaliação</a>
														</div>

														<div class="row">
															<div class="col-md-12">

																<div class="card-body">
																	<ul class="nav nav-tabs">

																		<?php
																		//* === BUSCA TODAS AS AVALIAÇÕES DO PACIENTE == -->
																		$contAv = 1;
																		$queryAv = "SELECT * FROM  avaliacao_paciente where ordem_paciente = '$codPaciente'";
																		$result_queryAv = $mysqli->query($queryAv);
																		while ($row_cont_avaliacao = mysqli_fetch_array($result_queryAv)) {

																			$codAv = $row_cont_avaliacao['cod_avaliacao'];

																			// ? Ativar somente a primeira tabs 
																			if ($contAv == 1) {
																				$active = 'active';
																			} else {
																				$active = '';
																			}

																		?>

																			<li class="nav-item"><a class="nav-link <?= $active ?>" href="#av<?= $codAv; ?>" data-toggle="tab"> Av <?= $contAv; ?></a></li>

																		<?php $contAv++;
																		} ?>
																		<!-- <li class="nav-item"><a class="nav-link" href="#av02" data-toggle="tab">Av 02</a></li>
																		<li class="nav-item"><a class="nav-link" href="#basictab3" data-toggle="tab">Av 03</a></li> -->
																	</ul>
																	<div class="tab-content">
																		<?php
																		//* === BUSCA TODAS AS AVALIAÇÕES DO PACIENTE == -->
																		$contAv = 1;
																		$queryAv = "SELECT * FROM  avaliacao_paciente ap join profissionais pr on ap.ordem_profissional = pr.cod_profissional where ordem_paciente = '$codPaciente' ";
																		$result_queryAv = $mysqli->query($queryAv);
																		while ($row_cont_avaliacao = mysqli_fetch_array($result_queryAv)) {

																			$codAv = $row_cont_avaliacao['cod_avaliacao'];
																			// ? Ativar somente a primeira tabs 
																			if ($contAv == 1) {
																				$active = 'active';
																			} else {
																				$active = '';
																			}

																			//*AVALIAÇÃO 


																			$codProfissional =  $row_cont_avaliacao['cod_profissional'];
																			$profissional = $row_cont_avaliacao['nome_profissional'];
																			$diagMedPaciente = $row_cont_avaliacao['diag_medico_paciente'];
																			$cidPaciente = $row_cont_avaliacao['cid_paciente'];
																			$diagFisioPaciente = $row_cont_avaliacao['diag_fisio_paciente'];

																			$queixaPaciente = $row_cont_avaliacao['qp_paciente'];
																			$hmaPaciente = $row_cont_avaliacao['hma_paciente'];
																			$tramRealizadoPaciente = $row_cont_avaliacao['tratamento_realizado'];

																			$examePaciente = $row_cont_avaliacao['exames'];
																			$medPaciente = $row_cont_avaliacao['medicamentos'];
																			$cirurgiaPaciente = $row_cont_avaliacao['cirurgia'];

																			$eva_paciente = $row_cont_avaliacao['eva_paciente'];




																		?>
																			<div class="tab-pane show  <?= $active; ?>" id="av<?= $codAv ?>">


																				<div class="row " >
																					<div class="col-6">Avaliação <?= $codAv ?></div>																					
																						
																						<div class="col-sm-4 col-4 text-right ">
																							<div class="btn-group btn-group-sm">	
																																																																					
																								<a href="View/Prints/print-avaliacao-paciente.php?codPaciente=<?= $codPaciente ?>&codAvaliacao=<?= $codAv  ?>" target="_blank" class="btn btn-white"><i class="fas fa-print fa-lg"></i> Imprimir</a>
																								
																							</div>
																						</div>
																					

																					<div class="col-2   text-right">
																						<button type="submit" name="cod-paciente" value="<?php echo $codPaciente; ?>" class="btn btn-primary btn-sm mb-2">
																							<i class="far fa-edit"></i>
																						</button>

																						<button data-toggle="modal" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1 btn_delete">
																							<i class="far fa-trash-alt"></i>
																						</button>
																					</div>

																				</div>

																				<?php


																				$querySelAvaliacao = "SELECT * FROM  avaliacao_paciente ap join profissionais pf on pf.cod_profissional = ap.ordem_profissional WHERE cod_avaliacao ='$codAv' ";
																				$queryResultAv = $mysqli->query($querySelAvaliacao);

																				while ($row_cont_avaliacao = mysqli_fetch_array($queryResultAv)) {

																					$codAvaliacao = $row_cont_avaliacao['cod_avaliacao'];
																					$codProfissional = $row_cont_avaliacao['cod_profissional'];
																					$nomeFisio = $row_cont_avaliacao['nome_profissional'];

																					$diagMedPaciente = $row_cont_avaliacao['diag_medico_paciente'];
																					$cidPaciente = $row_cont_avaliacao['cid_paciente'];
																					$diagFisioPaciente = $row_cont_avaliacao['diag_fisio_paciente'];


																					$sexoFisio = $row_cont_avaliacao['sexo'];
																					if ($sexoFisio == 'M') {
																						$sexoFisio = "Masculino";
																					} else {
																						$sexoFisio = "Feminina";
																					}
																					$qpPaciente = $row_cont_avaliacao['qp_paciente'];
																					$hmaPaciente = $row_cont_avaliacao['hma_paciente'];
																					$tratamentoPaciente = $row_cont_avaliacao['tratamento_realizado'];
																					$examePaciente = $row_cont_avaliacao['exames'];
																					$medicamentoPaciente = $row_cont_avaliacao['medicamentos'];
																					$cirurgiaPaciente = $row_cont_avaliacao['cirurgia'];
																					$evaPaciente = $row_cont_avaliacao['eva_paciente'];
																				}

																				// ======= condição para definir a quandidade de dor que o paciente esta sentindo ============
																				if ($evaPaciente > '0' and $evaPaciente <= '2') {
																					$evaPaciente = "Dor Leve";
																				} else if ($evaPaciente > '2' and $evaPaciente <= '7') {
																					$evaPaciente = "Dor Moderada";
																				} else if ($evaPaciente > '7' and $evaPaciente <= '10') {
																					$evaPaciente = "Dor Intensa";
																				} else {
																					$evaPaciente = "";
																				}


																				?>


																				<form class="form_ed">
																					<div class="row ">
																						<div class="col-lg-6 col-md-6 col-sm-6 col-12  " style="margin:  auto;">
																							<div class="form-group">
																								<label>Fisioterapeuta: <span id="alert_fisio"></span> </label>
																								<!-- <input class="form-control" type="text" value="<?= $nomeFisio; ?>"> -->
																								<select class="form-control" name="fisio" id="fisio" disabled>
																									<option value="<?php echo $codProfissional; ?>" selected><?php echo $nomeFisio; ?></option>
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
																						<div class="col-lg-4">
																							<input type="hidden" class="form-control" value="<?= $codPaciente ?>" name="cod_paciente">
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-lg-4">
																							<input type="hidden" class="form-control" value="<?= $codAv ?>" name="cod_avaliacao">
																						</div>
																					</div>

																					<div class="row">
																						<div class="col-lg-4 col-md-6 col-sm-6 col-8">
																							<div class="form-group">
																								<label>Diagnóstico Médico:</label>
																								<textarea class="form-control" rows="2" name="diag_medico_paciente" id="diag_medico_paciente" disabled><?php echo $diagMedPaciente; ?></textarea>
																							</div>

																						</div>

																						<div class="col-lg-4 col-md-6 col-sm-6 col-4">
																							<div class="form-group">
																								<label>cid:</label>
																								<input type="text" value="<?php echo $cidPaciente; ?>" class="form-control" name="cid_paciente" disabled>
																							</div>

																						</div>

																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Diagnóstico Fisioterapêutico:</label>
																								<textarea class="form-control" rows="2" name="diag_fisio_paciente" disabled><?php echo $diagFisioPaciente; ?></textarea>
																							</div>

																						</div>
																					</div>

																					<div class="row">
																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Queixa do Paciente :</label>
																								<textarea class="form-control" rows="2" name="queixa_paciente" disabled><?php echo $queixaPaciente; ?></textarea>
																							</div>

																						</div>
																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>HMA :</label>
																								<textarea class="form-control" rows="2" name="hma_paciente" disabled><?php echo $hmaPaciente; ?></textarea>
																							</div>

																						</div>
																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Tratamento Realizado :</label>
																								<textarea class="form-control" rows="2" name="trata_realizado_paciente" disabled><?php echo $tramRealizadoPaciente; ?></textarea>
																							</div>

																						</div>
																					</div>

																					<div class="row">
																						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
																							<label>Estado do Paciente:</label>
																							<div class="form-group">

																								<?php

																								//*MOSTRAR TODOS OS ESTADOS QUE O PACIENTE NÃO ESTA

																								$queryEstado = "SELECT * FROM estado_paciente order by cod_estado ";
																								$resultEstado = mysqli_query($mysqli, $queryEstado);

																								//*Para mostra todos os estados cadastrados																						

																								while ($row_estado = mysqli_fetch_array($resultEstado)) {

																									$codEstado = $row_estado['cod_estado'];
																									$nomeEstado = $row_estado['nome_estado'];




																									//* Buscar somente os estado que esta cadastrado na tabela tipo_estado_paciente, se encontrar algum marca se não não marca
																									$queryTipoEstado = "SELECT * FROM tipo_estado_paciente where ordem_estado = '$codEstado' and ordem_avaliacao = '$codAv'";
																									$result = $mysqli->query($queryTipoEstado);

																									if (mysqli_affected_rows($mysqli) > 0) {

																										$select = "checked";
																									} else {
																										$select = "";
																									}

																								?>

																									<div class="form-check form-check-inline" style="margin-left: 10px;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codEstado; ?>" name="estado_paciente[]" <?= $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeEstado; ?> </label>
																									</div>

																								<?php } ?>
																							</div>

																						</div>
																					</div>


																					<div class="row">
																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Exames :</label>
																								<textarea class="form-control" rows="1" id="desc_exame" name="desc_exame_paciente" disabled><?php echo $examePaciente; ?></textarea>
																							</div>
																						</div>

																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Medicamentos :</label>
																								<textarea class="form-control" rows="1" name="desc_medicamento_paciente" id="desc_medicamento_paciente" disabled> <?php echo $medPaciente; ?></textarea>
																							</div>

																						</div>

																						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
																							<div class="form-group">
																								<label>Cirurgias :</label>
																								<textarea class="form-control" rows="1" name="desc_cirurgia_paciente" id="desc_cirurgia_paciente" disabled><?php echo $cirurgiaPaciente; ?></textarea>
																							</div>

																						</div>

																					</div>

																					<div class="row">
																						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
																							<label style="font-weight: bold;">Inspeção/Palpação :</label>
																							<div class="form-group">

																								<?php

																								//*MOSTRAR TODOS OS ESTADOS QUE O PACIENTE NÃO ESTA
																								$queryInspecao = "SELECT * FROM inspecao order by cod_inspecao ";
																								$resultInspecao = mysqli_query($mysqli, $queryInspecao);

																								//*Para mostra todos os estados cadastrados																						

																								while ($row_inspecao = mysqli_fetch_array($resultInspecao)) {

																									$codInspencao = $row_inspecao['cod_inspecao'];
																									$nomeinspecao = $row_inspecao['nome_inspecao'];




																									//* Buscar somente os estado que esta cadastrado na tabela tipo_inspecao_paciente, se encontrar algum marca se não não marca
																									$querySelecInspecaoP = "SELECT * FROM tipo_inspecao ti join avaliacao_paciente ap on ap.cod_avaliacao = ti.ordem_avaliacao join inspecao i on i.cod_inspecao = ti.ordem_inspecao where ordem_inspecao = '$codInspencao' and ordem_avaliacao = '$codAv'";
																									$result_inspecaoP = mysqli_query($mysqli, $querySelecInspecaoP);

																									if (mysqli_affected_rows($mysqli) > 0) {

																										$select = "checked";
																									} else {
																										$select = "";
																									}

																								?>

																									<div class="form-check form-check-inline" style="margin-left: 10px;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codInspencao; ?>" name="inspecao_paciente[]" <?= $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeinspecao; ?> </label>
																									</div>

																								<?php } ?>
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


																								$grau = "";
																								for ($i = 0; $i < 11; $i++) {

																									// if($i > 0 and $i <= 2){
																									// 	$grau = "Dor Leve";

																									// }
																									// if($i > 2 and $i <= 7){
																									// 	$grau = "Dor Moderada";
																									// }
																									//  if($i > 7 and $i <= 10){
																									// 	$grau = "Dor Intensa";
																									// }

																									if ($eva_paciente == $i) {
																										$select = "checked";
																									} else {
																										$select = "";
																									}



																								?>

																									<div class="form-check form-check-inline" style="margin-left: 14px; margin-right:28px; top:-20px; position:relative;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $i; ?>" name="eva_paciente" <?php echo $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $i; ?> </label>
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

																								//*MOSTRAR CLASSIFICAÇÃO DO PACIENTE
																								$queryClassificao = "SELECT * FROM classificacao_paciente order by cod_classificacao ";
																								$resultClassificacao = mysqli_query($mysqli, $queryClassificao);

																								//*Para mostra todos os estados cadastrados																						

																								while ($row_classificao = mysqli_fetch_array($resultClassificacao)) {

																									$codClassificacao = $row_classificao['cod_classificacao'];
																									$nomeClassificacao = $row_classificao['nome_classificacao'];




																									//* Buscar somente as classificacao que esta cadastrado na tabela tipo_classificao_paciente, se encontrar algum marca se não não marca
																									$queryClassificao = "SELECT * FROM tipo_classificacao_paciente tcpp join avaliacao_paciente ap on ap.cod_avaliacao = tcpp.ordem_avaliacao  where ordem_classificacao = '$codClassificacao' and ordem_avaliacao = '$codAv'";
																									$result_classificao = mysqli_query($mysqli, $queryClassificao);

																									if (mysqli_affected_rows($mysqli) > 0) {

																										$select = "checked";
																									} else {
																										$select = "";
																									}

																								?>

																									<div class="form-check form-check-inline" style="margin-left: 10px;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codClassificacao; ?>" name="classificacao_paciente[]" <?= $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeClassificacao; ?> </label>
																									</div>

																								<?php } ?>
																							</div>

																						</div>
																					</div>

																					<div class="row">
																						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
																							<label style="font-weight: bold;">Tratamentos :</label>
																							<div class="form-group">

																								<?php

																								//*MOSTRAR tratamento DO PACIENTE
																								$queryTratamento = "SELECT * FROM tratamento_paciente order by cod_tratamento ";
																								$resultTratamento = mysqli_query($mysqli, $queryTratamento);

																								//*Para mostra todos os estados cadastrados																						

																								while ($row_tratamento = mysqli_fetch_array($resultTratamento)) {

																									$codTratamento = $row_tratamento['cod_tratamento'];
																									$nomeTratamento = $row_tratamento['nome_tratamento'];




																									//* Buscar somente as tratamento que esta cadastrado na tabela tipo_classificao_paciente, se encontrar algum marca se não não marca
																									$queryTratamento = "SELECT * FROM tipo_tratamento_paciente ttp join avaliacao_paciente ap on ap.cod_avaliacao = ttp.ordem_avaliacao  where ordem_tratamento = '$codTratamento' and ordem_avaliacao = '$codAv'";
																									$result_Tratamento = mysqli_query($mysqli, $queryTratamento);

																									if (mysqli_affected_rows($mysqli) > 0) {

																										$select = "checked";
																									} else {
																										$select = "";
																									}

																								?>

																									<div class="form-check form-check-inline" style="margin-left: 10px;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codTratamento; ?>" name="tratamento_paciente[]" <?= $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeTratamento; ?> </label>
																									</div>

																								<?php } ?>
																							</div>

																						</div>
																					</div>

																					<div class="row">
																						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
																							<label style="font-weight: bold;">Recursos Terapêuticos :</label>
																							<div class="form-group">

																								<?php

																								//*MOSTRAR Recursos Terapêuticos DO PACIENTE
																								$queryRecursoTratamento = "SELECT * FROM recurso_tratamento order by cod_recurso ";
																								$resultRecursoTratamento = mysqli_query($mysqli, $queryRecursoTratamento);

																								//*Para mostra todos os estados cadastrados																						

																								while ($row_recurso_tratamento = mysqli_fetch_array($resultRecursoTratamento)) {

																									$codRecursoTratamento = $row_recurso_tratamento['cod_recurso'];
																									$nomeRecursoTratamento = $row_recurso_tratamento['nome_recurso'];




																									//* Buscar somente as classificacao que esta cadastrado na tabela tipo_classificao_paciente, se encontrar algum marca se não não marca
																									$queryRecursoTratamento = "SELECT * FROM tipo_recurso_tratamento tcpp join avaliacao_paciente ap on ap.cod_avaliacao = tcpp.ordem_avaliacao  where ordem_recurso = '$codRecursoTratamento' and ordem_avaliacao = '$codAv'";
																									$result_recursoTratamento = mysqli_query($mysqli, $queryRecursoTratamento);

																									if (mysqli_affected_rows($mysqli) > 0) {

																										$select = "checked";
																									} else {
																										$select = "";
																									}

																								?>

																									<div class="form-check form-check-inline" style="margin-left: 10px;">
																										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $codRecursoTratamento; ?>" name="recurso_paciente[]" <?= $select; ?> disabled>
																										<label class="form-check-label" for="inlineCheckbox1 "><?php echo $nomeRecursoTratamento; ?> </label>
																									</div>

																								<?php } ?>
																							</div>

																						</div>
																					</div>


																					<div class="row" style="display: none;">
																						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																							<div class="form-group text-center custom-mt-form-group">
																								<button class="btn btn-primary mr-2  btn_edit_avaliacao" type="button">Salvar alterações</button>
																								<!-- <button class="btn btn-secondary" type="reset">Cancelar</button> -->
																							</div>
																						</div>
																					</div>


																				</form>



																			</div>



																		<?php $contAv++;
																		} ?>


																	</div>
																</div>

															</div>
														</div>








														<!-- <div class="card-body">
															<div id="biography" class="biography">
																<div class="row">
																	<div class="col-md-3 col-6"> <strong>Fisioterapeuta </strong>
																		<p class="text-muted"><?php echo $nomeFisio; ?></p>
																	</div>
																	<div class="col-md-3 col-6"> <strong>Sexo</strong>
																		<p class="text-muted"><?php echo $sexoFisio; ?></p>
																	</div>
																	<div class="col-md-3 col-6"> <strong>Email</strong>
																		<p class="text-muted"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="82efebe1eae3e7eef4e0f7f6f6e3f0f1c2e7fae3eff2eee7ace1edef">[email&#160;protected]</a></p>
																	</div>
																	<div class="col-md-3 col-6"> <strong>Location</strong>
																		<p class="text-muted">USA</p>
																	</div>
																</div>

																<h4>Situação</h4>
																<hr>
																<div class="row">
																	<?php
																	$querySelSituacao = "SELECT * FROM  tipo_situacao_paciente tsp join situacao_paciente sp on sp.cod_situacao = tsp.ordem_situacao WHERE tsp.ordem_paciente ='$codPaciente' ";
																	$queryResultSit = $mysqli->query($querySelSituacao);

																	while ($row_cont_situacao = mysqli_fetch_array($queryResultSit)) {
																		$nomeSituacao = $row_cont_situacao['nome_situacao'];
																	?>

																		<div class="col-md-3 col-6 mb-3">
																			<p class="text-muted "><?php echo $nomeSituacao; ?></p>
																		</div>

																	<?php 	} ?>


																</div>
																<h4>Classificação </h4>
																<hr>
																<ul class="list-unstyled ">
																	<?php
																	$querySelClassificao = "SELECT * FROM  tipo_classificacao_paciente tcpp join classificacao_paciente cp on cp.cod_classificacao = tcpp.ordem_classificacao WHERE tcpp.ordem_avaliacao ='$codAvaliacao' ";
																	$queryResultClass = $mysqli->query($querySelClassificao);

																	while ($row_cont_class = mysqli_fetch_array($queryResultClass)) {
																		$nomeClassificacao = $row_cont_class['nome_classificacao'];

																	?>
																		<li class="list-item"><?php echo $nomeClassificacao; ?></li>

																	<?php   } ?>

																</ul>




																<h4>Queixa Principal </h4>
																<hr>

																<p class="mb-4"><?php echo $qpPaciente; ?></p>

																<h4>História da Molestia Atual </h4>
																<hr>

																<p class="mb-4"><?php echo $hmaPaciente; ?></p>

																<h4>Tratamento Realizado</h4>
																<hr>

																<p class="mb-4"><?php echo $tratamentoPaciente; ?></p>

																<h4>Exames Realizado</h4>
																<hr>

																<p class="mb-4"><?php echo $examePaciente; ?></p>

																<h4>Medicamentos </h4>
																<hr>

																<p class="mb-4"><?php echo $medicamentoPaciente; ?></p>


																<h4>Cirurgia </h4>
																<hr>

																<p class="mb-4"><?php echo $cirurgiaPaciente; ?></p>



																<h4>Avaliação da Dor </h4>
																<hr>

																<p class="mb-4"><?php echo $evaPaciente; ?></p>


																<h4>Estado</h4>
																<hr>
																<ul class="list-unstyled ">
																	<?php
																	$querySelEstado = "SELECT * FROM  tipo_estado_paciente tep join estado_paciente ep on ep.cod_estado = tep.ordem_estado WHERE tep.ordem_avaliacao ='$codAvaliacao' ";
																	$queryResultEst = $mysqli->query($querySelEstado);

																	while ($row_cont_estado = mysqli_fetch_array($queryResultEst)) {
																		$nomeEstado = $row_cont_estado['nome_estado'];

																	?>
																		<li class="list-item"><?php echo $nomeEstado; ?></li>

																	<?php   } ?>

																</ul>

																<h4>Inspeção</h4>
																<hr>
																<ul class="list-unstyled ">
																	<?php
																	$querySelIsnpecao = "SELECT * FROM  tipo_inspecao tip join inspecao i on i.cod_inspecao = tip.ordem_inspecao WHERE tip.ordem_avaliacao ='$codAvaliacao' ";
																	$queryResultInsp = $mysqli->query($querySelIsnpecao);

																	while ($row_cont_insp = mysqli_fetch_array($queryResultInsp)) {
																		$nomeInspecao = $row_cont_insp['nome_inspecao'];

																	?>
																		<li class="list-item"><?php echo $nomeInspecao; ?></li>

																	<?php   } ?>

																</ul>

																<h4>Tratamento Necessario </h4>
																<hr>
																<ul class="list-unstyled ">
																	<?php
																	$querySelTratamento = "SELECT * FROM  tipo_tratamento_paciente ttp join tratamento_paciente tp on tp.cod_tratamento = ttp.ordem_tratamento WHERE ttp.ordem_avaliacao ='$codAvaliacao' ";
																	$queryResultTrat = $mysqli->query($querySelTratamento);

																	while ($row_cont_trat = mysqli_fetch_array($queryResultTrat)) {
																		$nomeTratamento = $row_cont_trat['nome_tratamento'];

																	?>
																		<li class="list-item"><?php echo $nomeTratamento; ?></li>

																	<?php   } ?>

																</ul>

																<h4>Recursos para o Tratamento </h4>
																<hr>
																<ul class="list-unstyled ">
																	<?php
																	$querySelRecurso = "SELECT * FROM  tipo_recurso_tratamento trt join recurso_tratamento rt on rt.cod_recurso = trt.ordem_recurso WHERE trt.ordem_avaliacao ='$codAvaliacao' ";
																	$queryResultRecu = $mysqli->query($querySelRecurso);

																	while ($row_cont_recurso = mysqli_fetch_array($queryResultRecu)) {
																		$nomeRecurso = $row_cont_recurso['nome_recurso'];

																	?>
																		<li class="list-item"><?php echo $nomeRecurso; ?></li>

																	<?php   } ?>

																</ul>

															</div>
														</div> -->
													</div>
												</div>
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
						<span>Mensagem</span>
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

	<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<script src="assets/js/jquery.slimscroll.js"></script>

	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

	<script src="assets/js/app.js"></script>

	<!-- SCRIPT PARA POP UP -->
	<script src="assets/js/sweetalert2.all.min.js"></script>

	<!-- SCRIPT PARA O PRELOAD DA PAGINA -->
	<script src="assets/js/script-preload.js"></script>

	<!-- SCRIPT PARA CASDATRA NOVA AVALIAÇÃO DO PACIENTE  -->
	<script src="assets/js/cadastro-av-paciente.js"></script>

	<!-- EDITAR AVALIAÇÃO DO PACIENTE -->
	<script src="assets/js/editar-avaliacao.js"></script>




	<!-- MODAL PARA CADASTRAR UMA NOVA AVALIAÇÃO -->
	<div class="modal custom-modal fade" id="add_new_event">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nova avaliação</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form id="form">

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">

									<input type="hidden" class="form-control" rows="1" id="codPaciente" name="cod_paciente" />
								</div>
							</div>
						</div>

						<div class="row ">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12  " style="margin:  auto;">
								<div class="form-group">
									<label>Fisioterapeuta: <span id="alert_fisio"></span> </label>
									<select class="form-control select" name="fisio" id="fisio">
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
							<div class="col-lg-5 col-md-6 col-sm-6 col-8">
								<div class="form-group">
									<label>Diagnóstico Médico:</label>
									<textarea class="form-control" rows="2" name="diag_medico_paciente"> </textarea>
								</div>

							</div>

							<div class="col-lg-3 col-md-6 col-sm-6 col-4">
								<div class="form-group">
									<label>cid:</label>
									<input type="text" class="form-control" name="cid_paciente">
								</div>

							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Diagnóstico Fisioterapêutico:</label>
									<textarea class="form-control" rows="2" name="diag_fisio_paciente"></textarea>
								</div>

							</div>

						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Queixa do Paciente :</label>
									<textarea class="form-control" rows="1" name="queixa_paciente"></textarea>
								</div>

							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>HMA :</label>
									<textarea class="form-control" rows="1" name="hma_paciente"></textarea>
								</div>

							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Tratamento Realizado :</label>
									<textarea class="form-control" rows="1" name="trata_realizado_paciente"></textarea>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<label>Estado do Paciente:</label>
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
							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Exames :</label>
									<textarea class="form-control" rows="1" id="desc_exame" name="desc_exame_paciente"></textarea>
								</div>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Medicamentos:</label>
									<textarea class="form-control" rows="1" name="desc_medicamento_paciente" id="desc_medicamento_paciente"></textarea>
								</div>

							</div>

							<div class="col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Cirurgia :</label>
									<textarea class="form-control" rows="1" name="desc_cirurgia_paciente" id="desc_cirurgia_paciente"></textarea>
								</div>

							</div>

						</div>



						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<label>Inspeção/Palpação :</label>
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
								<label>intensidade da Dor :</label>
								<div class="form-group">
									<img src="assets/img/EVA-2.png" alt="EVA" style="width: 100%;">
								</div>

							</div>
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<?php

									for ($i = 0; $i < 11; $i++) {

									?>
										<div class="form-check form-check-inline" style="margin-left: 35px ; top:-25px">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $i; ?>" name="eva_paciente">
											<!-- <label class="form-check-label" for="inlineCheckbox1 "><?php echo "Grau" . $i; ?> </label> -->
										</div>

									<?php     }   ?>

								</div>

							</div>
						</div>

						<!-- <hr> -->
						<div class="row mb-3">
							<div class="col-lg-3 col-md-12 col-sm-12 col-3">
								<h4 class="card card-title p-2" style="font-weight: bold;">Plano Terapêutico:</h4>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6 col-12">
								<label>Classificação do paciente :</label>
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
								<label>Tratamentos :</label>
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
								<label>Recursos Terapêuticos :</label>
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
									<button class="btn btn-primary mr-2" type="button" id="btn_cadastro_av">Salvar</button>
									<button class="btn btn-secondary" class="close" data-dismiss="modal" aria-hidden="true" type="reset">Cancelar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>








</body>

</html>