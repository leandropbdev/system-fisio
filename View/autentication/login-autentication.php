<?php
session_start();
include('../../db/db-conection.php');


// dd($_POST);

// function dd($param){
//     echo '<pre>';
//     print_r($param);
//     echo '<pre>';
//     die();
// }





if (($_POST['usuario']) == "" || ($_POST['senha']) == " " ){
    $_SESSION['nao_autenticado'] = true;
    header('location../../login.php');
    echo "Entrou aqui";


   
}

$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
$senha_crip = md5($senha);

// $senhaCript = md5($senha);

$query = "SELECT * from usuarios where nome = '$usuario' and senha = '$senha_crip' ";
$result = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($result);


if($row == 1){  

$row_result_cont = mysqli_fetch_array($result);
$id = $row_result_cont['cod'];
$nome = $row_result_cont['nome'];
$classificacao = $row_result_cont['nivel'];
$sexo = $row_result_cont['sexo'];
  
$usuario_bd = mysqli_fetch_assoc($result);
 
 $_SESSION['id'] = $id;
 $_SESSION['classificacao'] = $classificacao;
 $_SESSION['usuario']= $usuario; 
 $_SESSION['sexo'] = $sexo;
 session_regenerate_id(true);// Para apagar a sessao antinga
 header('Location:../../index.php'); 
 exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location:../../login.php');    
    exit();
}



?>