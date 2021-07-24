<?php

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $Region = new Region();
    $regiones = $Region->listarRegiones();
    include 'includes/header.php';

?>
    
    <main class="container">
        <h1>Panel de administración de regiones</h1>
        
        <table class="table table-border table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Región</th>
                    <th colspan="2"><a href="formAgregarRegion.php" class="btn btn-dark">Agregar</a></th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ( $regiones as $region ){
?>
                <tr>
                    <td><?= $region['regID'] ?></td>
                    <td><?= $region['regNombre'] ?></td>
                    <td><a href="formModificarRegion.php?regID=<?= $region['regID'] ?>" class="btn btn-outline-secondary">Modificar</a></td>
                    <td><a href="formEliminarRegion.php?regID=<?= $region['regID'] ?>" class="btn btn-outline-secondary">Eliminar</a></td>
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
