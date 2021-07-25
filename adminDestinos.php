<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Destino = new Destino();
    $destinos = $Destino->listarDestinos();
    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Panel de administración de destinos</h1>
        
        <table class="table table-border table-hover table-striped  mb-4">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Destino (aeropuerto)</th>
                    <th>Región</th>
                    <th>Precio</th>
                    <th>Asientos</th>
                    <th>Disponibles</th>
                    <th>Imagen</th>
                    <th colspan="2"><a href="formAgregarDestino.php" class="btn btn-dark">Agregar</a></th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach ($destinos as $destino){
?>
                <tr>
                    <td><?= $destino['destID'] ?></td>
                    <td><?= $destino['destNombre'] ?></td>
                    <td><?= $destino['regNombre'] ?></td>
                    <td>$<?= $destino['destPrecio'] ?></td>
                    <td><?= $destino['destAsientos'] ?></td>
                    <td><?= $destino['destDisponibles'] ?></td>
                    <td><img src="destinos/<?= $destino['destImagen'] ?>" class="img-thumbnail"></td>
                    <td><a href="formModificarDestino.php?destID=<?= $destino['destID'] ?>" class="btn btn-outline-secondary">Modificar</a></td>
                    <td><a href="formEliminarDestino.php?destID=<?= $destino['destID'] ?>" class="btn btn-outline-secondary">Eliminar</a></td>
                </tr>
<?php
    }
?>
            </tbody>
        </table>
    </main>
    
<?php
    include 'includes/footer.php';
?>
