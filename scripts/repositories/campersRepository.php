<?php
namespace App;

class campersRepository extends connection
{
    use Singleton;
    use CommonMethods;
    // use Validations;

    private $message;

    // ? Function to define the name of the table in trait methods
    protected function getTable()
    {
        return 'campers';
    }

    public function postCampers($nombreCamper, $apellidoCamper, $fechaNac, $idReg)
    {
        $query = 'INSERT INTO campers (nombreCamper, apellidoCamper, fechaNac, idReg)
        VALUES (:nombre, :apellido, :fecha, :region)';

        //? Post Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':nombre', $nombreCamper, \PDO::PARAM_STR);
            $res->bindValue(':apellido', $apellidoCamper, \PDO::PARAM_STR);
            $res->bindValue(':fecha', $fechaNac, \PDO::PARAM_STR);
            $res->bindValue(':region', $idReg, \PDO::PARAM_STR);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Inserted Data"];

        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function putCampers($id, $nombreCamper, $apellidoCamper, $fechaNac, $idReg)
    {
        $query = 'UPDATE campers SET nombreCamper = :nombre, apellidoCamper = :apellido, fechaNac = :fecha, idReg = :region WHERE id = :identificador';

        //? Put Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id, \PDO::PARAM_STR);
            $res->bindValue(':identifier', $nombreCamper, \PDO::PARAM_STR);
            $res->bindValue(':apellido', $apellidoCamper, \PDO::PARAM_STR);
            $res->bindValue(':fecha', $fechaNac, \PDO::PARAM_STR);
            $res->bindValue(':region', $idReg, \PDO::PARAM_STR);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Updated Data"];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
}

?>