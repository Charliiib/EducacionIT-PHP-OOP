<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Region = new Region;
    $chequeo = $Region->eliminarRegion();
    $css = 'danger';
    $mensaje = 'No se han modificado datos de la región';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Region: '.$Region->getRegNombre().' eliminada correctamente'; //revisar el regnombre
    }
    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Eliminacion de una región</h1>

        <div class="alert alert-<?= $css ?> p-4">
            <?= $mensaje ?>
            <br>
            <a href="adminRegiones.php" class="btn btn-outline-secondary">
                Volver a panel de regiones
            </a>
        </div>
    </main>
    
<?php
    include 'includes/footer.php';
?>
