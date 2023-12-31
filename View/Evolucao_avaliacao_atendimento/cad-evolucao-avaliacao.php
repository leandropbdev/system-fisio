<?php
include_once('../../db/db-conection.php');

dd($_POST);

function dd($param){
    echo '<pre>';
    print_r($param);
    echo '<pre>';
    die();
}




?>