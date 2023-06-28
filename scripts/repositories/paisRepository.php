<?php
namespace App;

class paisRepository extends connection
{
    use Singleton;
    use CommonMethods;
    // use Validations;

    private $message;

    // ? Function to define the name of the table in trait methods
    protected function getTable()
    {
        return 'pais';
    }

    public function postPais($nombrePais)
    {
        $query = 'INSERT INTO pais (nombrePais)
        VALUES (:nombre)';

        //? Post Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':nombre', $nombrePais, \PDO::PARAM_STR);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Inserted Data"];

        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function putPais($id, $nombrePais)
    {
        $query = 'UPDATE pais SET nombrePais = :nombre WHERE id = :identifier';

        //? Put Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id, \PDO::PARAM_STR);
            $res->bindValue(':nombre', $nombrePais, \PDO::PARAM_STR);
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