<?php
namespace App;

use App\Singleton;

class region
{
    use Singleton;

    private function query()
    {
        return 'SELECT region.idReg, region.nombreReg AS region,  departamento.nombreDep AS departamento
        FROM region
        INNER JOIN departamento ON region.idReg = departamento.idDept';
    }

    private $repository;
    private $message;
    private $queryGetAll;
    private $queryGetOne;

    public function __construct()
    {
        $this->repository = regionRepository::getInstance();
        $this->queryGetAll = $this->query();
        $this->queryGetOne = $this->query() . ' WHERE id = :identifier';
    }

    public function addRegion($nombreReg, $idDep)
    {
        try {
            $this->repository->postRegion($nombreReg, $idDep);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getAllRegion()
    {
        try {
            $this->repository->getAll($this->queryGetAll);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getOneRegion($id)
    {
        try {
            $this->repository->getOne($id, $this->queryGetOne);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function deleteRegion($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function putRegion($id, $nombreReg, $idDep)
    {
        try {
            $this->repository->putRegions($id, $nombreReg, $idDep);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }
}


?>