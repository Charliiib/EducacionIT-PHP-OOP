<?php  
        require 'config/config.php';
        $Destino = new Destino();
        $destinos = $Destino->listarDestinos();
        include 'includes/header.php';
?>

<main class="container mb-5">
        <h1>Destinos para viajar</h1>

        <section class="row">

<?php
        foreach ($destinos as $destino){
?>
            <div class="card col-lg-3 col-md-6 col-sm-12 ml-5 mb-5 mt-5 text-center">
                <img src="destinos/<?= $destino['destImagen'] ?>" class="card-img-top mt-2"> 
                <hr>
                    <h2><?= $destino['destNombre'] ?></h2>
                        <?= $destino['regNombre'] ?>  <br>
                        $<?= $destino['destPrecio']  ?>
                        <!-- detalles.php?destID=<?= $destino['destID'] ?> -->
                 <a href="" class="btn btn-outline-info mb-1">Ver detalle</a> 
            </div>
<?php
}
?>

        </section>

</main>

<?php
  include 'includes/footer.php';
?>
