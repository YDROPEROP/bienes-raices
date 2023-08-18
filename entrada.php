<?php
require './includes/funciones.php';
incluirtemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="./build/img/destacada2.webp" type="image/webp">
            <img loading="lazy" src="./build/img/destacada2.jpg" alt="anuncio">
        </picture>
        <p class="informacion-meta">Escrito el: <span> 20/10/2021 </span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aliquid quia dolor omnis repellendus, quo quam voluptates sed aperiam qui nobis. Officia illo vel nostrum sunt ea soluta eius fugiat?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium, laborum cum! Eius deleniti modi perspiciatis quibusdam accusantium iste nihil. Tempora dolores quis maiores exercitationem praesentium illum provident iure iste perspiciatis.</p>
        </div>
    </main>

<?php 
    incluirtemplate('footer');
?>