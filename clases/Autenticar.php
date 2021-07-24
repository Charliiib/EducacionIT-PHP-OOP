<?php   

class autenticar {
    public function login()
        {
            // validar + registrar login
            $usuEmail = $_POST['usuEmail'];
            $usuClave = $_POST['usuClave'];
            $link = Conexion::conectar();
            $sql = "SELECT usuNombre, usuID
                        FROM usuarios
                        WHERE usuEmail = :usuEmail
                          AND usuClave = :usuClave";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
            $stmt->bindParam(':usuClave', $usuClave, PDO::PARAM_STR);

            $stmt->execute();
            $cantidad = $stmt->rowCount();
            if( $cantidad == 0 ){
                //redirección a formLogin con mesaje de error
                header('location: formLogin.php?error=1');
            }
            else{
                $_SESSION['login'] = 1;
                $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['datosUsuario'] = $datosUsuario['usuID'];
                $_SESSION['usuID'] = $datosUsuario['usuID'];
                $_SESSION['datosUsuario'] = $datosUsuario['usuNombre'];
                $_SESSION['usuNombre'] = $datosUsuario['usuNombre'];
                //redirección a admin
                header('location: admin.php');
            }
        }
    public function logout()
        {
            session_unset();
            session_destroy();
            header('refresh:3; url=formLogin.php');
        }

    public function autenticar()
        {
            if(!isset($_SESSION['login'])){
                header('location: formLogin.php?error=2');
            }
        }
}