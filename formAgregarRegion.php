<?php

    require 'config/config.php';
    include 'includes/header.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
?>
    
    <main class="container">
            <h1>Alta de una nueva región</h1>

            <div class="alert bg-light border round p-4">

                <form action="agregarRegion" method="post">

                    <div class="form-group">
                    <label for="regNombre">Nombre de la región:</label>
                    <input type="text" name="regNombre" id="regNombre" class="form-control">
                    </div>

                    <button class="btn btn-dark">Agregar</button>
                    <a href="adminRegiones" class="btn btn-outline-secondary">
                        Volver a panel de regiones
                    </a>
                </form>
            </div>
    </main>
    
<?php
    include 'includes/footer.php';
?>
