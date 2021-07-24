<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Destino= new Destino;
        $chequeo = $Destino->agregarDestino();

    $css = 'danger';
    $mensaje = 'No se pudo agregar la región.';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Destino: '.$Destino->getDestNombre().' agregada correctamente ';
        $mensaje .= 'con el id: '.$Destino->getDestID();
    }

    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Alta de un nuevo destino</h1>

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
