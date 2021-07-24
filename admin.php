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

        
    </main>
<?php
    include 'includes/footer.php';
?>
