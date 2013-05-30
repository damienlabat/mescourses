<?php
namespace App\Controller{

    use Silex\Application;
    use Silex\ControllerProviderInterface;
    //use Silex\ControllerCollection;

    class IndexController implements ControllerProviderInterface
    {
        /**
        *@var string
        */


        public function index(Application $app)
        {
            return 'index';
        }

        public function about(Application $app)
        {
            return 'about';
        }


        public function info(Application $app)
        {
            return phpinfo();
        }

        public function connect(Application $app)
        {
            // créer un nouveau controller basé sur la route par défaut
            $index = $app['controllers_factory'];
            $index->get("/",			'App\Controller\IndexController::index');
            $index->get("/info",		'App\Controller\IndexController::info');
            $index->get("/about",		'App\Controller\IndexController::about');
            return $index;
        }
    }

}
