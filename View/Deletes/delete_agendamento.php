<?php

include_once('../../db/db-conection.php');

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

$codAgendamento = isset($_POST['codAgendamento']) ? $_POST['codAgendamento'] : null;
$todos_agendamento = isset($_POST['todos_agendamento']) ? $_POST['todos_agendamento'] : null;
$codDiasSem = isset($_POST['codDiasSem']) ? $_POST['codDiasSem'] : null;





//DELETAR OS DISA DA SEMANA QUE O PACIENTE ESTA AGENDADO 

// $queryDeleteDiasSemPaciente = "DELETE FROM dias_semana_paciente WHERE ordem_agendamento = '$codAgendamento'";
// $result_diasSemPaceinte = $mysqli->query($queryDeleteDiasSemPaciente);


if (isset($todos_agendamento)) {

    // PRECIS PEGA O COD_DIAS_SEMANA_PACIENTE PARA PODER APAGAR OS ATEDIMENTOS
    $querySelectDiasSemPaciente = "SELECT * FROM  dias_semana_paciente WHERE ordem_agendamento  = '$codAgendamento'";
    $result_diasSem = $mysqli->query($querySelectDiasSemPaciente);

    while ($row_dias_sem = mysqli_fetch_array($result_diasSem)) {

        $codDiasSemPaciente = $row_dias_sem['cod_dias_sem_paciente'];

        // echo $codDiasSemPaciente;

        $queryDeleteAtendimento = "DELETE FROM atendimento_paciente where ordem_dias_semana = '$codDiasSemPaciente'";
        $result_Delete = $mysqli->query($queryDeleteAtendimento);
    }

    //DELETAR OS DISA DA SEMANA QUE O PACIENTE ESTA AGENDADO 

    $queryDeleteDiasSemPaciente = "DELETE FROM dias_semana_paciente WHERE ordem_agendamento = '$codAgendamento' ";
    $result_diasSemPaceinte = $mysqli->query($queryDeleteDiasSemPaciente);

    $queryDeleteAgendamento = "DELETE FROM agendamento_paciente WHERE cod_agendamento = '$codAgendamento'";
    $result_agendamento = $mysqli->query($queryDeleteAgendamento);
} else {         
       

        $queryDeleteAtendimento = "DELETE FROM atendimento_paciente where ordem_dias_semana = '$codDiasSem'";
        $result_Delete = $mysqli->query($queryDeleteAtendimento);
   

    //DELETAR OS DISA DA SEMANA QUE O PACIENTE ESTA AGENDADO 
    $queryDeleteDiasSemPaciente = "DELETE FROM dias_semana_paciente WHERE ordem_agendamento = '$codAgendamento' and cod_dias_sem_paciente = '$codDiasSem'";
    $result_diasSemPaceinte = $mysqli->query($queryDeleteDiasSemPaciente);
}



echo "Deletado com sucesso";
