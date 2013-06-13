<?php
namespace App\Controller{

    use Silex\Application;
    use Silex\ControllerProviderInterface;
    //use Silex\ControllerCollection;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Silex\Provider\SessionServiceProvider;

    class ListeController implements ControllerProviderInterface
    {
        /**
        *@var string
        */


        public function index(Request $request,Application $app)
        {
            $username= $app['user_manager']->getUser($request);
            $res=  $app['liste_manager']->getUserLists($username);
            return $app->json($res);
        }



        public function liste($id,Application $app)
        {
            $res= $app['liste_manager']->getBySlug($id);
            if (NULL == $res) return new Response( json_encode( array('error'=>"La liste '$id' n'existe pas.")), 404 );

            $cache_max_age = 3600 * 24 * 1;
            $response = new Response(
                json_encode($res),
                200,
                array("Content-Type" => "application/json",
                    "public" => TRUE,
                    "max_age" => $cache_max_age,
                    "s_maxage" => $cache_max_age,
                    "expires" => date('r', time()+$cache_max_age)
                )
            );

            return $response;
        }



        public function put(Request $request,Application $app)
        {
            $username= $app['user_manager']->getUser($request);
            $name= $request->request->get('name');
            $data= $app['liste_manager']->check( $request->request->get('liste') );

            $liste= $app['liste_manager']->exist($name,$data,$username);

            if ($liste===FALSE)
                $liste= $app['liste_manager']->newListe($name,$data,$username);

            return $app->json(array('slug'=>$liste->slug, 'name'=>$liste->name, 'created_at'=>$liste->created_at));
        }



        public function connect(Application $app)
        {
            // créer un nouveau controller basé sur la route par défaut
            $index = $app['controllers_factory'];

            $index->get("/",'App\Controller\ListeController::index');
            $index->put("/",'App\Controller\ListeController::put');

            $index->get("/{id}.json",	'App\Controller\ListeController::liste');

            return $index;
        }



    }
}
