<?php
namespace App;

use App\Singleton;

class departamento
{
    use Singleton;

    private function query()
    {
        return 'SELECT departamento.idDept, departamento.nombreDep AS departamento, pais.nombrePais AS pais
        FROM departamento
        INNER JOIN pais ON departamento.idPais = pais.iDPais';
    }

    private $repository;
    private $message;
    private $queryGetAll;
    private $queryGetOne;

    public function __construct()
    {
        $this->repository = departamentoRepository::getInstance();
        $this->queryGetAll = $this->query();
        $this->queryGetOne = $this->query() . ' WHERE id = :identifier';
    }

    public function addDepartamento($nombreDept, $idPais)
    {
        try {
            $this->repository->postDepartamento($nombreDept, $idPais);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getAllDepartamento()
    {
        try {
            $this->repository->getAll($this->queryGetAll);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getOneDepartamento($id)
    {
        try {
            $this->repository->getOne($id, $this->queryGetOne);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function deleteDepartamento($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function putDepartamento($id, $nombreDept, $idPais)
    {
        try {
            $this->repository->putDepartamento($id, $nombreDept, $idPais);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }
}


?>