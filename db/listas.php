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
echo"<br>";
echo"<br>";
echo"<br>";
echo"busqueda del objeto";
$busqueda="SELECT * FROM salones WHERE idSalon =1";
$busqueda1="SELECT * FROM grupos WHERE idGrupo =1";
$fila=$conn->query($busqueda);
$fila1=$conn->query($busqueda1);
$objeto= mysqli_fetch_object($fila);
$objeto1= mysqli_fetch_object($fila1);
print_r($objeto);
print_r($objeto->idSalon);
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
print_r($objeto1);

/*
$result->close();
$conn->close();
$idGrupo;
$periodo;
$programa;
$tipoPrograma;
$semestre;
$numEstudiantes;
$fechaFinalizacion;
$info;
$salonId;
$agregarGrupo="INSERT INTO `grupos` (`idGrupo`, `periodo`, `programa`, `tipoPrograma`, `semestre`, `numEstudiantes`, `fechaFinalizacion`, `info`, `salonId`) "
        . "VALUES ('$idGrupo', '$periodo', '$programa', '$tipoPrograma', '$semestre', '$numEstudiantes', '$fechaFinalizacion', '$info', '$salonId')";

$editarGRupo="UPDATE `grupos` SET `programa` = '$programa' WHERE `grupos`.`idGrupo` = $idGrupo";

$borrarGrupo="DELETE FROM `grupos` WHERE `grupos`.`idGrupo` = $idGrupo";

$idSalon;
$numero;
$capacidad;
$disponibilidad;
$info;

$agregarSalon="INSERT INTO `salones` (`idSalon`, `numero`, `capacidad`, `disponibilidad`, `info`) VALUES ('$idSalon', '$numero', '$capacidad', '$disponibilidad', '$info')";

$editarSalon="UPDATE `salones` SET `numero` = '$numero' WHERE `salons`.`idSalon` = $idSalon";

$borrarSalon="DELETE FROM `salones` WHERE `salones`.`idSalon` = $idSalon";
 
$idGrupo=2;
 $res2=$conn->query("DELETE FROM `grupos` WHERE `grupos`.`idGrupo` = $idGrupo");
echo"eliminado id: $idGrupo";
echo"<br>";
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
}*/