<?php
namespace App;

class regionRoutes
{
    use Singleton;
    use RoutesConfig;

    public function configureRoutes($router)
    {

        $className = 'region';

        $this->configRoutes($router, $className);

        $router->post('/region', function () {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\region::getInstance()->addRegion(
                $data['nombreReg'],
                $data['idDep']
            );
        });

        $router->put('/region/{id}', function ($id) {
            $data = json_decode(file_get_contents("php://input"), true);
            \App\region::getInstance()->putRegion(
                $id,
                $data['nombreReg'],
                $data['idDep']
            );
        });
    }
}

?>