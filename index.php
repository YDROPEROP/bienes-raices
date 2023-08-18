<?php
require './includes/funciones.php';
$inicio =true;

incluirtemplate('header',$inicio); 
//include './includes/templates/header.php'; otra forma de incluir el template sin funciones.

?>

    <main class="contenedor seccion">
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
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        
        <!-- INCLUSION DE LA TEMPLATE DE ANUNCIOS DINAMICO DESDE LA BASE DE DATOS -->
        <?php 
        $limite=3;
        
        include './includes/templates/anuncios.php' ;        
        ?>
        
        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver todas</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        
        <a href="contacto.html" class="boton-amarillo-contacto">Contactános</a>
    </section>
    
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog1.webp" type="image/webp">
                        <img loading="lazy" src="./build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="./build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guias para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia , aprende a combinar muebles y colocares para darle un avida a tu espacio.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atencion y la casa que me ofrecieron comple con toas mis expectativas.
                </blockquote>
                <p>-Yiver Ropero</p>
            </div>
        </section>
    </div>
    
<?php 
    incluirtemplate('footer');
?>