<?php
namespace App;

class departamentoRoutes
{
    use Singleton;
    use RoutesConfig;

    public function configureRoutes($router)
    {

        $className = 'departamento';

        $this->configRoutes($router, $className);

        $router->post('/departamento', function () {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\departamento::getInstance()->addDepartamento(
                $data['nombreDep'],
                $data['idPais']
            );
        });

        $router->put('/departamento/{id}', function ($id) {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\departamento::getInstance()->putDepartamento(
                $id,
                $data['nombreDep'],
                $data['idPais']
            );
        });
    }
}

?>