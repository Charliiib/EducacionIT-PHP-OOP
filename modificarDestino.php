<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Destino= new Destino;
    $chequeo = $Destino->modificarDestino();
    $css = 'danger';
    $mensaje = 'No se han modificado datos del destinos';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Destino: '.$Destino->getDestNombre().' modificada correctamente';
    }
    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Modificación de un destino</h1>

        <div class="alert alert-<?= $css ?> p-4">
            <?= $mensaje ?>
            <br> <br>
            <a href="adminDestinos.php" class="btn btn-outline-secondary">
                Volver a panel de destinos
            </a>
        </div>

    </main>
    
<?php
    include 'includes/footer.php';
?>
