<?php
require 'database.php';
session_start();
if (!empty($_POST['correo']) && !empty($_POST['password'])) {
//la variable records prepara la conexion a la base de datos
    $records = $conn->prepare('SELECT id, nombre, correo, password FROM data WHERE correo = :correo');
//la variable records da valores con el parametro bindparam, el segundo valor lo asigna al nombre que esta en el primer valor
    $records->bindParam(':correo', $_POST['correo']);
//ejecuta la conexion
    $records->execute();
//hacemos con la variable results un recogida de datos con el parametro que esta dentro del parentesis para transformarlo a string
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
//hacemos coon este if una comprobacion numerica contando si los resultados son mayores que cero y la contraseña encriptada es igual a la contraseña desencriptada, si es asi ejecutamos todo y vamos a la siguiente pagina que seria hello.php

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['id'] = $results['id'];
      $_SESSION['correo'] = $results['correo'];
      $_SESSION['nombre'] = $results['nombre'];
      header("Location: hello.php");
    } else {
      $message = 'Lo sentimos, el usuario no existe';
    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<section class="maestro2">


    <div class="logo2">

    </div>
    <img class="coronalogo" src="images\Golden-Princess-Crown-Transparent-PNG.png" alt="">
    <p class="pro2">pro.</p>
    <h1 class="textoP">hola adios buenos dias buenas noches</h1>
    <h2 class="textoS">lo mismo de antes</h2>
    <ul class="listaP">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
  <li>leche</li>
  <li>pantumaca</li>
  <li>chuleton</li>
  <li>brisket</li>
</ul>

    </section>
    <img class="imagen2" src="images/K4Kqulz.jpg" alt="">
    <form class="" action="signin.php" method="post">
      <container class="containerFields" style="text-align:center;">

            <section class="emailField">
              <input class="correo4" style="transition:0s;width:400px;"class="" type="text" name="correo" id="correo" placeholder="correo" required>
            </section>
            <section class="passwordField">
              <input class="contra3" style="transition:0s; width:400px;"class="contra1" type="password" name="password" id="password" placeholder="contraseña" required>
            </section>

            <div style="margin-top: 2%;">


            <input class="boton2" style="width:402px;" type="submit" name="" value="Iniciar sesión" style="">
           </div>

        <p class="extraoption" > No tienes cuenta?   <a href="signup.php" target="_blank" >Registrate</a></p>
          </container>
    </form>


  </body>
</html>
