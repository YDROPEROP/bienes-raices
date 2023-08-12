<?php
include './includes/templates/header.php';

?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="./build/img/nosotros.webp" type="image/webp" >
                    <img src="./build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero beatae dolorem maiores expedita aut ratione voluptatibus optio reprehenderit magni tempore. Odio aliquid maxime corrupti molestiae similique modi, delectus ea beatae!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis numquam ducimus eaque. Veritatis eveniet veniam ut optio fugit. Magni deleniti cupiditate quaerat adipisci sunt incidunt esse, voluptatibus aspernatur totam placeat.</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>LInventore accusamus facere deleniti consequuntur autem voluptate? Dolor ex deleniti cumque vitae libero impedit, delectus mollitia adipisci consectetur. Voluptate, ipsam aliquam? Mollitia.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>LInventore accusamus facere deleniti consequuntur autem voluptate? Dolor ex deleniti cumque vitae libero impedit, delectus mollitia adipisci consectetur. Voluptate, ipsam aliquam? Mollitia.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>LInventore accusamus facere deleniti consequuntur autem voluptate? Dolor ex deleniti cumque vitae libero impedit, delectus mollitia adipisci consectetur. Voluptate, ipsam aliquam? Mollitia.</p>
            </div>
        </div>
    </section>

<?php 
    include './includes/templates/footer.php';
?>