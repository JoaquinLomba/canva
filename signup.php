<?php
require 'database.php';
if (!empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['nombre'])) {
    $sql = "INSERT INTO data (nombre, password, correo) VALUES (:nombre, :password, :correo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    // $email = $_POST['email'];
    //La contraseña la encriptamos con un hash, para mayor seguridad y protección.
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $pass1 = $_POST['password'];

//Antes de mandar el registro, comprobamos que las contraseñas sean igules, si lo son, pasamos a la siguiente pantalla, si no se devuelve un mensaje de error y te manda a la misma pantalla

  if ($stmt->execute()) {
    header("Location: signin.php");
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  $_SESSION['id_user'] = $last_id;
  $_SESSION['nombre'] = $_POST['nombre'];
  $_SESSION['correo'] = $_POST['correo'];
    $message = 'Usuario creado correctamente';
  } else {
    $message = 'El correo introducido ya existe. Por favor, introduzca uno válido';
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
        <form class="" action="signup.php" method="post">
          <container class="containerFields" style="text-align:center;">

            <section class="nameField">
              <input class="correo4" style="transition:0s;width:400px;"class="" type="text" name="nombre" id="nombre" placeholder="nombre" required>
            </section>
                <section class="emailField">
                  <input class="correo4" style="transition:0s;width:400px;"class="" type="text" name="correo" id="correo" placeholder="correo" required>
                </section>
                <section class="passwordField">
                  <input class="contra3" style="transition:0s; width:400px;"class="contra1" type="password" name="password" id="password" placeholder="contraseña" required>
                </section>

                <div style="margin-top: 2%;">


                <input class="boton2" style="width:402px;" type="submit" name="" value="Registrate" style="">
               </div>

            <p class="extraoption" > Ya tienes cuenta?   <a href="signin.php" target="_blank" >Inicia sesion</a></p>
              </container>
        </form>

  </body>
</html>
