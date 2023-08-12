<?php
include './includes/templates/header.php';

?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source src="./build/img/destacada3.webp" type="image/webp">
            <img src="./build/img/destacada3.jpg" alt="imagen de contacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre </label>
                <input type="text" placeholder="Tu nombre" id="nombre"> 

                <label for="email">E-mail </label>
                <input type="email" placeholder="Tu Email" id="email"> 

                <label for="telefono">Teléfono </label>
                <input type="tel" placeholder="Tu teléfono" id="telefono">
                
                <label for="mensaje">Mensaje:</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea> 
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>
                <p>Si eligió teléfono, eleja la fecha y la hora</p>

                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha">

                <label for="hora">Hora: </label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php 
    include './includes/templates/footer.php';
?>