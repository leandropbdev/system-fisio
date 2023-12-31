<?php

include_once('../../db/db-conection.php');

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

$codPacienteDel = isset($_POST['codPacienteDel']) ? $_POST['codPacienteDel'] : null;

$queryAvaliacao = "SELECT  cod_avaliacao FROM avaliacao_paciente  where ordem_paciente = '$codPacienteDel'";
$resultQuery = $mysqli->query($queryAvaliacao);

while ($row_cont_avaliacao = mysqli_fetch_array($resultQuery)) {
    $codAvaliacao = $row_cont_avaliacao['cod_avaliacao'];
}


//Deletar tipo do classificacao
$queryDelClassificacao = "DELETE FROM tipo_classificacao_paciente where ordem_avaliacao = '$codAvaliacao'";
$resultQueryTra = $mysqli->query($queryDelClassificacao);


//Deletar tipo do tratamento
$queryDelTratamento = "DELETE FROM tipo_tratamento_paciente where ordem_avaliacao = '$codAvaliacao'";
$resultQueryTra = $mysqli->query($queryDelTratamento);


//Deletar tipo do situacao
$queryDelSituacao = "DELETE FROM tipo_situacao_paciente where ordem_paciente = '$codPacienteDel'";
$resultQuerySit = $mysqli->query($queryDelSituacao);

//Deletar tipo do recurso de tratamento
$queryDelRecurso = "DELETE FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao'";
$resultQueryRec = $mysqli->query($queryDelRecurso);

//Deletar tipo inspecão
$queryDelInsp = "DELETE FROM tipo_inspecao where ordem_avaliacao = '$codAvaliacao'";
$resultQueryInsp = $mysqli->query($queryDelInsp);

// TIPO ESTADODO PACIENTE
$queryDelestado = "DELETE FROM tipo_estado_paciente where ordem_avaliacao = '$codAvaliacao'";
$resultQueryEstado = $mysqli->query($queryDelestado);

// Avaliacao do PACIENTE
$queryDelAvaliacao = "DELETE FROM avaliacao_paciente  where ordem_paciente = '$codPacienteDel'";
$resultQueryAvaliacao = $mysqli->query($queryDelAvaliacao);

//DELETAR DIAS DA SEMANA QUE O PACIENTE ESTA CADSTRADO E DELETAR SEU AGENDAMENTO TAMBEM
//=====PEGAR O ID PACIENTE DO AGENDAMENTO  =====
$querySelectAgendamento = "SELECT cod_agendamento, ordem_paciente FROM agendamento_paciente WHERE ordem_paciente = '$codPacienteDel'";
$queryResultAgd = $mysqli->query($querySelectAgendamento);

if (mysqli_affected_rows($mysqli) > 0) {



    while ($row_cont_agendamento = mysqli_fetch_array($queryResultAgd)) {
        $codAgendamento = $row_cont_agendamento['cod_agendamento'];
        $codPaciente = $row_cont_agendamento['ordem_paciente'];
    }


    //==PEGAR O COD DO DIAS DA SEMANA PARA DELETAR OS ATENDIMENTOS ====
    $querySelectDiasSem = "SELECT cod_dias_sem_paciente, ordem_agendamento FROM dias_semana_paciente WHERE ordem_agendamento = '$codAgendamento'";
    $queryResultDiasSem = $mysqli->query($querySelectDiasSem);

    while ($row_cont_dias_sem = mysqli_fetch_array($queryResultDiasSem)) {
        $codDiasSem = $row_cont_dias_sem['cod_dias_sem_paciente'];

        //====== DELETAR ATENDIMENTOS =========
        $queryDeleteAden = "DELETE FROM atendimento_paciente where ordem_dias_semana = '$codDiasSem'";
        $query_resul_del_aten = $mysqli->query($queryDeleteAden);
    }
    // DELETAR DA DIAS_SEMANA_PACEINTE 
    $queryDelDiasSemana = "DELETE FROM dias_semana_paciente  where ordem_agendamento = '$codAgendamento'";
    $resultQueryDiasSemana = $mysqli->query($queryDelDiasSemana);

    // DELETAR O AGENDAMENTO
    $queryDelAgendamento = "DELETE FROM agendamento_paciente  where ordem_paciente = '$codPacienteDel'";
    $resultQueryAgendamento = $mysqli->query($queryDelAgendamento);
}

//  PACIENTE
$queryDelPaciente = "DELETE FROM pacientes  where cod_paciente = '$codPacienteDel'";
$resultQueryPaciente = $mysqli->query($queryDelPaciente);

if (mysqli_affected_rows($mysqli) > 0) {

    echo "Paciente deletado com sucesso.";
}
