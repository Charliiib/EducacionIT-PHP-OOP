<?php

    class destino
    {
        public $destID;
        public $destNombre;
        public $regID;
        public $regNombre;
        public $destPrecio;
        public $destAsientos;
        public $destDisponibles;
        public $destActivo;
        public $destImagen;


            public function listarDestinos()
            {
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre, 
                            d.regID, r.regNombre, 
                            destPrecio, 
                            destAsientos, destDisponibles, 
                            destActivo, destImagen
                        FROM destinos d, regiones r
                        WHERE d.regID = r.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $destinos;
            }

            public function subirImagen()
            {
                //imagen predeterminada si no enviaron nada
                // EN AGREGAR
                $destImagen = 'noDisponible.jpg';
    
                // imagen original en MODIFICAR si no enviaron nada
                if( isset( $_POST['destImagenOriginal'] ) )
                {
                    $destImagen = $_POST['destImagenOriginal'];
                }
    
                // si enviaron algo tanto en agregar como en modificar
                if( $_FILES['destImagen']['error'] == 0 )
                {
                    $dir = 'destinos/';
                    $tmp = $_FILES['destImagen']['tmp_name'];
                    $destImagen = $_FILES['destImagen']['name'];
                    move_uploaded_file( $tmp, $dir.$destImagen );
                }
                return $destImagen;
            }


            public function verDestinoPorID()
            {
            $destID = $_GET['destID'];
            $link = Conexion::conectar();
            $sql = "SELECT 
                            destID, destNombre, 
                            destinos.regID, regNombre,  
                            destPrecio, destAsientos, destDisponibles,
                            destActivo, destImagen
                       FROM destinos, regiones
                       WHERE destinos.regID = regiones.regID
                         AND destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            if ( $stmt->execute() )
              {
                $destino = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->setDestID($destID);
                $this->setDestNombre($destino['destNombre']);
                $this->setRegID($destino['regID']);
                $this->setRegNombre($destino['regNombre']);
                $this->setDestPrecio($destino['destPrecio']);
                $this->setDestAsientos($destino['destAsientos']);
                $this->setDestDisponibles($destino['destDisponibles']);
                $this->setDestImagen($destino['destImagen']);
                $this->setDestActivo(1);
                return true;
              }
              return false;
            }

          
    


            public function agregarDestino()
                {
                $link = Conexion::conectar();
                $destNombre = $_POST['destNombre'];
                $regID = $_POST['regID'];
                $destPrecio = $_POST['destPrecio'];
                $destAsientos = $_POST['destAsientos'];
                $destDisponibles= $_POST['destDisponibles'];
                $destImagen  = Destino::subirImagen();
                $sql = "INSERT INTO destinos
                                    (destNombre, regID, destPrecio, destAsientos, destDisponibles, destImagen)
                                VALUES
                                 (:destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles, :destImagen) ";
                $stmt = $link->prepare($sql);
                $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
                $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
                $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
                $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
                $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
                $stmt->bindParam(':destImagen', $destImagen, PDO::PARAM_STR);
                if ( $stmt->execute() )
                  {
                   $this->setDestID($link->lastInsertId()); 
                   $this->setDestNombre($destNombre); 
                   $this->setRegID($regID);
                   $this->setDestPrecio($destPrecio);
                   $this->setDestAsientos($destAsientos);
                   $this->setDestDisponibles($destDisponibles);
                   $this->setDestImagen($destImagen);
                  
                   return true;
                  }
                  return false;
                }


             





            public function modificarDestino()
            {
              $link = Conexion::conectar();
              $destNombre = $_POST['destNombre'];
              $regID = $_POST['regID'];
              $destPrecio = $_POST['destPrecio'];
              $destAsientos = $_POST['destAsientos'];
              $destDisponibles = $_POST['destDisponibles'];
              $destID = $_POST['destID'];
              $destImagen  = Destino::subirImagen();
              $sql = "UPDATE destinos
                        SET destNombre = :destNombre,
                            regID = :regID,
                            destPrecio = :destPrecio,
                            destAsientos = :destAsientos,
                            destDisponibles = :destDisponibles,
                            destImagen = :destImagen
                      WHERE destID = :destID";
              $stmt = $link->prepare($sql);
              $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
              $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
              $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
              $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
              $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
              $stmt->bindParam(':destImagen', $destImagen, PDO::PARAM_STR);
              $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
              if ( $stmt->execute() )
              {
                $this->setDestNombre($destNombre); 
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                $this->setDestImagen($destImagen);
                $this->setDestID($destID);
                return true;
              }
              return false;
            }



            public function eliminarDestino()
            {
            $destID = $_POST['destID'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM destinos
                        WHERE destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            if( $stmt->execute() )
              {
                $this->setDestID( $destID );
                return true;
              }
              return false;
            }




        /**
         * @return mixed
         */
        public function getDestID()
        {
            return $this->destID;
        }

        /**
         * @param mixed $destID
         */
        public function setDestID($destID): void
        {
            $this->destID = $destID;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre): void
        {
            $this->destNombre = $destNombre;
        }

        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }

        /**
         * @param mixed $regID
         */
        public function setRegID($regID): void
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public function getRegNombre()
        {
            return $this->regNombre;
        }

        /**
         * @param mixed $regNombre
         */
        public function setRegNombre($regNombre): void
        {
            $this->regNombre = $regNombre;
        }



        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio): void
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos): void
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles): void
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo): void
        {
            $this->destActivo = $destActivo;
        }


        /**
         * @return mixed
         */
        public function getDestImagen()
        {
            return $this->destImagen;
        }

        /**
         * @param mixed $destImagen
         */
        public function setDestImagen($destImagen)
        {
            $this->destImagen = $destImagen;
        }


    
}