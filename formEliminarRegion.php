<?php  

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Region = new Region();
    $cantidad = $Region->verRegionPorDestino();
	include 'includes/header.php';

?>

    <main class="container">
        <h1>Confirmación de baja de una Region</h1>
<?php
    if( $cantidad > 0 ){
?>
        <div class="alert bg-light border-danger p-4 col-8 mx-auto">
            No se puede eliminar la Region seleccionada,
            ya que hay destinos relacionados.
            <br><br>
            <a href="adminRegiones.php" class="btn btn-outline-secondary">
                Volver a panel
            </a>
        </div>
<?php
    }else{
         $Region->verRegionPorID();
?>
        <div class="card border-danger col-6 mx-auto p-4 text-danger">
            Region a eliminar:
            <?= $Region->getRegNombre(); ?>
            <form action="eliminarRegion.php" method="post">
                <input type="hidden" name="regID"  
                       value="<?= $Region->getRegID(); ?>">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>
            </form>
        </div>
<?php
    }
?>

        <script>
            Swal.fire({
                title: '¿Desea eliminar la Region?',
                text: "Esta acción no se puede deshacer.",
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#8fc87a',
                cancelButtonText: 'No, no la quiero eliminar',
                confirmButtonColor: '#d00',
                confirmButtonText: 'Si, la quiero eliminar'
            }).then((result) => {
                if (!result.value) {
                    window.location = 'adminRegiones.php'
                }
            })
        </script>


    </main>

<?php  include 'includes/footer.php';  ?>
