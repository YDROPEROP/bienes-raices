<?php
require './includes/funciones.php';
incluirtemplate('header');
?>

    <main class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        
        <?PHP 
        $limite=500;
        include './includes/templates/anuncios.php';
        ?>
    </main>

    <?php 
    incluirtemplate('footer');
?>