<?php
require 'app.php';
function incluirtemplate($nombre,$inicio=false){
    include TEMPLATES_URL."/{$nombre}.php";
    //include "templates/{$nombre}.php"; 
}