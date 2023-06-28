<?php
namespace App;

class campersRoutes
{
    use Singleton;
    use RoutesConfig;

    public function configureRoutes($router)
    {

        $className = 'campers';

        $this->configRoutes($router, $className);

        $router->post('/campers', function () {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\campers::getInstance()->addCampers(
                $data['nombreCamper'],
                $data['apellidoCamper'],
                $data['fechaNac'],
                $data['idReg']
            );
        });

        $router->put('/campers/{id}', function ($id) {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\campers::getInstance()->putCampers(
                $id,
                $data['nombreCamper'],
                $data['apellidoCamper'],
                $data['fechaNac'],
                $data['idReg']
            );
        });
    }
}

?>