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



//AUTOLOAD DO COMPOSER

require '../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


$options = new Options();
//Abiltar links remotos
$options->setIsRemoteEnabled(true);


// Instancia do dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

//Carega o html para dentro da classe
$dompdf->loadHtmlFile('http://localhost/System%20fisio/view/Prints/avaliacao-paciente.php');


// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// RENDERIZAR P AQRQUIVO PDF
$dompdf->render();

header('content-type:application/pdf');
//Imprimi o donteudo do pdf
echo $dompdf->output();

//FAZER O DOWLOAD AUTOMATICO 
// $dompdf->stream('Avaliação de Fisioterapia');

//SALVAR NO DISCO NO SERVIDOR
// file_put_contents(__DIR__.'/arquivos.pdf',$dompdf->output());
// echo "Arquivo salvo no disco";
