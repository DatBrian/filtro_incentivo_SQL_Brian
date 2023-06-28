<?php
namespace App;

// ? Trait for common methods (get and delete)

trait CommonMethods
{

    public function getAll($query = null)
    {
        $tableName = $this->getTable();
        $query = $query ?? "SELECT * FROM $tableName";

        try {
            $res = $this->conx->prepare($query);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function getOne($id, $query = null)
    {
        $tableName = $this->getTable();
        $query = $query ?? "SELECT * FROM $tableName WHERE id = :identifier";

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => $res->fetch(\PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function delete($id)
    {
        $tableName = $this->getTable();
        $query = "DELETE FROM $tableName WHERE id = :identifier";

        try {
            $res = $this->conx->prepare($query);
            $res->bindValue(':identifier', $id);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "Deleted Data"];
        } catch (\PDOException $e) {
            $this->message = ["Codee" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    abstract protected function getTable();
}

?>