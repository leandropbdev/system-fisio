<?php

include_once('../../db/db-conection.php');

//* ====== AQUI TROCA O STATU DO AGENDAMENTO DO PACIENTE =============

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

// Array
// (
//     [codAgendamento] => 48
//     [frequenciaPaciente] => 1
//     [codDiasSemPaciente] => 134
//     [statusAgendamento] => 1
//     [obsAtendimento] => 
// )

// Array
// (
//     [codAgendamento] => 48
//     [frequenciaPaciente] => 1
//     [codDiasSemPaciente] => 131
//     [statusAgendamento] => 1
//     [obsAtendimento] => 
// )


// Array
// (
//     [codAgendamento] => 50
//     [frequenciaPaciente] => 1
//     [codDiasSemPaciente] => 142
//     [statusAgendamento] => 1
//     [obsAtendimento] => 
// )

$codProfissional = isset($_POST['codProfissional'])?$_POST['codProfissional']:null;
$codPaciente = isset($_POST['codPaciente'])?$_POST['codPaciente']:null;
$codAgendamento = isset($_POST['codAgendamento'])?$_POST['codAgendamento']:null;
$frequenciaPaciente = isset($_POST['frequenciaPaciente'])?$_POST['frequenciaPaciente']:null;
$codDiasSemPaciente = isset($_POST['codDiasSemPaciente'])?$_POST['codDiasSemPaciente']:null;
$statusAgendamento = isset($_POST['statusAgendamento'])?$_POST['statusAgendamento']:null;
$obsAtendimento = isset($_POST['obsAtendimento'])?$_POST['obsAtendimento']:null;

$descricaoEvolucao = isset($_POST['descricaoEvolucao'])? $_POST['descricaoEvolucao']:null;
$avaliacao_at = isset($_POST['avaliacao_at'])? $_POST['avaliacao_at']:null;

if($statusAgendamento == 2 && $descricaoEvolucao != "") {
    // CADASTRA A EVOLUÇÃO
    $queryEvolucao = "INSERT INTO evolucao_paciente values(default,'$codProfissional','$codPaciente','$descricaoEvolucao', now())";
    $query_evolucao = $mysqli->query($queryEvolucao);

}

if($statusAgendamento == 2 && $avaliacao_at != ""){
    // AVALIACAO DO ATENDIMENTO
    $queryAvAtendimento = "INSERT INTO avaliacao_atendimento values(default,'$codPaciente','$avaliacao_at', now())";
    $query_avAtendimento = $mysqli->query($queryAvAtendimento);
}


$queryAtendimento = "INSERT INTO atendimento_paciente values(default,'$codDiasSemPaciente','$frequenciaPaciente','$obsAtendimento', NOW())";
$query_Result_Aten = $mysqli->query($queryAtendimento);

// if($statusAgendamento == '0'){

    $queryAgendamentoUp = "UPDATE agendamento_paciente SET status = '$statusAgendamento', data_fim_agendamento = now() WHERE cod_agendamento ='$codAgendamento' ";
    $queryResultAgendamentoUp = $mysqli->query($queryAgendamentoUp);

// }else if($statusAgendamento == '1'){
//     $queryAgendamentoUp = "UPDATE agendamento_paciente SET status = '$statusAgendamento' WHERE cod_agendamento ='$codAgendamento' ";
//     $queryResultAgendamentoUp = $mysqli->query($queryAgendamentoUp);
// }



//    TESTE PARA MOSTAR A MENSAGEM DE CADASTRO
if($frequenciaPaciente == '1' and  $statusAgendamento == '2'){
    echo "Atendimento Concluido";
}else if($frequenciaPaciente == '0' and $statusAgendamento == '3' ){
    echo "Atendimentos finalizado por ausências";
} else if($frequenciaPaciente == '1'){
    echo "Presença confirmada";
}else if($frequenciaPaciente == '0'){
    echo "Ausência confirmada";    
}
