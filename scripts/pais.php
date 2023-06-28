<?php
namespace App;

use App\Singleton;

class pais
{
    use Singleton;

    private function query()
    {
        return 'SELECT pais.IdPais, pais.nombrePais AS pais
        FROM pais';
    }

    private $repository;
    private $message;
    private $queryGetAll;
    private $queryGetOne;

    public function __construct()
    {
        $this->repository = paisRepository::getInstance();
        $this->queryGetAll = $this->query();
        $this->queryGetOne = $this->query() . ' WHERE id = :identifier';
    }

    public function addPais($nombrePais)
    {
        try {
            $this->repository->postPais($nombrePais);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getAllPais()
    {
        try {
            $this->repository->getAll($this->queryGetAll);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getOnePais($id)
    {
        try {
            $this->repository->getOne($id, $this->queryGetOne);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function deletePais($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function putCampers($id, $nombrePais)
    {
        try {
            $this->repository->putStaff($id, $nombrePais);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }
}


?>