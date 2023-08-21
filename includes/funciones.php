<?php
require 'app.php';
function incluirtemplate($nombre,$inicio=false){
    include TEMPLATES_URL."/{$nombre}.php";
    //include "templates/{$nombre}.php"; 
}

function estAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];

    if($auth){
    return true;
    }
    return false;
}