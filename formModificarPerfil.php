<?php
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $usuario = new usuario();
    $usuarios = $usuario->verUsuarioPorID();
    include 'includes/header.php';


?>

    <main class="container">
        <h1>Modificar Perfil</h1>

<div class="bg-light border p-4">

<form action="modificarUsuario.php" method="post">


Usuario: <br>
<input type="text" name="usuNombre"  value="<?= $usuario->getUsuNombre() ?>"  class="form-control"> 
<br>

Email: <br>
<input type="text" name="usuEmail" value="<?= $usuario->getUsuEmail() ?>" class="form-control">
<br>



<input type="hidden"  name="idUsuario" value="<?= $usuario->getUsuID() ?>">


<button class="btn btn-dark">Guardar cambios</button>

<a href="adminUsuarios.php" class="btn btn-outline-secondary">Volver  a panel</a>

</form>


</div>


    </main>

<?php
    include 'includes/footer.php';
?>
