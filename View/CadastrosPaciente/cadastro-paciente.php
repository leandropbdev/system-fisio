<?php

include_once('../../db/db-conection.php');

// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$fisio = $dados['fisio'];
$nomepaciente = $dados['nome_paciente'];
$sexoPaciente =  $dados['sexo_paciente'];
$dataNascPaciente =  $dados['data_nasc_paciente'];
$susPaciente = isset($dados['sus_paciente']) ? $dados['sus_paciente'] : null;
$cpfPaciente = isset($dados['cpf_paciente']) ? $dados['cpf_paciente'] : null;
$etniaPaciente =  isset($dados['etnia_paciente']) ? $dados['etnia_paciente'] : null;
$profissaoPaciente = isset($dados['profissao_paciente']) ? $dados['profissao_paciente'] : null;
$enderecoPaciente = isset($dados['endereco_paciente']) ? $dados['endereco_paciente'] : null;
$bairroPaciente = isset($dados['bairro_paciente']) ? $dados['bairro_paciente'] : null;
$telefonePaciente = isset($dados['telefone_paciente']) ? $dados['telefone_paciente'] : null;
$diagMedPaciente = isset($dados['diag_medico_paciente']) ? $dados['diag_medico_paciente'] : null;
$cidPaciente =  isset($dados['cid_paciente']) ? $dados['cid_paciente'] : null;
$diagFisioPaciente = isset($dados['diag_fisio_paciente']) ? $dados['diag_fisio_paciente'] : null;

$queixa_paciente = isset($dados['queixa_paciente']) ? $dados['queixa_paciente'] : null;
$hma_paciente = isset($dados['hma_paciente']) ? $dados['hma_paciente'] : null;
$trata_realizado_paciente = isset($dados['trata_realizado_paciente']) ? $dados['trata_realizado_paciente'] : null;
$desc_exame_paciente = isset($dados['desc_exame_paciente']) ? $dados['desc_exame_paciente'] : null;
$desc_medicamento_paciente = isset($dados['desc_medicamento_paciente']) ? $dados['desc_medicamento_paciente'] : null;
$desc_cirurgia_paciente = isset($dados['desc_cirurgia_paciente']) ? $dados['desc_cirurgia_paciente'] : null;
$eva_paciente = isset($dados['eva_paciente']) ? $dados['eva_paciente'] : null;

//======= condição para definir a quandidade de dor que o paciente esta sentindo ============
// if ($eva_paciente > '0' and $eva_paciente <= '2') {
//     $eva_paciente = "Dor Leve";
// } else if ($eva_paciente > '2' and $eva_paciente <= '7') {
//     $eva_paciente = "Dor Moderada";
// } else if ($eva_paciente > '7' and $eva_paciente <= '10') {
//     $eva_paciente = "Dor Intensa";
// } else {
//     $eva_paciente = "";
// }


// ==== CADASTRAR PACIENTES ======

$queryInsertPaciente = "INSERT INTO pacientes values(default,'$nomepaciente','$sexoPaciente','$cpfPaciente','$dataNascPaciente','$telefonePaciente',
'$enderecoPaciente','$bairroPaciente','$profissaoPaciente','$susPaciente','$etniaPaciente', NOW(),'')";

$queryResultPaciente = $mysqli->query($queryInsertPaciente);
if (mysqli_affected_rows($mysqli) > 0) {

    //=====PEGAR O ID DO PACIENTE PARA SALVA NA TABELA DE AVALIAÇÃO =====
    $querySelectPaciente = "SELECT cod_paciente FROM pacientes ORDER BY cod_paciente desc limit 1";
    $queryResult = $mysqli->query($querySelectPaciente);
    while ($row_cont_paciente = mysqli_fetch_array($queryResult)) {
        $codPaciente = $row_cont_paciente['cod_paciente'];
    }



    // === FAZ PARTE DO CADASTRO DO CLIENTE ====

    if (isset($dados['situacao_paciente'])) {
        foreach ($dados['situacao_paciente'] as $chave => $valor) {

            $querynsertSitPaciente = "INSERT INTO tipo_situacao_paciente values(default,'$valor','$codPaciente',NOW())";
            $queryResultSitPac = $mysqli->query($querynsertSitPaciente);
        }
    }


    //FAZ PARTE DA AVALIAÇÃO =======

    $querynsertAvaliacao = "INSERT INTO avaliacao_paciente values(default,'$codPaciente','$fisio','$diagMedPaciente','$cidPaciente','$diagFisioPaciente','$queixa_paciente','$hma_paciente','$trata_realizado_paciente','$desc_exame_paciente','$desc_medicamento_paciente','$desc_cirurgia_paciente','$eva_paciente',NOW(), '')";
    $queryResultAv = $mysqli->query($querynsertAvaliacao);

    if (mysqli_affected_rows($mysqli) > 0) {

        //=====PEGAR O ID DA AVALIAÇÃO  =====
        $querySelectAvPaciente = "SELECT cod_avaliacao FROM avaliacao_paciente ORDER BY cod_avaliacao desc limit 1";
        $queryResultAvPac = $mysqli->query($querySelectAvPaciente);
        while ($row_cont_ava_paciente = mysqli_fetch_array($queryResultAvPac)) {
            $codAvaliacao = $row_cont_ava_paciente['cod_avaliacao'];
        }


        if (isset($dados['estado_paciente'])) {
            foreach ($dados['estado_paciente'] as $chave2 => $valor2) {

                $querynsertEstPaciente = "INSERT INTO tipo_estado_paciente values(default,'$codAvaliacao','$valor2',NOW())";
                $queryResultEstPac = $mysqli->query($querynsertEstPaciente);
            }
        }

        if (isset($dados['inspecao_paciente'])) {
            foreach ($dados['inspecao_paciente'] as $chave3 => $valor3) {

                $querynsertInspPaciente = "INSERT INTO tipo_inspecao values(default,'$codAvaliacao','$valor3',NOW())";
                $queryResultInspPac = $mysqli->query($querynsertInspPaciente);
            }
        }

        if (isset($dados['classificacao_paciente'])) {
            foreach ($dados['classificacao_paciente'] as $chave6 => $valor6) {

                $querynsertInspPaciente = "INSERT INTO tipo_classificacao_paciente values(default,'$codAvaliacao','$valor6',NOW())";
                $queryResultInspPac = $mysqli->query($querynsertInspPaciente);
            }
        }

        if (isset($dados['tratamento_paciente'])) {
            foreach ($dados['tratamento_paciente'] as $chave4 => $valor4) {

                $querynsertInspPaciente = "INSERT INTO tipo_tratamento_paciente values(default,'$codAvaliacao','$valor4',NOW())";
                $queryResultInspPac = $mysqli->query($querynsertInspPaciente);
            }
        }
        if (isset($dados['recurso_paciente'])) {
            foreach ($dados['recurso_paciente'] as $chave5 => $valor5) {

                $querynsertRecuPaciente = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$valor5',NOW())";
                $queryResultRecuPac = $mysqli->query($querynsertRecuPaciente);
            }
        }

        echo "Cadastro realizado com sucesso";
    }
}
