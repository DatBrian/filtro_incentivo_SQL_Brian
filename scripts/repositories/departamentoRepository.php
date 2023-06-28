<?php
namespace App;

class departamentoRepository extends connection
{
    use Singleton;
    use CommonMethods;
    // use Validations;

    private $message;

    // ? Function to define the name of the table in trait methods
    protected function getTable()
    {
        return 'departamento';
    }

    public function postDepartamento($nombreDep, $idPais)
    {
        $query = 'INSERT INTO departamento (nombreDep, idPais)
        VALUES (:nombre, :pais)';

        //? Post Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':nombre', $nombreDep, \PDO::PARAM_STR);
            $res->bindValue(':pais', $idPais, \PDO::PARAM_STR);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Inserted Data"];

        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function putDepartamento($id, $nombreDep, $idPais)
    {
        $query = 'UPDATE departamento SET nombreDep = :nombre, idPais = :pais WHERE id = :identificador';

        //? Put Query

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id, \PDO::PARAM_STR);
            $res->bindValue(':nombre', $nombreDep, \PDO::PARAM_STR);
            $res->bindValue(':pais', $idPais, \PDO::PARAM_STR);
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