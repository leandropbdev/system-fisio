﻿<?php
session_start();
include('View/autentication/login-invalid.php');
include_once('./db/db-conection.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>System Fisio - Pacientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="assets/css/select2.min.css">

	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">




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

		<div class="header-outer ">
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
							<!-- <form action="search.html">
								<input class="form-control" type="text" placeholder="Search here">
								<button class="btn" type="submit"><i class="fa fa-search"></i></button>
							</form> -->
						</div>
					</li>
					<li>
						<a href="index.html" class="mobile-logo d-md-block d-lg-none d-block"><img src="assets/img/logo1.png" alt="" width="30" height="30"></a>
					</li>
				</ul>

				<ul class="nav user-menu float-right">
					<li class="nav-item dropdown d-none d-sm-block">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<img src="assets/img/sidebar/icon-22.png" alt="">
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span>Notificações</span>
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


		<!-- === MENU PRINCIPAL  === -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<div class="header-left">
						<a href="index.php" class="logo">
							<img src="assets/img/logo1.png" width="50" height="50" alt="">
							<span class="text-success" style="font-family: sans-serif pridi regular;">System Fisio</span>
						</a>
					</div>
					<ul class="sidebar-ul ">
						<li class="menu-title">Menu</li>
						<li>
							<a href="index.php"><img src="assets/img/sidebar/icon-6.png" alt="icon"><span>Agenda</span></a>
						</li>
						<li class="submenu">
							<a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span> Pacientes </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled" style="display: none;">
								<li><a class="active" href="all-pacientes.php"><span>Todos os Pacientes</span></a></li>
								<li><a href="add-paciente.php"><span>Adicionar Paciente</span></a></li>

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
							<h5 class="text-uppercase mb-0 mt-0 page-title">
								Todos os pacientes
							</h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<ul class="breadcrumb float-right p-0 mb-0">
								<li class="breadcrumb-item">
									<a href="index.html"><i class="fas fa-home"></i> Home</a>
								</li>
								<li class="breadcrumb-item"><a href="add-paciente.php">Adicionar paciente</a></li>
								<li class="breadcrumb-item"><span> Todos os paciente</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-12"></div>
					<div class="col-sm-8 col-12 text-right add-btn-col">
						<a href="add-paciente.php" class="btn btn-primary btn-rounded float-right"><i class="fas fa-plus"></i> Adicionar Paciente</a>
						<div class="view-icons">
							<!-- <a href="arquivados-desativados.php" class="grid-view btn btn-link"> <i class="fas fa-box"></i> Arquivados/Desativados</a> -->
							<!-- <a href="all-pacientes.php" class="grid-view btn btn-link"><i class="fas fa-th"></i></a> -->
							<a href="all-pacientes.php" class="list-view btn btn-link active"><i class="fas fa-bars"></i></a>
						</div>
					</div>
				</div>

				<div class="content-page">
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" />
								<label class="focus-label">Nome do paciente</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select form-control" value="" name="idadePaciente">
									<option value=""></option>
									<option value="Crianca">Criança de 0 a 11 Anos</option>
									<option value="Adolecente">Adolecente 12 a 18 Anos</option>
									<option value="Adulto">Adulto 19 a 59 Anos</option>
									<option value="Idoso">Idoso 60 a 75 Anos</option>

								</select>
								<label class="focus-label">Idade do Paciente</label>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select form-control" value="" name="situacaoPaciente">
									<option value=""></option>
									<?php
									// BUCAR situação dopaciente
									$querySelectSitPac = "SELECT * FROM situacao_paciente";
									$resultQuerySitPac = mysqli_query($mysqli, $querySelectSitPac);

									while ($row_result_sit_Pac = mysqli_fetch_array($resultQuerySitPac)) {
										$cod_situacao_paciente = $row_result_sit_Pac['cod_situacao'];
										$nome_situacao_paciente = $row_result_sit_Pac['nome_situacao'];



									?>
										<option value="<?php echo $cod_situacao_paciente ?>"><?php echo $nome_situacao_paciente; ?></option>

									<?php

									}

									?>
								</select>
								<label class="focus-label">Situação do Paciente</label>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<a href="#" class="btn btn-search rounded btn-block mb-3">
								Pesquisar
							</a>
						</div>
					</div>

					<div class="row ">
						<div class="col-lg-12 mb-3">
							<div class="table-responsive">
								<table class="table custom-table datatable">
									<thead class="thead-light">
										<tr>
											<th>Nome</th>
											<th>Idade </th>
											<th>Sexo</th>
											<th>Procedimentos</th>
											<th>Status</th>

											<th class="text-right">Cadastro</th>
										</tr>
									</thead>
									<tbody>

										<?php

										$querySelectPaciente = "SELECT p.cod_paciente, p.nome_paciente, a.cod_avaliacao, p.data_nasc_paciente, p.sexo_paciente FROM 
										pacientes p join avaliacao_paciente a on a.ordem_paciente = p.cod_paciente  										
										 ORDER BY cod_avaliacao desc limit 1 ";

										$queryResultPaciente = $mysqli->query($querySelectPaciente);

										if (mysqli_affected_rows($mysqli) > 0) {



											while ($row_cont_paciente = mysqli_fetch_array($queryResultPaciente)) {
												$codPaciente = $row_cont_paciente['cod_paciente'];
												$nomePaciente = $row_cont_paciente['nome_paciente'];
												$codAvaliacao = $row_cont_paciente['cod_avaliacao'];
												$sexoPaciente = $row_cont_paciente['sexo_paciente'];


												$dataNacPaciente = $row_cont_paciente['data_nasc_paciente'];

												// * CODIGO PARA PEGAR A DATA DO PACIENTE 
												$dataNascimento = $dataNacPaciente;
												$date = new DateTime($dataNascimento);
												$interval = $date->diff(new DateTime(date('Y-m-d')));
												$idadePaciente =  $interval->format('%Y');


												// * Condição para saber se o paciente recebeu alta

												// $queryPaciente = "SELECT status FROM agendamento_paciente where ordem_paciente = '$codPaciente' ORDER BY cod_agendamento desc limit 1 ";
												// $queryResult = $mysqli->query($queryPaciente);
												// $row_cont = mysqli_fetch_array($queryResult);
												// $status = $row_cont['status'] ?? "";

												// if ($status == "" or $status == '1') {

												// 	// echo "sim";													







										?>

												<tr>
													<!-- <td>
														<h2><?= $codAvaliacao; ?></h2>
													</td> -->
													<td>
														<h2>
															<form action="about-paciente.php" method="post">
																<a class="avatar text-white">
																	<button type="submit" name="codPaciente" value="<?php echo  $codPaciente; ?>" style="border: none; background:none;"><?php echo substr($nomePaciente, 0, 1); ?></button>
																</a>
															</form>

															<form action="about-paciente.php" method="post">

																<button type="submit" name="codPaciente" value="<?php echo $codPaciente; ?>" style="border: none; background:none;">
																	<?php echo $nomePaciente; ?> <span></span>
																</button>
															</form>
														</h2>
													</td>
													<td><?php echo $idadePaciente; ?></td>
													<td><?php if ($sexoPaciente == 'M') {
															echo "Masculino";
														} else {
															echo "Feminino";
														}  ?></td>
													<td>
														<?php
														//*========= BUSCAR OS TIPO DE RESCURSO DO TRATAMENTO O PACIENTE TEM ===
														$querySelRecurso = "SELECT rt.nome_recurso, trt.cod_tipo_recurso  from tipo_recurso_tratamento trt join recurso_tratamento rt on trt.ordem_recurso = rt.cod_recurso WHERE ordem_avaliacao = '$codAvaliacao'  ORDER BY trt.cod_tipo_recurso desc limit 1 ";
														$queryResulRecurso = $mysqli->query($querySelRecurso);
														while ($row_cont_recurso = mysqli_fetch_array($queryResulRecurso)) {
															$nomeRecurso = $row_cont_recurso['nome_recurso'];
														?>
															<span class="small text-muted"><?php echo ' | ' . $nomeRecurso . ' | '; ?></span>

														<?php  } ?>



													</td>


													<?php
													//* ===== BUSCAR SE O PACIENTE ESTA AGENDANDO OU NÃO =--=======

													$query_paciente_age = "SELECT ordem_paciente, status from agendamento_paciente where ordem_paciente = '$codPaciente' ORDER BY cod_agendamento desc limit 1 ";
													$result = $mysqli->query($query_paciente_age);
													$row_cont_recurso = mysqli_fetch_array($result);
													$status = isset($row_cont_recurso['status']) ? $row_cont_recurso['status'] : null;

													if (mysqli_affected_rows($mysqli) > 0) {

														if ($status == '1') {
															$agendado = "Agendado";
															$status = "badge-success-border";
														} else if ($status == '2') {
															$agendado = "Recebeu alta";
															$status = "badge-info-border";
														} else if ($status == '3') {
															$agendado = "Desativado";
															$status = "badge-danger-border";
														}
													} else {
														$agendado = "Não Agendado";
														$status = "badge badge-warning-border";
													}

													?>

													<td>
														<span class="badge <?php echo $status; ?>"><?php echo $agendado; ?></span>
													</td>


													<form action="edit-paciente.php" method="post">
														<td class="text-right ">

															<button type="submit" name="cod-paciente" value="<?php echo $codPaciente; ?>" class="btn btn-primary btn-sm mb-2">
																<i class="far fa-edit"></i>

															</button>

													</form>

													<button data-toggle="modal" codPaciente="<?php echo $codPaciente; ?>" nomePaciente="<?php echo $nomePaciente; ?>" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1 btn_delete">
														<i class="far fa-trash-alt"></i>
													</button>
													</td>





												</tr>

											<?php
											}
											// }
										} else { ?>

											<tr>
												<td colspan="6" style="text-align:center; margin: 10px; font-size:18px;">
													<span>
														Nenhum resultado encontrado.
													</span>
												</td>

											<?php }  ?>

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
												<span class="avatar">R</span>
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
												<span class="message-author">
													Catherine Manseau
												</span>
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


		<div id="delete_employee" class="modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content modal-md">
					<div class="modal-header">
						<h4 class="modal-title">Deletar Paciente </h4>
					</div>
					<form>
						<div class="modal-body">
							<p>Deseja deletar esse paciente ?</p>
							<input class="form-control" type="hidden" id="codPacienteDel">
							<div class="m-t-20 ">
								<a href="#" class="btn btn-white" data-dismiss="modal">Sair</a>
								<button type="button" class="btn btn-danger btn-del">Deletar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal  PApa DESTE DE APLICAÇÃO -->
		<div class="modal fade" id="Modal-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Teste de Aplicação</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body body-teste">

					</div>
				</div>
			</div>
		</div>




	</div>
	<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

	<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

	<script src="assets/js/app.js"></script>

	<!-- SCRIPT PARA POP UP -->
	<script src="assets/js/sweetalert2.all.min.js"></script>

	<script src="assets/js/delete-paciente.js"></script>

	<!-- SCRIPT PARA O PRELOAD DA PAGINA -->
	<script src="assets/js/script-preload.js"></script>
</body>

</html>