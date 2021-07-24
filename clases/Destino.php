<?php

    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        protected $regNombre;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;
        // private $destImg1;
        // private $destImg2;
        // private $destImg3;
        // private $destImg4;

            public function listarDestinos()
            {
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre, 
                            d.regID, r.regNombre, 
                            destPrecio, 
                            destAsientos, destDisponibles, 
                            destActivo
                        FROM destinos d, regiones r
                        WHERE d.regID = r.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();

            $destinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $destinos;
            }


            public function verDestinoPorID()
            {
            $destID = $_GET['destID'];
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre, 
                            destinos.regID, regNombre,  
                            destPrecio, 
                            destAsientos, destDisponibles,
                            destActivo
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
                $sql = "INSERT INTO destinos
                                    (destNombre, regID, destPrecio, destAsientos, destDisponibles)
                                VALUES
                                 (:destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles) ";
                $stmt = $link->prepare($sql);
                $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
                $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
                $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
                $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
                $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
                if ( $stmt->execute() )
                  {
                   $this->setDestNombre($destNombre); 
                   $this->setRegID($regID);
                   $this->setDestPrecio($destPrecio);
                   $this->setDestAsientos($destAsientos);
                   $this->setDestDisponibles($destDisponibles);
                   $this->setDestID($link->lastInsertId()); 
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
              $sql = "UPDATE destinos
                        SET destNombre = :destNombre,
                            regID = :regID,
                            destPrecio = :destPrecio,
                            destAsientos = :destAsientos,
                            destDisponibles = :destDisponibles
                      WHERE destID = :destID";
              $stmt = $link->prepare($sql);
              $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
              $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
              $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
              $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
              $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
              $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
              if ( $stmt->execute() )
              {
                $this->setDestNombre($destNombre); 
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
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


    //         /**
    //      * @return mixed
    //      */
    //     public function getDestImg1()
    //     {
    //         return $this->destImg1;
    //     }

    //     /**
    //      * @param mixed $destImg1
    //      */
    //     public function setDestImg1($destImg1): void
    //     {
    //         $this->destImg1 = $destImg1;
    //     }


    //       /**
    //      * @return mixed
    //      */
    //     public function getDestImg2()
    //     {
    //         return $this->destImg2;
    //     }

    //     /**
    //      * @param mixed $destImg2
    //      */
    //     public function setDestImg2($destImg2): void
    //     {
    //         $this->destImg2 = $destImg2;
    //     }

    //       /**
    //      * @return mixed
    //      */
    //     public function getDestImg3()
    //     {
    //         return $this->destImg3;
    //     }

    //     /**
    //      * @param mixed $destImg3
    //      */
    //     public function setDestImg3($destImg3): void
    //     {
    //         $this->destImg3 = $destImg3;
    //     }

    //               /**
    //      * @return mixed
    //      */
    //     public function getDestImg4()
    //     {
    //         return $this->destImg4;
    //     }

    //     /**
    //      * @param mixed $destImg4
    //      */
    //     public function setDestImg4($destImg4): void
    //     {
    //         $this->destImg4 = $destImg4;
    //     }
     }






    
