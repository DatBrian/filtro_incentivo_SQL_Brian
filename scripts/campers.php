<?php
namespace App;

use App\Singleton;

class campers
{
    use Singleton;

    private function query()
    {
        return 'SELECT campers.nombreCamper AS nombre, campers.apellidoCamper AS apellido, campers.fechaNac, region.nombreReg AS region
        FROM campers
        INNER JOIN region ON campers.idReg = region.idReg';
    }

    private $repository;
    private $message;
    private $queryGetAll;
    private $queryGetOne;

    public function __construct()
    {
        $this->repository = campersRepository::getInstance();
        $this->queryGetAll = $this->query();
        $this->queryGetOne = $this->query() . ' WHERE id = :identifier';
    }

    public function addCampers($nombreCamper, $apellidoCamper, $fechaNac, $idReg)
    {
        try {
            $this->repository->postCampers($nombreCamper, $apellidoCamper, $fechaNac, $idReg);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getAllCampers()
    {
        try {
            $this->repository->getAll($this->queryGetAll);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function getOneCampers($id)
    {
        try {
            $this->repository->getOne($id, $this->queryGetOne);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function deleteCampers($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }

    public function putCampers($id, $nombreCamper, $apellidoCamper, $fechaNac, $idReg)
    {
        try {
            $this->repository->putCampers($id, $nombreCamper, $apellidoCamper, $fechaNac, $idReg);
        } catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $e->getMessage()];
        } finally {
            print_r($this->message);
        }
    }
}


?>