<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Test - Catalina M.</title>

  <!-- Included CSS Files -->
  <!-- Combine and Compress These CSS Files -->
  <link rel="stylesheet" href="stylesheets/globals.css">
  <link rel="stylesheet" href="stylesheets/typography.css">
  <link rel="stylesheet" href="stylesheets/grid.css">
  <link rel="stylesheet" href="stylesheets/ui.css">
  <link rel="stylesheet" href="stylesheets/forms.css">
  <link rel="stylesheet" href="stylesheets/orbit.css">
  <link rel="stylesheet" href="stylesheets/reveal.css">
  <link rel="stylesheet" href="stylesheets/mobile.css">
  <!-- End Combine and Compress These CSS Files -->
  <link rel="stylesheet" href="stylesheets/app.css">
	<link rel="stylesheet" href="stylesheets/responsive-tables.css">
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/responsive-tables.js"></script>

  <!--[if lt IE 9]>
  <link rel="stylesheet" href="stylesheets/ie.css">
  <![endif]-->


  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

  <!-- Consultas -->
<?php
  // CONNECCION
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "user";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>



	<!-- container -->
	<div class="container">
    <h1>Test SQL</h1>
    <h4 class="subhead">All days you need learn something new!!</h4>

    <hr />
		<div class="row">
			<div class="five columns">
        <h5>Datos</h5>
        <p>
          <strong>Sql</strong>
        </p>
        <p>
          SELECT variable, valor, cliente FROM datos ORDER BY variable
        </p>
        <table class='responsive'>
          <tr>
            <th>Cliente</th>
            <th>Variable</th>
            <th>Valor</th>
          </tr>

          <?php
            $sqlSelect2 = "SELECT variable, valor, clienteID FROM datos ORDER BY variable";
            $result = $conn->query($sqlSelect2);

            if ($result->num_rows > 0) {
               // output data of each row
              while($row = $result->fetch_assoc()) {
                echo
                    "
                      <tr>
                        <td>".$row["clienteID"]."</td>
                        <td>".$row["variable"]."</td>
                        <td>".$row["valor"]."</td>
                      </tr>
                    ";
              }
            } else {
              echo "0 results";
            }
          ?>
        </table>
      </div>

      <div class="seven columns">
        <h5>Clientes</h5>
        <p>
          <strong>Sql</strong>
        </p>
        <p>
          SELECT clienteID, nombre FROM clientes
        </p>
        <table class='responsive'>
          <tr>
            <th>Cliente</th>
            <th>Nombre</th>
          </tr>

          <?php
            $sqlSelect1 = "SELECT clienteID, nombre FROM clientes";
            $result = $conn->query($sqlSelect1);

            if ($result->num_rows > 0) {
               // output data of each row
              while($row = $result->fetch_assoc()) {
                echo
                    "
                      <tr>
                        <td>".$row["clienteID"]."</td>
                        <td>".$row["nombre"]."</td>
                      </tr>
                    ";
              }
            } else {
              echo "0 results";
            }
          ?>
        </table>
        <h5>Mujeres que tienen mascotas en Bogotá. </h5>
        <p>
          <strong>Sql</strong>
        </p>
        <p>
          SELECT nombre from clientes where clienteID </br>
          in (select clienteID from datos where variable='Mascota' and valor='Si' and clienteID </br>
          in (select clienteID from datos where variable='Ciudad' and valor='Bogota' and clienteID </br>
          in (select clienteID from datos where variable='Genero' and valor='F' )))</br>
        </p>
        <table class='responsive'>
          <tr>
            <th>Nombre</th>
          </tr>

          <?php
            $sqlSelect3 = "SELECT nombre from clientes where clienteID in(select clienteID from datos where variable='Mascota' and valor='Si' and clienteID in (select clienteID from datos where variable='Ciudad' and valor='Bogota' and clienteID in (select clienteID from datos where variable='Genero' and valor='F' )))";

            $result = $conn->query($sqlSelect3);
            /*
            SELECT nombre, variable, valor
            FROM datos
            INNER JOIN clientes
            ON datos.clienteID=clientes.clienteID
            WHERE valor='F' AND valor='No';
            */
            if ($result->num_rows > 0) {
               // output data of each row
              while($row = $result->fetch_assoc()) {
                echo
                    "
                      <tr>
                        <td>".$row["nombre"]."</td>
                      </tr>
                    ";
              }
            } else {
              echo "0 results";
            }
          ?>
        </table>
      </div>
		</div>

    <h1>PREGUNTAS</h1>
    <h4 class="subhead">---</h4>

    <hr />

    <div class="row">
      <div class="twelve columns">
        <div>
          <strong>1. ¿ En qué consiste el principio de responsabilidad única ? ¿Cual es su propósito?</strong>
        </div>
        <div><p><strong>Respuesta:</strong></p></div>
        <div>
          
            Principio de responsabilidad única (Single Responsability Principle - SRP). Este principio establece:
            <div>* Una clase debe tener una y solo una única causa por la cual puede ser modificada.</div>
            <div>* Cada clase debe ser responsable de realizar una actividad del sistema</div><br/>
            <div>
              Lo que trata de decirnos este principio es que debemos huir de aquellas clases monolíticas que aglutinen varias responsabilidades. Pero, ¿qué es una responsabilidad? Desde el punto de vista de SRP se podría decir que una responsabilidad en una clase es una razón para cambiar esa clase. Es decir, si encontramos que hay más de una razón por la que una clase pueda cambiar entonces es que esa clase tiene más de una responsabilidad.
            </div><br/>
            <div>
              <strong>Proposito</strong><br/>
              ayudar a mejorar la mantenibilidad limitando las responsabilidades de un objeto a únicamente aquellas que cambien por razones relacionadas.  Cuando un objeto encapsula múltiples responsabilidades, los cambios en una de las responsabilidades del objeto puede afectar negativamente a las otras. Al desacoplar esas responsabilidades, podemos crear código que es más resistente al cambio.
            </div>
            <br/>
        </div>
        <div>
          <strong>2. ¿Que características tiene según su opinión “buen” código o código limpio?</strong>
          <div><p><strong>Respuesta:</strong></p></div>
        </div>
        <div>
          Caracteristicas:
          <ul>
            <li>* Un código limpio es fácil de leer; permite a las personas leerlo con un mínimo esfuerzo y así pueden entenderlo más fácilmente.</li>
            <li>* Cuando alguien desea agregar una nueva característica a un programa, será más fácil hacerlo si el código fue diseñado para ser extensible desde el inicio.</li>
          </ul>
        </div>
      </div>
    </div>


<?php
  $conn->close();
?>
	</div>
</body>
</html>
