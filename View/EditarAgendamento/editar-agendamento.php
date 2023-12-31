<?php

include_once('../../db/db-conection.php');

// dd($_POST);

// function dd($param)
// {
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Array
// (
//     [codAgendamento_edt] => 40
//     [dias_sem_edt] => Array
//         (
//             [0] => 1
//             [1] => 3
//             [2] => 5
//         )

//     [horario_inicial_edt] => 08:00
//     [horario_final_edt] => 09:00
//     [profissional] => 1
//     [cod_paciente_edt] => 53
//     [procedimento_edt] => 3
//     [observacao_edt] => Paciente com dor
// )

$codAgendamento = isset($dados['codAgendamento_edt']) ? $dados['codAgendamento_edt'] : null;
$cod_paciente = isset($dados['cod_paciente_edt']) ? $dados['cod_paciente_edt'] : null;

$horario_inicial = isset($dados['horario_inicial_edt']) ? $dados['horario_inicial_edt'] : null;
$horario_final = isset($dados['horario_final_edt']) ? $dados['horario_final_edt'] : null;
$profissional = isset($dados['profissional_edt']) ? $dados['profissional_edt'] : null;

$procedimento = isset($dados['procedimento_edt']) ? $dados['procedimento_edt'] : null;
$observacao = isset($dados['observacao_edt']) ? $dados['observacao_edt'] : null;

$codDiasSemPaciente = isset($dados['codDiasSemPaciente_edt']) ? $dados['codDiasSemPaciente_edt'] : null;

//==== EDITAR O AGENDAMENTO  =====
if ($codAgendamento !== "") {

    // ==== EDITAR OS DADOS DA TABELA AGENDAMENTO_PACIENTE ======
    $queryUpAgendamento = "UPDATE agendamento_paciente SET ordem_profissional_agendamento = '$profissional', ordem_recurso_tratamento = '$procedimento', horario_inicio = '$horario_inicial', horario_final = '$horario_final', observacao = '$observacao', data_update_agendamento = NOW()   WHERE cod_agendamento = '$codAgendamento' ";
    $queryResultAgendamento = $mysqli->query($queryUpAgendamento);



    // -==== TESTE PARA EDITAR OU CADSATRAR UM NOVO DIA DA SEMANA DE AGENDAMENTO DO PACIENTE ====
    if (isset($dados['dias_sem_edt']) != "") {


        foreach ($dados['dias_sem_edt'] as $chave5 => $valor5) {

            $queryUpDiasSem = "UPDATE dias_semana_paciente SET ordem_cod_dias_semana = '$valor5' WHERE cod_dias_sem_paciente = '$codDiasSemPaciente'  ";
            $queryResulDiasSem = $mysqli->query($queryUpDiasSem);
        }
    }


    //=====PEGAR O ID DA AVALIAÇÃO  =====
    $querySelectAvPaciente = "SELECT cod_avaliacao FROM avaliacao_paciente where  ordem_paciente = '$cod_paciente' ORDER BY cod_avaliacao desc limit 1";
    $queryResultAvPac = $mysqli->query($querySelectAvPaciente);

    while ($row_cont_ava_paciente = mysqli_fetch_array($queryResultAvPac)) {
        $codAvaliacao = $row_cont_ava_paciente['cod_avaliacao'];
    }


    $queryRecurso = "SELECT * FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' and  ordem_recurso = '$procedimento'";
    $queryResultRecurso = $mysqli->query($queryRecurso);

    if (mysqli_affected_rows($mysqli) > 0) {

        $queryUpRecurso = "UPDATE tipo_recurso_tratamento SET ordem_recurso = '$procedimento'  WHERE ordem_avaliacao = '$codAvaliacao' and ordem_recurso = '$procedimento'";
        $queryResulRec = $mysqli->query($queryUpRecurso);
    } else {
        $querynsertRecuPaciente = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$procedimento',NOW())";
        $queryResultRecuPac = $mysqli->query($querynsertRecuPaciente);
    }




    echo "Agendamento alterado";
}
