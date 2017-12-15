<?php

require_once 'logindb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}
$query = "SELECT * FROM grupos";
$result = $conn->query($query);
if (!$result) {
    die($conn->error);
}

$rows = $result->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j);
    echo 'idGrupo: ' . $result->fetch_assoc()['idGrupo'] . '<br>';
    $result->data_seek($j);
    echo 'periodo: ' . $result->fetch_assoc()['periodo'] . '<br>';
    $result->data_seek($j);
    echo 'programa: ' . $result->fetch_assoc()['programa'] . '<br>';
    $result->data_seek($j);
    echo 'numEstudiantes: ' . $result->fetch_assoc()['numEstudiantes'] . '<br>';
    $result->data_seek($j);
    echo 'fechaFinalizacion: ' . $result->fetch_assoc()['fechaFinalizacion'] . '<br><br>';
}
$result->close();
$conn->close();
