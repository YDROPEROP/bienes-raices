<?php
require './includes/config/database.php';
$db = conectarDB();


//Incluye header
require './includes/funciones.php';
incluirtemplate('header');


$errores = [];

if($_SERVER['REQUEST_METHOD']==='POST'){
    /* echo '<pre>';
        var_dump($_POST);
    echo '</pre>';
 */
    $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(!$email){
        $errores[] = 'El email es obligatorio o no es valido';
    }
    if(!$password){
        $errores[] = 'El password es obligatorio';
    }
    if(empty($errores)){
        
        $query = "SELECT * FROM usuarios WHERE email='$email'";
        $consuta = mysqli_query($db, $query);
        

        if($consuta->num_rows){

            //hacermos un arreglo con las llaves que genera assoc para acceder al password y comprobarlo.
            $usuario = mysqli_fetch_assoc($consuta);

            //utilizamos la funcion de php >password_verity() para comparar las contraseñas
            $auto = password_verify($password,$usuario['password']);

            //var_dump($auto);
            if($auto){
                //El usuario esta autenticado
                
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
            }else{
                session_start();
                $_SESSION['login'] = false;
                $errores[] = 'La contraseña es incorrecta';
                //var_dump($_SESSION);
            }            

        }else{
            $errores[] = "El usuario no existe";
        }
    }

}

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error){ ?>
    <p class="alerta error"><?php echo $error.'<br>';?> </p>    
    <?php } ?>

    <form action="" class="formulario" method="POST">
        <fieldset>
            <legend>Email y Usuario</legend>

            <label for="email">E-mail </label>
            <input type="email" placeholder="Tu Email" id="email" name="email"> 

            <label for="password">Password </label>
            <input type="password" placeholder="Tu password" id="password" name="password">
        
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>    
</main>

<?php 
    incluirtemplate('footer');
?>