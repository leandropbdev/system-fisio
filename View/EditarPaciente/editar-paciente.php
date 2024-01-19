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

$codPaciente = isset($dados['cod_paciente']) ? $dados['cod_paciente'] : null;

$codAvaliacao = isset($dados['cod_avaliacao']) ? $dados['cod_avaliacao'] : null;

$fisio = $dados['fisio'];

$nomepaciente = isset($dados['nome_paciente']) ? $dados['nome_paciente'] : null;
$sexoPaciente =  isset($dados['sexo_paciente']) ? $dados['sexo_paciente'] : null;
$dataNascPaciente =  isset($dados['data_nasc_paciente']) ? $dados['data_nasc_paciente'] : null;
$susPaciente = isset($dados['sus_paciente']) ? $dados['sus_paciente'] : null;
$cpfPaciente = isset($dados['cpf_paciente']) ? $dados['cpf_paciente'] : null;
$etniaPaciente =  isset($dados['etnia_paciente']) ? $dados['etnia_paciente'] : null;
$profissaoPaciente = isset($dados['profissao_paciente']) ? $dados['profissao_paciente'] : null;
$enderecoPaciente = isset($dados['endereco_paciente']) ? $dados['endereco_paciente'] : null;
$bairroPaciente = isset($dados['bairro_paciente']) ? $dados['bairro_paciente'] : null;
$telefonePaciente = isset($dados['telefone_paciente']) ? $dados['telefone_paciente'] : null;


//* ====== DADOS  DA AVALIACÃO =======

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




//* ==== EDITAR PACIENTES SÓ ATUALIZA SE A VARIAVEL NOME NÃO FOR VAZIA, NO CASO SE FOR EDITADO PELO FOMRULARIO PRINCIPAL ======

if ($nomepaciente != "") {

    $queryEdtPaciente = "UPDATE pacientes SET  nome_paciente = '$nomepaciente', sexo_paciente = '$sexoPaciente',
 cpf_paciente = '$cpfPaciente', data_nasc_paciente ='$dataNascPaciente', telefone_paciente = '$telefonePaciente',
 rua_paciente = '$enderecoPaciente', bairro_paciente = '$bairroPaciente', profissao_paciente = '$profissaoPaciente',
 sus_paciente = '$susPaciente', etnia_paciente = '$etniaPaciente', data_atualizacao = NOW()   WHERE cod_paciente = '$codPaciente'";

    $queryResultPaciente = $mysqli->query($queryEdtPaciente);


    //* === FAZ PARTE DO CADASTRO DO CLIENTE SITUAÇÃO DO PACIENTE====

    if (isset($dados['situacao_paciente'])) {

        $deleteSituacao = "DELETE FROM tipo_situacao_paciente where ordem_paciente = '$codPaciente' ";
        $resultDelete = mysqli_query($mysqli, $deleteSituacao);

        foreach ($dados['situacao_paciente'] as $chave => $valor) {

            $querynsertSitPaciente = "INSERT INTO tipo_situacao_paciente values(default,'$valor','$codPaciente',NOW())";
            $queryResultSitPac = $mysqli->query($querynsertSitPaciente);
        }
    } else {
        $deleteSituacao = "DELETE FROM tipo_situacao_paciente where ordem_paciente = '$codPaciente' ";
        $resultDelete = mysqli_query($mysqli, $deleteSituacao);
    }
}

//* FAZ PARTE DA AVALIAÇÃO =======

$queryEdtAvaliacao = "UPDATE avaliacao_paciente  SET  ordem_profissional = '$fisio', diag_medico_paciente = '$diagMedPaciente', cid_paciente = '$cidPaciente',
diag_fisio_paciente = '$diagFisioPaciente', qp_paciente = '$queixa_paciente', hma_paciente = ' $hma_paciente',
tratamento_realizado = '$trata_realizado_paciente', exames = '$desc_exame_paciente', medicamentos = '$desc_medicamento_paciente',
 cirurgia = '$desc_cirurgia_paciente', eva_paciente = '$eva_paciente', data_atualizacao_av = NOW()   WHERE ordem_paciente = '$codPaciente' and cod_avaliacao = '$codAvaliacao'";
$queryUpAvaliacao = mysqli_query($mysqli, $queryEdtAvaliacao);


//*PEGAR O ID DA AVALIACAO DO PACIENTE
$querySelectAvaliacao = " SELECT cod_avaliacao FROM avaliacao_paciente WHERE ordem_paciente = '$codPaciente' and cod_avaliacao = '$codAvaliacao'";
$resultSelectAv = mysqli_query($mysqli, $querySelectAvaliacao);

$row_result = mysqli_fetch_array($resultSelectAv);

$codAvaliacao = $row_result['cod_avaliacao'];


if (isset($dados['estado_paciente'])) {

    $deleteEstado = "DELETE FROM tipo_estado_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteEstado);

    foreach ($dados['estado_paciente'] as $chave => $valor) {

        $querynsertEstadoPaciente = "INSERT INTO tipo_estado_paciente values(default,'$codAvaliacao','$valor',NOW())";
        $queryResultEstadoPac = $mysqli->query($querynsertEstadoPaciente);
    }
} else {
    $deleteEstado = "DELETE FROM tipo_estado_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteEstado);
}



if (isset($dados['inspecao_paciente'])) {

    $deleteInspecao = "DELETE FROM tipo_inspecao where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteInspecao);

    foreach ($dados['inspecao_paciente'] as $chave => $valor) {

        $querynsertInspecaoPaciente = "INSERT INTO tipo_inspecao values(default,'$codAvaliacao','$valor',NOW())";
        $queryResultInspecaoPac = $mysqli->query($querynsertInspecaoPaciente);
    }
} else {
    $deleteInspecao = "DELETE FROM tipo_inspecao where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteInspecao);
}

if (isset($dados['classificacao_paciente'])) {

    $deleteClassificacao = "DELETE FROM tipo_classificacao_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteClassificacao);

    foreach ($dados['classificacao_paciente'] as $chave => $valor) {

        $querynsertClassificacaoPaciente = "INSERT INTO tipo_classificacao_paciente values(default,'$codAvaliacao','$valor',NOW())";
        $queryResultInspecaoPac = $mysqli->query($querynsertClassificacaoPaciente);
    }
} else {
    $deleteClassificacao = "DELETE FROM tipo_classificacao_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteClassificacao);
}



if (isset($dados['tratamento_paciente'])) {

    $deleteTratamento = "DELETE FROM tipo_tratamento_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteTratamento);

    foreach ($dados['tratamento_paciente'] as $chave => $valor) {

        $querynsertTratamentoPaciente = "INSERT INTO tipo_tratamento_paciente values(default,'$codAvaliacao','$valor',NOW())";
        $queryResultInspecaoPac = $mysqli->query($querynsertTratamentoPaciente);
    }
} else {
    $deleteTratamento = "DELETE FROM tipo_tratamento_paciente where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteTratamento);
}


if (isset($dados['recurso_paciente'])) {

    $deleteTratamentoRecurso = "DELETE FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteTratamentoRecurso);

    foreach ($dados['recurso_paciente'] as $chave => $valor) {

        $querynsertTratamentoRecurso = "INSERT INTO tipo_recurso_tratamento values(default,'$codAvaliacao','$valor',NOW())";
        $queryResultInspecaoPac = $mysqli->query($querynsertTratamentoRecurso);
    }
} else {
    $deleteTratamentoRecurso = "DELETE FROM tipo_recurso_tratamento where ordem_avaliacao = '$codAvaliacao' ";
    $resultDelete = mysqli_query($mysqli, $deleteTratamentoRecurso);
}

echo "Alteração realizado com sucesso";
