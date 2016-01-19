<?php

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

// Slecect Clientse
$sqlSelect1 = "SELECT clienteID, nombre FROM clientes";
$result = $conn->query($sqlSelect1);

if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br> id: ". $row["clienteID"]. " - Name: ". $row["nombre"];
  }
} else {
  echo "0 results";
}

// Select Datos
$sqlSelect2 = "SELECT variable, valor, cliente FROM datos ORDER BY cliente";
$result = $conn->query($sqlSelect2);

if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br> Variable: ". $row["variable"]. " - Valor: ". $row["valor"]. " - Cliente: ". $row["cliente"];
  }
} else {
  echo "0 results";
}



$conn->close();
?>
