<?php  

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Destino = new Destino();
    $cantidad = $Destino->verDestinoPorID();
	include 'includes/header.php';

?>

<main class="container">
    <h1>Confirmación de baja de un destino</h1>


        <div class="card border-danger col-6 mx-auto p-4 text-danger">
           <h3> Destino a eliminar: </h3>
            <h5><?= $Destino->getDestNombre(); ?></h5>
            <form action="eliminarDestino.php" method="post">
                <input type="hidden" name="destID" value="<?= $Destino->getDestID(); ?>">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="adminDestinos.php" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>
            </form>
        </div>

<script>
            Swal.fire({
                title: '¿Desea eliminar el destino?',
                text: "Esta acción no se puede deshacer.",
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#8fc87a',
                cancelButtonText: 'No, no la quiero eliminar',
                confirmButtonColor: '#d00',
                confirmButtonText: 'Si, la quiero eliminar'
            }).then((result) => {
                if (!result.value) {
                    window.location = 'adminDestinos.php'
                }
            })
</script>

</main>

<?php  include 'includes/footer.php';  ?>
