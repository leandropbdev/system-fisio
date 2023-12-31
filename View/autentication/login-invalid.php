<?php
//Verificar se o usaurio esta logado

if(!$_SESSION['usuario']){
    header('Location:login.php');    
    exit();
}
