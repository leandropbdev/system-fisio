<?php
include_once('../../db/db-conection.php');

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

$status = isset($_POST['statusFiltro']) ? $_POST['statusFiltro'] : null;
// echo $status;
?>




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
            <tr style="background:red; height:5px;">
                <th style="width: 10px; "></th>
                <td style=" background:#ddd; height:5px;">Ortopedico </td>
                <td style=" background:#ddd;">Neoro</td>
                <td style=" background:#ddd;">Ortopedico</td>
                <td style=" background:#ddd;">Neoro</td>
                <td style=" background:#ddd;">Ortopedico</td>
            </tr>
        </thead>
        <tbody>
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
																where nome_dias_semana = 'Seg' and horario_inicio = '08:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '08:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qua' and horario_inicio = '08:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '08:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '08:00:00' and status = '$status' order by p.nome_paciente desc";

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

            <tr>

                <th style="width: 10px; background:#eee;">9:00</th>
                <!-- ====== SEGUNDA  09:00 HORAS =======-->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '09:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '09:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qua' and horario_inicio = '09:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '09:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '09:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Seg' and horario_inicio = '10:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '10:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qua' and horario_inicio = '10:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '10:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '10:00:00' and status = '$status' order by p.nome_paciente desc";

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

            <tr>
                <th style="width: 10px; background:#eee;">11:00</th>
                <!-- ====== SEGUNDA  11:00 HORAS =======-->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '11:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- TEÇA-FEIRA AS 11:00 HORAS -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '11:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- QUARTA-FEIRA 11:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '11:00:00' and status = '$status' order by p.nome_paciente desc";

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
                <!-- QUINTA-FEIRA 11:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '11:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- SEXTA-FEIRA 11:00 HORAS	 -->
                <td style="width: 20px;">
                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '11:00:00' and status = '$status' order by p.nome_paciente desc";

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

            <tr>
                <th style="width: 10px; background:#eee;">13:00</th>
                <!-- ====== SEGUNDA  13:00 HORAS =======-->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '13:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- TEÇA-FEIRA AS 13:00 HORAS -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '13:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- QUARTA-FEIRA 13:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '13:00:00' and status = '$status' order by p.nome_paciente desc";

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
                <!-- QUINTA-FEIRA 11:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '13:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- SEXTA-FEIRA 13:00 HORAS	 -->
                <td style="width: 20px;">
                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '13:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Seg' and horario_inicio = '14:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '14:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qua' and horario_inicio = '14:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '14:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '14:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Seg' and horario_inicio = '15:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '15:00:00' and status = '$status' order by p.nome_paciente desc";

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
                        $queryAtendimento = "SELECT ap.ordem_dias_semana, ap.data_atendimento, ap.frequencia from atendimento_paciente ap join dias_semana_paciente dsp on dsp.cod_dias_sem_paciente = ap.ordem_dias_semana join agendamento_paciente apc on apc.cod_agendamento = dsp.ordem_agendamento where apc.cod_agendamento = '$codAgendamento'and ordem_cod_dias_semana = 3 and data_atendimento = CURRENT_DATE";
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
																where nome_dias_semana = 'Qua' and horario_inicio = '15:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '15:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '15:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Seg' and horario_inicio = '16:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Ter' and horario_inicio = '16:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qua' and horario_inicio = '16:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Qui' and horario_inicio = '16:00:00' and status = '$status' order by p.nome_paciente desc";

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
																where nome_dias_semana = 'Sex' and horario_inicio = '16:00:00' and status = '$status' order by p.nome_paciente desc";

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
            <tr>
                <th style="width: 10px; background:#eee;">17:00</th>
                <!-- ====== SEGUNDA  17:00 HORAS =======-->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Seg' and horario_inicio = '17:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- TEÇA-FEIRA AS 17:00 HORAS -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Ter' and horario_inicio = '17:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- QUARTA-FEIRA 17:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qua' and horario_inicio = '17:00:00' and status = '$status' order by p.nome_paciente desc";

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

                        //  CONTAR O TATOL DE PRESENCA DO PACIENTE 
                        $queryAtendiemntoContPresenca = "SELECT count(cod_atendimento) AS qtda_presenca FROM atendimento_paciente ap join dias_semana_paciente dsp on ap.ordem_dias_semana = dsp.cod_dias_sem_paciente join agendamento_paciente app on app.cod_agendamento = dsp.ordem_agendamento where app.cod_agendamento = '$codAgendamento' and ap.frequencia = '1'  "; // PARA MOSTRA A PRESENÇA E AUSENCIA SOMENTE DOS DIAS DA SEMANA SEPARADOS SO COLAR NO FINAL DO SELECT =>  and dsp.ordem_cod_dias_semana = '1'
                        $query_cont = mysqli_query($mysqli, $queryAtendiemntoContPresenca);
                        $row_presenca = mysqli_fetch_assoc($query_cont);
                        $contPresenca = $row_presenca['qtda_presenca'];


                        // echo $contPresenca;

                        //  CONTAR O TAToL DE FALTAS DO PACIENTE 
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
                <!-- QUINTA-FEIRA 17:00 HORAS	 -->
                <td style="width: 20px;">

                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Qui' and horario_inicio = '17:00:00' and status = '$status' order by p.nome_paciente desc";

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

                <!-- SEXTA-FEIRA 17:00 HORAS	 -->
                <td style="width: 20px;">
                    <?php
                    $querySelectAgnda = "SELECT * FROM agendamento_paciente ap 
																join pacientes p on p.cod_paciente = ap.ordem_paciente 
																join dias_semana_paciente dsp on dsp.ordem_agendamento = ap.cod_agendamento
															    join dias_semana ds on ds.cod_dias_semana = dsp.ordem_cod_dias_semana 
																join profissionais pf on pf.cod_profissional = ap.ordem_profissional_agendamento
																join recurso_tratamento rt on rt.cod_recurso = ap.ordem_recurso_tratamento
																where nome_dias_semana = 'Sex' and horario_inicio = '17:00:00' and status = '$status' order by p.nome_paciente desc";

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