<?php
    require 'config/config.php';

    include 'includes/header.php';
?>
    
    <main class="container">
        <h1>Dashboard</h1>

        <?php
// si está logueado
if ( isset( $_SESSION['login'] ) ){
    ?>

       <h2> Bienvenido     <?= $_SESSION['datosUsuario'] ?> </h2>

    <?php
}
    ?>

        <section class="list-group">
            <a href="adminRegiones.php" class="list-group-item list-group-item-action">
                Panel de administración Regiones.
            </a>
            <a href="adminDestinos.php" class="list-group-item list-group-item-action">
                Panel de administración Destinos

            <a href="adminUsuarios.php" class="list-group-item list-group-item-action">
                Panel de administración Usuarios.
            </a>
        
        </section>        


    </main>
<?php
    include 'includes/footer.php';
?>
