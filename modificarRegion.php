<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Region = new Region;
    $chequeo = $Region->modificarRegion();
    $css = 'danger';
    $mensaje = 'No se han modificado datos de la región';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Region: '.$Region->getRegNombre().' modificada correctamente';
    }
    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Modificación de una región</h1>

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
