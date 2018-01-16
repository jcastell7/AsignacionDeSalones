<?php
//login
$hn = 'localhost';
$db = 'mapas';
$un = 'root';
$pw = '';
$conn=new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
            die($conn->connect_error);
        }
?>