<?php
include './includes/templates/header.php';

?>
    <main class="contenedor seccion contenido-centrado">
        <h1>casa en venta frente al bosque</h1>
        <picture>
            <source srcset="./build/img/anuncio1.webp" type="image/webp">
            <img loading="lazy" src="./build/img/anuncio1.jpg" alt="anuncio">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$ 4,000,000</p>
            <ul class="iconos-caractaristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aliquid quia dolor omnis repellendus, quo quam voluptates sed aperiam qui nobis. Officia illo vel nostrum sunt ea soluta eius fugiat?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium, laborum cum! Eius deleniti modi perspiciatis quibusdam accusantium iste nihil. Tempora dolores quis maiores exercitationem praesentium illum provident iure iste perspiciatis.</p>
        </div>
    </main>

    <?php 
    include './includes/templates/footer.php';
?>