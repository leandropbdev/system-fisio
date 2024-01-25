

<?php

include_once('../../db/db-conection.php');



// dd($_GET);

// function dd($param)
// {
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }

//*=== PEGAR O CODIGO DO PACIENTE ===
$codPaciente = isset($_GET['codPaciente']) ? $_GET['codPaciente'] : null;
$codAvaliacao = isset($_GET['codAvaliacao']) ? $_GET['codAvaliacao'] : null;




//* DADOS DO PACIENTE
$queryPaceinte = "SELECT * FROM pacientes WHERE cod_paciente ='$codPaciente' ";
$query_result = $mysqli->query($queryPaceinte);
$row_cont_paciente = mysqli_fetch_array($query_result);
$nomePaciente = $row_cont_paciente['nome_paciente'];
$sexoPaciente = $row_cont_paciente['sexo_paciente'];
$cpfPaciente = $row_cont_paciente['cpf_paciente'];
$dataNascPaciente = $row_cont_paciente['data_nasc_paciente'];
$telefonePaciente = $row_cont_paciente['telefone_paciente'];
$ruaPaciente = $row_cont_paciente['rua_paciente'];
$bairroPaciente = $row_cont_paciente['bairro_paciente'];
$susPaciente = $row_cont_paciente['sus_paciente'];
$etniaPaciente = $row_cont_paciente['etnia_paciente'];
$profissaoPaciente = $row_cont_paciente['profissao_paciente'];

$enderecoPaciente = $ruaPaciente . ' ' . $bairroPaciente;


$dataNascPaciente = preg_replace('/[mm]/', '', $dataNascPaciente);
$dataNascPaciente = DateTime::createFromFormat("Y-m-d", $dataNascPaciente);
$dataNascPaciente = $dataNascPaciente->format("d/m/Y");











//* DADOS DA AVALIAÇÃO
if($codAvaliacao != ""){
    $queryAv = "SELECT * FROM avaliacao_paciente ap join profissionais p on p.cod_profissional = ap.ordem_profissional where ordem_paciente = '$codPaciente' and cod_avaliacao = '$codAvaliacao' order by cod_avaliacao ";
}else{
    $queryAv = "SELECT * FROM avaliacao_paciente ap join profissionais p on p.cod_profissional = ap.ordem_profissional where ordem_paciente = '$codPaciente' order by cod_avaliacao limit 1";
}

$query_ResultAv = $mysqli->query($queryAv);
$row_cont_av = mysqli_fetch_array($query_ResultAv);

$codAvaliacao = $row_cont_av['cod_avaliacao'];

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








// Carregar o Composer
require '../../vendor/autoload.php';



// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/css/custom.css'";
$dados .= "<title></title>";
$dados .= "<link rel='stylesheet' href='http://localhost/system%20fisio/assets/css/bootstrap.min.css'>
           <script src='http://localhost/system%20fisio/assets/js/jquery-3.6.0.min.js'></script>";
$dados .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";

$dados .= "
<style rel='stylesheet'>

*{
margin:0;
padding:0;

}


	table, tr, td, th{

		// padding-left:3px;
		
		font-size:12px;
		font-family: DejaVu Sans;
	   
	}
	td{		
		//  border-collapse:collapse;
		 border:#eee solid 1px;
		 padding:0px;
         margin:0px;
		
        // background:#12121212;
        
        
        
        
	}
	th{	
		
		background-color:;
		color:#000;
        text-aling:center;
        // padding:2px;
	}
span{
font-size:14px;
}

.logo1{
width:100px;
margin-top:10px;


}

.logo2{
    width:100px;
    float:rigth;
    margin-left:590px;
    margin-top:-50px
   
    
    }
#main{
    display:flex;
    padding:0px;
   gap:150px;
   margin-left:20px;
   align-items:center;
    
    
  
   
   
}  

#data-fisio{
    display:flex;
    gap:400px;
}

#titulo_av{
    font-size:20px;  
    float: rigth;
    margin:50px 198px;
    
   
   

   
    
}

h5{
padding:0px;
margin:0px;
margin-top:0px;
padding-left:3px;
font-size:12pt;
}
.span-dados{
    padding-left:3px;
    font-size:12px;
    padding-top:0px
  
   
}
		

</style>

";
// 	
$dados .= "</head>";
$dados .= "<body >";
$dados .= "<div class='container '>";

$dados .= "<div class='row mt-2 mb-2 p-0' id='main'>";
$dados .= "<img class='logo1' src='http://localhost/System%20fisio/assets/img/img-relatorio.jpg' />";
$dados .= "<h3 id='titulo_av' class='mb-4' >Avaliação de Fisioterapia </h3>";
$dados .= "<img class='logo2' src='http://localhost/System%20fisio/assets/img/logo-fisio.jpg' />";
$dados .= "</div>";





date_default_timezone_set('America/Manaus');
$dia = date('l');



switch ($dia) {
    case 'Monday':
        $diaSemana = 'Segunda';
        break;
    case 'Tuesday':
        $diaSemana = 'Terça';
        break;
    case 'Wednesday':
        $diaSemana = 'Quarta';
        break;
    case 'Thursday':
        $diaSemana = 'Quinta';
        break;
    case 'Friday':
        $diaSemana = 'Sexta';
        break;
    case 'Saturday':
        $diaSemana = 'Sábado';
        break;
    case 'Sunday':
        $diaSemana = 'Domingo';
        break;
}

$dia = date('d');
$mes = date('m');
$ano = date('Y');

switch ($mes) {
    case '01':
        $mes = 'janairo';
        break;
    case '02':
        $mes = 'fevereiro';
        break;
    case '03':
        $mes = 'março';
        break;
    case '04':
        $mes = 'abril';
        break;
    case '05':
        $mes = 'maio';
        break;
    case '06':
        $mes = 'junho';
        break;
    case '07':
        $mes = 'julho';
        break;
    case '08':
        $mes = 'agosto';
        break;
    case '09':
        $mes = 'setembro';
        break;
    case '10':
        $mes = 'outubro';
        break;
    case '11':
        $mes = 'novembro';
        break;
    case '12':
        $mes = 'dezembro';
        break;
}



$dados .= "<div class=' mt-1 mb-2' id='data-fisio'>";
$dados .= "<span style='font-size:10pt;'>Data da Avaliacação: <span style='font-size:10pt;'>" . $dataCadAv . "</span></span>";
$dados .= "<span style='font-size:10pt; margin-left:280px;'>Fisioterapeuta: <span style='font-size:10pt; '>" . $nomeFisio . "</span></span> ";
$dados .= "</div>";

$dados .= "

<table  style='  width:100%;'>
<thead class='table-success'>
<tr class='p-0'>
  <th colspan='2' style='font-size:14px; float:left;   padding-left:2px; '>Dados do paciente</th> 
</tr>
</thead>
<tbody>


<tr>

<td class=' p-0 ' style='min-width:100%;'> <h5 >Nome</h5> <span class='span-dados'> $nomePaciente  </span></td>
<td class=' p-0 '> <h5 >Data de nascimento</h5> <span class='span-dados'>" . $dataNascPaciente . " </span></td>
</tr>

<tr>
<td class=' p-0 '> <h5 >Telefone</h5> <span class='span-dados'>" . $telefonePaciente . " </span></td>
<td class=' p-0 '> <h5 >Endereço residencial</h5> <span class='span-dados'>" . $enderecoPaciente . " </span></td>
</tr>

<tr>
<td class=' p-0 '> <h5 >Etnia</h5> <span class='span-dados'>" . $etniaPaciente . " </span></td>
<td class=' p-0 '> <h5 >Profissão</h5> <span class='span-dados'>" . $profissaoPaciente . " </span></td>
</tr>

<tr>
<td cospan class=' p-0 '> <h5 >Nº sus</h5> <span class='span-dados'>" . $susPaciente . " </span></td>
<td class=' p-0 '> <h5 >N° cpf</h5> <span class='span-dados'>" . $cpfPaciente . " </span></td>
</tr>



<tr>
<td class=' p-0 ' colspan='2' > <h5 >Situação do paciente</h5> <span class='span-dados'>";

$querySituacaoPaciente = "SELECT * FROM tipo_situacao_paciente tsp join situacao_paciente sp on sp.cod_situacao = tsp.ordem_situacao WHERE tsp.ordem_paciente = '$codPaciente'";
$query_result_sit = $mysqli->query($querySituacaoPaciente);
while ($row_cont_sit = mysqli_fetch_array($query_result_sit)) {

    $nomeSit = $row_cont_sit['nome_situacao'];



$dados .=" $nomeSit, ";


}

$dados .="</span></td></tr>
</tbody></table>";


$dados .= "
<table style='width:100%;'>
<thead class='table-success'>
<tr>
  <th colspan='2' style='font-size:14px; float:left;   padding-left:2px; '>Dados da avaliação</th> 
</tr>
</thead>
<tbody>

<tr>

<td class=' p-0  '  > <h5 class='mt-1' >Diagnóstico clinico</h5> <span class='span-dados'> $diagMedicoPaciente  </span></td>
<td class=' p-0 '> <h5 >Cid</h5> <span class='span-dados'>" . $cid . " </span></td>
</tr>

<tr>
<td colspan='2' class=' p-0 '> <h5 >Diagnóstico fisioterapêutico</h5> <span class='span-dados'>" . $diagFisioPaciente . " </span></td>
</tr>

<tr>
<td class=' p-0 ' > <h5 >Queixa do paciente</h5> <span class='span-dados'>" . $qpPaciente . " </span></td>
<td class=' p-0 '> <h5 >HMA</h5> <span class='span-dados'>" . $hmaPaciente . " </span></td>
</tr>

<tr>
<td colspan='2' class=' p-0 '> <h5 >Tratamento realizado</h5> <span class='span-dados'>" . $tratamentoRealizado . " </span></td>
</tr>

<tr>
<td colspan='2' class=' p-0 '> <h5 >Estado do paciente</h5> <span class='span-dados'>";

$queryEstadoPaciente = "SELECT * FROM tipo_estado_paciente tep join estado_paciente ep on ep.cod_estado = tep.ordem_estado WHERE tep.ordem_avaliacao = '$codAvaliacao'";
$query_result_estado = $mysqli->query($queryEstadoPaciente);
while ($row_cont_estado = mysqli_fetch_array($query_result_estado)) {

    $nomeEstado = $row_cont_estado['nome_estado'];



$dados .=" $nomeEstado, ";


}

$dados .="</span></td>
</tr>


<tr>
<td class=' p-0 ' > <h5 >Exames</h5> <span class='span-dados'>" . $exames . " </span></td>
<td class=' p-0 '> <h5 >Medicamentos</h5> <span class='span-dados'>" . $medicamentos . " </span></td>
</tr>


<tr>
<td colspan='2' class=' p-0 '> <h5 >Cirurgia</h5> <span class='span-dados'> $cirurgia </span></td>
</tr>

<tr>
<td  class=' p-0 '> <h5 >Inspeção/Palpação</h5> <span class='span-dados'> $cirurgia </span></td>
<td  class=' p-0 '> <h5 >Intencidade da dor(EVA)</h5> <span class='span-dados'> $evaPaciente </span></td>
</tr>

</tbody>
</table>

";

$dados .= "
<table style='width:100%;'>
<thead class='table-success'>
<tr>
  <th colspan='2'style='font-size:14px; float:left;   padding-left:2px; '>Plano terapêutico</th> 
</tr>
</thead>
<tbody>

<tr>
<td colspan='2' class=' p-0 '> <h5 class='mt-1' >Classificação do paciente</h5> <span class='span-dados'> $cirurgia </span></td>
</tr>

<tr>
<td colspan='2' class=' p-0 '> <h5 >Objetivo do tratamento</h5> <span class='span-dados'> $cirurgia </span></td>
</tr>

<tr>
<td colspan='2' class=' p-0 '> <h5 >Recursos terapêuticos</h5> <span class='span-dados'> $cirurgia </span></td>
</tr>

</tbody>
</table>

";





$dados .= "<br/><br/><br/><br/><hr>";

$dados .= "<div class='row mt-2 mb-2 p-0' style=' display: flex; flex-direction: row; justify-content: space-between;'>";
$dados .= "<img style='width:150px; float:left' src='http://localhost/System%20fisio/assets/img/logo.jpg' />";
$dados .= "<h3 style='font-size:10px; float:rigth; margin-left:420px' class='mb-4' >System Fisio seu sistema de gestão para clínicas e profissionais da saúde </h3>";

$dados .= "</div>";

$dados .= "<div>";



$dados .= "</body>";


//  echo $dados;


// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
// $dompdf->stream();
header('content-type:application/pdf');
echo $dompdf->output();
