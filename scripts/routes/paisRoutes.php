<?php
namespace App;

class paisRoutes
{
    use Singleton;
    use RoutesConfig;

    public function configureRoutes($router)
    {

        $className = 'pais';

        $this->configRoutes($router, $className);

        $router->post('/pais', function () {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\pais::getInstance()->addPais(
                $data['nombrePais']
            );
        });

        $router->put('/pais/{id}', function ($id) {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\pais::getInstance()->putPais(
                $id,
                $data['nombrePais']
            );
        });
    }
}

?>