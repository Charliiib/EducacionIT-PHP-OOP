<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Proyecto Agencia</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/sweetalert2.js"></script>
</head>

<body>


        <nav class="site-header navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="navbar-brand" href="admin.php">Proyecto Agencia</a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Inicio</a>
                        <a class="nav-item nav-link" href="adminRegiones.php">Regiones</a>
                        <a class="nav-item nav-link" href="adminDestinos.php">Destinos</a>
       
                        
     <?php
    if ( isset( $_SESSION['login'] ) ){
    ?>
                        
                        <div class="dropdown">
                            <button class=" btn  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="text-secondary" href="#"><i class="fas fa-sign-out-alt">   <?= $_SESSION['datosUsuario'] ?></i></a>
                            </button>

                            <div class=" dropdown-menu bg-dark " aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-light bg-dark" href="logout.php">Salir de sistema</a>
                                <a class="dropdown-item text-light bg-dark" href="formModificarPerfil.php?usuID=<?= $_SESSION['usuID'] ?>">Modificar Perfil</a>
                                <a class="dropdown-item text-light bg-dark" href="formCambiarPassword.php?usuID=<?= $_SESSION['usuID'] ?>">Cambiar contraseña</a>
                             </div>
                             </div>

<?php
    }else{ 
?>

                                <button class=" btn btn-dark">
                                <a class="text-secondary nav-item nav-link-1" href="formLogin.php"><i class="fas fa-sign-in-alt mr-3"></i> INGRESAR</a>
                               </button>    
 <?php
    }
?>    

                    </div>
                </div>
            </div>
        </nav>   

