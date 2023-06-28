<?php
namespace App;

class regionRepository extends connection
{
    use Singleton;
    use CommonMethods;
    // use Validations;

    private $message;

    // ? Function to define the name of the table in trait methods
    protected function getTable()
    {
        return 'region';
    }

    public function postRegion($nombreReg, $idDep)
    {
        $query = 'INSERT INTO region (nombreReg, idDep)
        VALUES (:region, :dep)';

        //? Post Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':region', $nombreReg, \PDO::PARAM_STR);
            $res->bindValue(':dep', $idDep, \PDO::PARAM_STR);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Inserted Data"];

        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function putRegion($id, $nombreReg, $idDep)
    {
        $query = 'UPDATE region SET nombreRegion = :region, idDep = :dep WHERE id = :identificador';

        //? Put Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id, \PDO::PARAM_STR);
            $res->bindValue(':region', $nombreReg, \PDO::PARAM_STR);
            $res->bindValue(':dep', $idDep, \PDO::PARAM_STR);
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