<?php

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Destino = new Destino;
    $chequeo = $Destino->eliminarDestino();
    $css = 'danger';
    $mensaje = 'No se han modificado datos de la región';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Destino: '.$Destino->getDestNombre().' eliminado correctamente'; //revisar el regnombre
    }
    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Eliminacion de un Destino</h1>

        <div class="alert alert-<?= $css ?> p-4">
            <?= $mensaje ?>
            <br>
            <a href="adminDestinos.php" class="btn btn-outline-secondary">
                Volver a panel de destinos
            </a>
        </div>
    </main>

    
<?php
    include 'includes/footer.php';
?>
