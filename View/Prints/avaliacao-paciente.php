<?php

include_once('../../db/db-conection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Fisioterapia</title>
    <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'Times New Roman', Times, serif;
        }

        .img-logo-system {
            width: 100px;
            margin-left: 50px;
            margin-top: 10px;


        }

        .img-logo-fisio {
            width: 100px;
            margin-left: 150px;
            margin-top: 10px;


        }


        .titulo-fisio {
            font-size: 20px;
            margin-left: 120px;


        }

        .sub-titulo-data {
            margin-left: 30px;
        }

        .sub-titulo-fisio {
            margin-left: 300px;
        }


        table,
        tr,
        td,
        th {
            font-size: 12px;
            font-family: DejaVu Sans;

        }

        td {

            border: #eee solid 1px;
            padding: 0px;
            margin: 0px;

        }

        th {

            color: #000;


        }

        span {
            font-size: 13px;
        }

        .logo1 {
            width: 140px;


        }

        #main {
            display: flex;
            padding: 0px;
            gap: 150px;
            margin-left: 20px;
            align-items: center;





        }

     
        

        h5 {
            padding: 0px;
            margin: 0px;
            margin-top: 0px;
            padding-left: 3px;
            font-weight: 800;
            font-size: 18px;
        }

        .span-dados {
            padding-left: 3px;
            font-size: 14px;


        }
    </style>

</head>

<body>

    <?php




    //*=== PEGAR O CODIGO DO PACIENTE ===
    $codPaciente = isset($_GET["codPaciente"]) ? $_GET["codPaciente"] : "";


    //* DADOS DO PACIENTE
    $queryPaceinte = "SELECT * FROM pacientes WHERE cod_paciente ='$codPaciente' ";
    $query_result = $mysqli->query($queryPaceinte);
    $row_cont_paciente = mysqli_fetch_array($query_result);
    $nomePaciente = $row_cont_paciente["nome_paciente"];
    $sexoPaciente = $row_cont_paciente["sexo_paciente"];
    $cpfPaciente = $row_cont_paciente["cpf_paciente"];
    $dataNascPaciente = $row_cont_paciente["data_nasc_paciente"];
    $telefonePaciente = $row_cont_paciente["telefone_paciente"];
    $ruaPaciente = $row_cont_paciente["rua_paciente"];
    $bairroPaciente = $row_cont_paciente["bairro_paciente"];
    $susPaciente = $row_cont_paciente["sus_paciente"];
    $etniaPaciente = $row_cont_paciente["etnia_paciente"];
    $profissaoPaciente = $row_cont_paciente["profissao_paciente"];

    $enderecoPaciente = $ruaPaciente . ' ' . $bairroPaciente;


    $dataNascPaciente = preg_replace('/[mm]/', '', $dataNascPaciente);
    $dataNascPaciente = DateTime::createFromFormat("Y-m-d", $dataNascPaciente);
    $dataNascPaciente = $dataNascPaciente->format("d/m/Y");

    $querySituacaoPaciente = "SELECT * FROM tipo_situacao_paciente tsp join situacao_paciente sp on sp.cod_situacao = tsp.ordem_situacao WHERE tsp.ordem_paciente = '$codPaciente'";
    $query_result_sit = $mysqli->query($querySituacaoPaciente);
    while ($row_cont_sit = mysqli_fetch_array($query_result_sit)) {

        $nomeSit[] = $row_cont_sit["nome_situacao"];
    }










    //* DADOS DA AVALIAÇÃO
    $queryAv = "SELECT * FROM avaliacao_paciente ap join profissionais p on p.cod_profissional = ap.ordem_profissional where ordem_paciente = '$codPaciente' order by cod_avaliacao limit 1";
    $query_ResultAv = $mysqli->query($queryAv);
    $row_cont_av = mysqli_fetch_array($query_ResultAv);

    $nomeFisio = $row_cont_av['nome_profissional'];
    $diagMedicoPaciente = $row_cont_av['diag_medico_paciente'];
    $cid = $row_cont_av['cid_paciente'];
    $diagFisioPaciente = $row_cont_av['diag_fisio_paciente'];
    $qpPaciente = $row_cont_av['qp_paciente'];
    $hmaPaciente = $row_cont_av['hma_paciente'];
    $tratamentoRealizado = $row_cont_av['tratamento_realizado'];
    $exames = $row_cont_av['exames'];
    $medicamentos = $row_cont_av['medicamentos'];
    $cirurgia = $row_cont_av['cirurgia'];
    $evaPaciente = $row_cont_av['eva_paciente'];


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


    $dataCadAv = $row_cont_av['data_cad_avaliacao'];

    $dataFinal = preg_replace('/[mm]/', '', $dataCadAv);
    $dateformFim = DateTime::createFromFormat("Y-m-d", $dataFinal);
    $dataCadAv = $dateformFim->format("d/m/Y");






    ?>

    <div class="container">

        <div class="row ">



            <table class="align-items-start " style="height: 20px;">

                <tr>
                    <th scope="col bg-info"><img class="img-logo-system" src="../../assets/img/img-relatorio.jpg" alt=""></th>
                    <th scope="col bg-info"><span class="titulo-fisio">Avaliacao de Fisioterapia </span></th>
                    <th scope="col"><img class="img-logo-fisio" src="../../assets/img/logo-fisio.jpg" alt=""></th>

                </tr>


            </table>
        </div>

        <div class="row mb-2 ">


            <!-- <table style="margin-top: 10px; border:0">
                <tr class="p-0" style="margin:0;"> -->
                    <span style="font-size: 14px; margin-right:60px; margin-left:5px;">Data da Avaliação: 21/12/2024 </span>
                    <span style="font-size: 14px; margin-left:250px;">Fisioterapeuta: Gabriela Eusebio</span>

                <!-- </tr>
            </table> -->

        </div>

        <div class="row">

            <table class='table  '>
                <thead class='table-success'>
                    <tr>
                        <th colspan='2' style='font-size:18px; padding:0px; padding-left:2px;'>Dados do paciente</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>

                        <td class="p-0 " style="min-width:100px;">
                            <h5>Nome</h5> <span class="span-dados"> <?=$nomePaciente ?> </span>
                        </td>
                        <td class="p-0 ">
                            <h5>Data de nascimento</h5> <span class="pan-dados"><?= $dataNascPaciente ?></span>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-0 ">
                            <h5>Telefone</h5> <span class="span-dados"><?= $telefonePaciente ?></span>
                        </td>
                        <td class="p-0 ">
                            <h5>Endereço residencial</h5> <span class="span-dados"><?= $enderecoPaciente ?> </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-0 ">
                            <h5>Etnia</h5> <span class="span-dados"> <?= $etniaPaciente ?> </span>
                        </td>
                        <td class="p-0 ">
                            <h5>Profissão</h5> <span class="span-dados"> <?= $profissaoPaciente ?> </span>
                        </td>
                    </tr>

                    <tr>
                        <td cospan class=" p-0 ">
                            <h5>Nº sus</h5> <span class="span-dados"> <?= $susPaciente ?></span>
                        </td>
                        <td class=" p-0 ">
                            <h5>N° cpf</h5> <span class="span-dados"> <?= $cpfPaciente ?> </span>
                        </td>
                    </tr>



                    <tr>
                        <td class="p-0 " colspan="2">
                            <h5>Situação do paciente</h5> <span class='span-dados'></span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>



</body>

</html>