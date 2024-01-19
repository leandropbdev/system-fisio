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

// Array
// (
//     [dias_sem] => Array
//         (
//             [0] => 1
//             [1] => 3
//             [2] => 5
//         )

//     [horario_inicial] => 07:00
//     [horario_final] => 08:00
//     [profissional] => 1
//     [nome_paciente] => Leandro Braga
//     [sexo_paciente] => M
//     [data_nascimento] => 1996-06-12
//     [sus_paciente] => 444333333322
//     [cpf_paciente] => 899.993.939-39
//     [rua_paciente] => Antonio Medeiros, 83
//     [bairro_paciente] => Vila Falcão
//     [procedimento] => 1
//     [observacao] => 
// )


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Array
// (
//     [dias_sem] => Array
//         (
//             [0] => 2
//         )

//     [horario_inicial] => 01:39
//     [horario_final] => 02:39
//     [profissional] => 1
//     [sexo_paciente] => M
//     [data_nascimento] => 1992-03-12
//     [sus_paciente] => 3323323232323
//     [cpf_paciente] => 333.222.333-23
//     [rua_paciente] => Rua da palmeiras, 2344
//     [bairro_paciente] => Vila Falcão
//     [procedimento] => Fisioterapia
//     [observacao] => Teste de aplicação
// )
$cod_paciente = isset($dados['cod_paciente']) ? $dados['cod_paciente'] : null;
$nomePaciente = isset($dados['nome_paciente']) ? $dados['nome_paciente'] : null;
$horario_inicial = isset($dados['horario_inicial']) ? $dados['horario_inicial'] : null;
$horario_final = isset($dados['horario_final']) ? $dados['horario_final'] : null;
$profissional = isset($dados['profissional']) ? $dados['profissional'] : null;
$sexoPaciente = isset($dados['sexo_paciente']) ? $dados['sexo_paciente'] : null;
$dataNascimento = isset($dados['data_nascimento']) ? $dados['data_nascimento'] : null;
$susPaciente = isset($dados['sus_paciente']) ? $dados['sus_paciente'] : null;
$cpfPaciente = isset($dados['cpf_paciente']) ? $dados['cpf_paciente'] : null;
$ruaPaciente = isset($dados['rua_paciente']) ? $dados['rua_paciente'] : null;
$bairroPaciente = isset($dados['bairro_paciente']) ? $dados['bairro_paciente'] : null;
$procedimento = isset($dados['procedimento']) ? $dados['procedimento'] : null;
$observacao = isset($dados['observacao']) ? $dados['observacao'] : null;



//*==== CADASTRA UM NOVO PACIENTE =====
if ($cod_paciente == "") {

    //* ==== CADASTRAR PACIENTES ======

    $queryInsertPaciente = "INSERT INTO pacientes (cod_paciente, nome_paciente, sexo_paciente, cpf_paciente, data_nasc_paciente, rua_paciente, bairro_paciente, sus_paciente, data_cad_paciente) 
values(default,'$nomePaciente','$sexoPaciente','$cpfPaciente','$dataNascimento','$ruaPaciente','$bairroPaciente','$susPaciente', NOW())";

    $queryResultPaciente = $mysqli->query($queryInsertPaciente);
    if (mysqli_affected_rows($mysqli) > 0) {

        //*=====PEGAR O ID DO PACIENTE PARA SALVA NA TABELA DE AVALIAÇÃO ===== PEGAR O ULTIMO CODIGO CADASTRADO
        $querySelectPaciente = "SELECT cod_paciente FROM pacientes ORDER BY cod_paciente desc limit 1";
        $queryResult = $mysqli->query($querySelectPaciente);
        while ($row_cont_paciente = mysqli_fetch_array($queryResult)) {
            $codPaciente = $row_cont_paciente['cod_paciente'];
        }

        //FAZ PARTE DA AVALIAÇÃO =======

        $querynsertAvaliacao = "INSERT INTO avaliacao_paciente values(default,'$codPaciente','$profissional','','','','','','','','','','',NOW(), '')";
        $queryResultAv = $mysqli->query($querynsertAvaliacao);

        if (mysqli_affected_rows($mysqli) > 0) {

            //*=====PEGAR O ID DA AVALIAÇÃO  ===== PEGAR O ULTIMO CODIGO CADSATRADO
            $querySelectAvPaciente = "SELECT cod_avaliacao FROM avaliacao_paciente ORDER BY cod_avaliacao desc limit 1";
            $queryResultAvPac = $mysqli->query($querySelectAvPaciente);
            while ($row_cont_ava_paciente = mysqli_fetch_array($queryResultAvPac)) {
                $codAvaliacao = $row_cont_ava_paciente['cod_avaliacao'];
            }

            // $queryTipoRecurso = "SELECT * FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' and ordem_recurso = '$procedimento'";
            // $queryResultRecurso = $mysqli->query($queryTipoRecurso);

            // if (mysqli_affected_rows($mysqli) < 0) {

            $querynsertRecuPaciente = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$procedimento',NOW())";
            $queryResultRecuPac = $mysqli->query($querynsertRecuPaciente);

            // }



            //*CADASTRA A AGENDA = AGENDA O PACIENTE NA TABELA AGENDAMENTO_PACIENTE
            $querynsertAgendamento = "INSERT INTO agendamento_paciente values(default,'$codPaciente','$profissional','$procedimento','$horario_inicial','$horario_final','1','$observacao', NOW(),'') ";
            $queryResultAgd = $mysqli->query($querynsertAgendamento);

            //=====PEGAR O ID DO ULTIMO AGENDAMENTO  =====
            $querySelectAgendamento = "SELECT cod_agendamento FROM agendamento_paciente ORDER BY cod_agendamento desc limit 1";
            $queryResultAgd = $mysqli->query($querySelectAgendamento);
            while ($row_cont_agendamento = mysqli_fetch_array($queryResultAgd)) {
                $codAgendamento = $row_cont_agendamento['cod_agendamento'];
            }



            //* ====== CADASTRAR OS DIAS DA SEMANA QUE O PACIENTE FOI AGENDADO NA TABELA dias_semana_paciente, esta em um array ====
            if (isset($dados['dias_sem'])) {
                foreach ($dados['dias_sem'] as $chave5 => $valor5) {

                    $querynsertDiaSem = "INSERT INTO dias_semana_paciente values(default,'$codAgendamento','$valor5',NOW())";
                    $queryResultDiaSem = $mysqli->query($querynsertDiaSem);
                }
            }

            echo "Paciente agendado com sucesso";
        }
    }
} else { //* PACIENTE JA ÉSTA CADASTRADO, MAIS NÃO AGENDADO


    //=====PEGAR O ID DO AGENDAMENTO  =====
    $querySelectAgendamento = "SELECT cod_agendamento FROM agendamento_paciente WHERE ordem_paciente = '$cod_paciente'  ORDER BY cod_agendamento desc limit 1";
    $queryResultAgd = $mysqli->query($querySelectAgendamento);


    //  TESTA SE O PACIENTE JA ESTA AGENDANDO E NO STATUS 1 AGENDANDO ===
    if (mysqli_affected_rows($mysqli) <= 0) {


        //CADASTRA A AGENDA 
        $querynsertAgendamento = "INSERT INTO agendamento_paciente values(default,'$cod_paciente','$profissional','$procedimento','$horario_inicial','$horario_final','1','$observacao', NOW(),'')";
        $queryResultAgd = $mysqli->query($querynsertAgendamento);

        //=====PEGAR O ID DO AGENDAMENTO  =====
        $querySelectAgendamento = "SELECT cod_agendamento FROM agendamento_paciente ORDER BY cod_agendamento desc limit 1";
        $queryResultAgd = $mysqli->query($querySelectAgendamento);
        while ($row_cont_agendamento = mysqli_fetch_array($queryResultAgd)) {
            $codAgendamento = $row_cont_agendamento['cod_agendamento'];
        }

        // CADASTRA OS DIAS DA SEMANA QUE OPACIENTE ESTA AGENDADO
        if (isset($dados['dias_sem'])) {
            foreach ($dados['dias_sem'] as $chave5 => $valor5) {

                $querynsertDiaSem = "INSERT INTO dias_semana_paciente values(default,'$codAgendamento','$valor5',NOW())";
                $queryResultDiaSem = $mysqli->query($querynsertDiaSem);
            }
        }


        //=====PEGAR O ID DA AVALIAÇÃO  =====
        $querySelectAvPaciente = "SELECT cod_avaliacao FROM avaliacao_paciente where ordem_paciente = '$cod_paciente' ORDER BY cod_avaliacao desc limit 1";
        $queryResultAvPac = $mysqli->query($querySelectAvPaciente);
        while ($row_cont_ava_paciente = mysqli_fetch_array($queryResultAvPac)) {
            $codAvaliacao = $row_cont_ava_paciente['cod_avaliacao'];
        }

        //-=== BUSCA OS TIPO DE RESCURSOS QUE O PACIENTE ESTA CADSTRADO 
        $queryTipoRecurso = "SELECT * FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' and ordem_recurso = '$procedimento'";
        $queryResultRecurso = $mysqli->query($queryTipoRecurso);

        if (mysqli_affected_rows($mysqli) <= 0) {

            // CADASTRAR TIPO DE ECURSO CASO OPACIENTE NÃO TENHA NENHUM 
            $querynsertRecuPaciente = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$procedimento',NOW())";
            $queryResultRecuPac = $mysqli->query($querynsertRecuPaciente);
        }

        $msg = "Paciente agendado com sucesso";
    } else {
        // SE O PACIENTE ESTA AGENANDO, VOU CHECAR NA TABELA dias_semana_paciente  SE JA ESTA CADSATRADO ESSE DIA PARA ESSE PACIENTE, SE NÃO ESTIVER, CADSATRO UM NOVO DIA PARA ELE

        if (isset($dados['dias_sem'])) {
            foreach ($dados['dias_sem'] as $chave5 => $valor5) {

                $queryAgendamento = "SELECT cod_agendamento FROM agendamento_paciente WHERE  ordem_paciente = '$cod_paciente' AND status = 1 AND horario_inicio = '$horario_inicial'  ";
                $queryAgendamentoResult = $mysqli->query($queryAgendamento);

                if (mysqli_affected_rows($mysqli) != null) {

                    while ($row_cont_agendamento = mysqli_fetch_array($queryAgendamentoResult)) {
                        $codAgendamento = $row_cont_agendamento['cod_agendamento'];
                    }

                    $queryDiasSem = "SELECT * FROM dias_semana_paciente WHERE ordem_agendamento = '$codAgendamento' and ordem_cod_dias_semana = '$valor5'  ";
                    $queryDiasSemResult = $mysqli->query($queryDiasSem);


                    if (mysqli_affected_rows($mysqli) <= 0) {

                        $querynsertDiaSem = "INSERT INTO dias_semana_paciente values(default,'$codAgendamento','$valor5',NOW())";
                        $queryResultDiaSem = $mysqli->query($querynsertDiaSem);

                        $msg = "Novo dia da semana adicionado. ";
                    } else {
                        $msg = "Paciente já esta agendado.";
                    }
                } else {

                    // CADASTRAR UM NOVO AGENDAMENTO PARA O PACIENTE QUE JA ESTA AGENDADO, MAIS QUERO FAZER UM NOVO AGENDAMENTO EM DIA OU HORARIO DIFERENTE ==

                    //CADASTRA A AGENDA 
                    $querynsertAgendamento = "INSERT INTO agendamento_paciente values(default,'$cod_paciente','$profissional','$procedimento','$horario_inicial','$horario_final','1','$observacao', NOW(),'')";
                    $queryResultAgd = $mysqli->query($querynsertAgendamento);

                    //=====PEGAR O ID DO AGENDAMENTO  =====
                    $querySelectAgendamento = "SELECT cod_agendamento FROM agendamento_paciente ORDER BY cod_agendamento desc limit 1";
                    $queryResultAgd = $mysqli->query($querySelectAgendamento);
                    while ($row_cont_agendamento = mysqli_fetch_array($queryResultAgd)) {
                        $codAgendamento = $row_cont_agendamento['cod_agendamento'];
                    }

                    // CADASTRA OS DIAS DA SEMANA QUE OPACIENTE ESTA AGENDADO
                    if (isset($dados['dias_sem'])) {
                        foreach ($dados['dias_sem'] as $chave5 => $valor5) {

                            $querynsertDiaSem = "INSERT INTO dias_semana_paciente values(default,'$codAgendamento','$valor5',NOW())";
                            $queryResultDiaSem = $mysqli->query($querynsertDiaSem);
                        }
                    }


                    //=====PEGAR O ID DA AVALIAÇÃO  =====
                    $querySelectAvPaciente = "SELECT cod_avaliacao FROM avaliacao_paciente where ordem_paciente = '$cod_paciente' ORDER BY cod_avaliacao desc limit 1";
                    $queryResultAvPac = $mysqli->query($querySelectAvPaciente);
                    while ($row_cont_ava_paciente = mysqli_fetch_array($queryResultAvPac)) {
                        $codAvaliacao = $row_cont_ava_paciente['cod_avaliacao'];
                    }

                    //-=== BUSCA OS TIPO DE RESCURSOS QUE O PACIENTE ESTA CADSTRADO 
                    $queryTipoRecurso = "SELECT * FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' and ordem_recurso = '$procedimento'";
                    $queryResultRecurso = $mysqli->query($queryTipoRecurso);

                    if (mysqli_affected_rows($mysqli) <= 0) {

                        // CADASTRAR TIPO DE ECURSO CASO OPACIENTE NÃO TENHA NENHUM 
                        $querynsertRecuPaciente = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$procedimento',NOW())";
                        $queryResultRecuPac = $mysqli->query($querynsertRecuPaciente);
                    }

                    $msg =  "Novo agendamento realizado.";
                }
            }
        }
    }

    echo $msg;
}
