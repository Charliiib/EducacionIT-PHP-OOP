<?php

    class Usuario
    {
        
        private $usuID;
        private $usuNombre;
        private $usuLogin;
        private $usuClave;
        private $usuEmail;
    
    
        public function listarUsuarios()
        {
            $link = Conexion::conectar();
            $sql = "SELECT usuID, usuNombre, usuLogin, usuEmail, usuClave
                                        FROM usuarios";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }
        public function verUsuarioPorID()
        {
            $link = Conexion::conectar();
            $usuID = $_GET['usuID'];
            $sql = "SELECT usuID, usuNombre, usuLogin, usuEmail
                    FROM usuarios
                    WHERE usuID = ".$usuID;
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setUsuID( $datosUsuario['usuID'] );
            $this->setUsuNombre( $datosUsuario['usuNombre'] );
            $this->setUsuLogin( $datosUsuario['usuLogin'] );
            $this->setUsuEmail( $datosUsuario['usuEmail'] );
            return $this;
        }
    
        public function  agregarUsuario()
        {
            $usuNombre = $_POST[ 'usuNombre'];
            $usuLogin = $_POST[ 'usuLogin'];
            $usuEmail = $_POST[ 'usuEmail'];
            $usuClave = $_POST['usuClave'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO usuarios
                            ( usuNombre, usuLogin, usuEmail, usuClave )
                 VALUES
                            (:usuNombre, :usuLogin, :usuEmail, :usuClave)";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':usuNombre', $usuNombre, PDO::PARAM_STR);
            $stmt->bindParam(':usuLogin', $usuLogin, PDO::PARAM_STR);
            $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
            $stmt->bindParam(':usuClave', $usuClave, PDO::PARAM_STR);
            if( $stmt->execute() )
            {   // registramos atributos en el objeto
                $this->setUsuID( $link->lastInsertId() );
                $this->setUsuNombre($usuNombre);
                $this->setUsuLogin($usuLogin);
                $this->setUsuEmail($usuEmail);
                $this->setUsuClave($usuClave);
                return true;
            }
            return false;
        }
    
        public function modificarUsuario()
        {
            $usuID = $_POST['usuID'];
            $usuNombre = $_POST['usuNombre'];
            $usuLogin = $_POST['usuLogin'];
            $usuEmail = $_POST['usuEmail'];
            $link = Conexion::conectar();
            $sql = "UPDATE usuarios
                    SET usuNombre = :usuNombre,
                            usuLogin = :usuLogin,
                            usuEmail = :usuEmail
                  WHERE usuID = :usuID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':usuID', $usuID, PDO::PARAM_INT);
            $stmt->bindParam(':usuNombre', $usuNombre, PDO::PARAM_STR);
            $stmt->bindParam(':usuLogin', $usuLogin, PDO::PARAM_STR);
            $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
            if( $stmt->execute() )
            {
                $this->setUsuID( $usuID);
                $this->setUsuNombre($usuNombre);
                $this->setUsuLogin($usuLogin);
                $this->setUsuEmail($usuEmail);
                return true;
            }
            return false;
        }
    
        public function modificarPassword()
        {
            $usuID = $_POST['usuID'];
            $usuClave = $_POST['usuClave']; //ver xq usu Clave1
            $link = Conexion::conectar();
            $sql = "UPDATE usuarios
                        SET usuClave = :usuClave
                  WHERE usuID = :usuID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':usuID', $usuID, PDO::PARAM_INT);
            $stmt->bindParam(':usuClave', $usuClave, PDO::PARAM_STR);
            if( $stmt->execute() )
            {
                $this->setUsuID( $usuID);
                $this->setUsuClave($usuClave);
                return true;
            }
            return false;
        }
    
        public function eliminarUsuario()
        {
            $usuID = $_POST['usuID'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM usuarios
                        WHERE usuID = :usuID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':usuID', $usuID, PDO::PARAM_INT);
            if( $stmt->execute() )
            {
                $this->setUsuID($usuID);
                return true;
            }
            return false;
        }
    
    
    
    
    
    
    
        /**
         * @return mixed
         */
        public function getUsuID()
        {
            return $this->usuID;
        }
    
        /**
         * @param mixed $usuID
         */
        public function setUsuID($usuID): void
        {
            $this->usuID = $usuID;
        }
    
        /**
         * @return mixed
         */
        public function getUsuNombre()
        {
            return $this->usuNombre;
        }
    
        /**
         * @param mixed $usuNombre
         */
        public function setUsuNombre($usuNombre): void
        {
            $this->usuNombre = $usuNombre;
        }
    
        /**
         * @return mixed
         */
        public function getUsuLogin()
        {
            return $this->usuLogin;
        }
    
        /**
         * @param mixed $usuLogin
         */
        public function setUsuLogin($usuLogin): void
        {
            $this->usuLogin = $usuLogin;
        }
    
        /**
         * @return mixed
         */
        public function getUsuClave()
        {
            return $this->usuClave;
        }
    
        /**
         * @param mixed $usuClave
         */
        public function setUsuClave($usuClave): void
        {
            $this->usuClave = $usuClave;
        }
    
        /**
         * @return mixed
         */
        public function getUsuEmail()
        {
            return $this->usuEmail;
        }
    
        /**
         * @param mixed $usuEmail
         */
        public function setUsuEmail($usuEmail): void
        {
            $this->usuEmail = $usuEmail;
        }

    }
    
    
