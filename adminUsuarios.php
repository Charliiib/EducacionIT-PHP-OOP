<?php  
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $usuario = new usuario();
    $usuarios = $usuario->listarUsuarios();
    include 'includes/header.php';     
?>

    <main class="container">
        <h1>Panel de administración de Usuarios</h1>


        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th colspan="2">
                        <a href="formAgregarUsuario.php" class="btn btn-dark">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
                        foreach ($usuarios as $usuario ) {
?>
                <tr>
                    <td><?=  $usuario['usuID']  ?></td>
                    <td><?=  $usuario['usuNombre']  ?></td>
                    <td><?=  $usuario['usuEmail']  ?></td>
                    <td>
                        <a href="formModificarUsuario.php?usuID=<?= $usuario['usuID'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarUsuario.php?usuID=<?= $usuario['usuID'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
<?php
}
?>

            </tbody>
        </table>


    </main>

<?php  include 'includes/footer.php';  ?>