<?php
require_once 'mapaComun.php';
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        .myDate{
            margin: 10px 0 10px 0;	
        }
    </style>
    <title>Agregar Grupo</title>

</head>
<body>
    <header>
        <nav class="d-flex navbar navbar-expand-lg navbar-light bg-light justify-content-between">
            <div >
                <a class="navbar-brand" href="#">Mapa de salones</a>
            </div>
            <div class="d-flex align-items-end flex-wrap">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item active pr-2">
                            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown pr-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Lista de Salones Disponibles</a>
                                <a class="dropdown-item" href="#">Lista de Salones en Uso</a>
                                <a class="dropdown-item" href="#">Salones en usados por un Programa</a>
                                <a class="dropdown-item" href="#">Lista de Programas</a>
                                <a class="dropdown-item" href="#">Lista de Programas por Fecha de Finalizacion</a>
                                <a class="dropdown-item" href="#">Lista de Programas por Cantidad de Estudiantes</a>
                                <a class="dropdown-item" href="#">Lista de Grupos (Periodo) por Nombre de Programa</a>
                                <a class="dropdown-item" href="#">Lista de Programas por Grupos (Periodo)</a>
                                <div class="dropdown-divider"></div>    
                                <a class="dropdown-item" href="formularioSalones.php">Agregar Salon</a>
                                <a class="dropdown-item" href="formularioGrupos.php">Agregar Grupo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Editar Salon</a>
                                <a class="dropdown-item" href="#">Editar Grupo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Eliminar Salon</a>
                                <a class="dropdown-item" href="#">Eliminar Grupo</a>
                            </div>
                        </li>
                        <li class="nav-item active pr-2">
                            <a class="nav-link " href="#">Lista de Grupos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active pr-2">
                            <a class="nav-link" href="#">Cerrar Sesion <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>      
            </div>
        </nav>
    </header>
    <form action='' method='post'>
        <h4>Agregar Nuevo Programa</h4>
        </br>
        <div>
            <label for="exampleFormControlInput1">Tipo Programa</label>  
            <select class="form-control form-control" name="tipoPrograma" >
                <option vale="Diplomado">Diplomado</option>
                <option value="Especializacion">Especializacion</option>
                <option Value="Maestria">Maestria</option>
                <option Value="Doctorado">Doctorado</option>
            </select>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Nombre Programa</label>
            <input name=""  class="form-control" id="exampleFormControlInput1" placeholder="" required>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">periodo</label>
            <input name="" class="form-control" id="exampleFormControlInput1" placeholder="" required>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Fecha de Finalizacion</label>
            <input type="text" class="form-control datepicker" placeholder="AAAA-MM-DD" required> 
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Semestre</label>
            <input name="" class="form-control" id="exampleFormControlInput1" placeholder="" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Informacion adicional</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="Archivos/js/datePicker.js"></script>
</body>
</html>

