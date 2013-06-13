<?php
// app/app.php


define('ROOT',dirname(__DIR__));
define('APPROOT',ROOT.'/App');


$loader = require ROOT."/vendor/autoload.php";


$app = new Silex\Application();


//use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Silex\Provider\HttpCacheServiceProvider;
//use App\Controller;


# bootstrap
$app = new Silex\Application();

#debug
$app['CONFIG'] = getenv("CONFIG")?getenv("CONFIG"):"false";

$app['cookies'] = array();

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/cache/',
));


//see http://silex.sensiolabs.org/doc/cookbook/json_request_body.html
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});


# cookies manager
$app['cookies_manager'] = $app->share(
  function($app) {
    return new \App\CookiesManager($app);
  }
 );

$app->after(function (Request $request, Response $response) use ( $app ) {
      $app['cookies_manager']->sendCookies($response);
    });



if (getenv("CONFIG")) require_once APPROOT.'/database/'.getenv("CONFIG").'.php';
  else require_once APPROOT.'/database.php';




# user manager
$app['user_manager'] = $app->share(
  function($app) {
    return new \App\UserManager($app);
  }
 );

# liste manager
$app['liste_manager'] = $app->share(
  function($app) {
    return new \App\Model\Manager\ListeManager($app);
  }
 );

# rayon manager
$app['rayon_manager'] = $app->share(
  function($app) {
    return new \App\Model\Manager\RayonManager($app);
  }
 );

# article manager
$app['article_manager'] = $app->share(
  function($app) {
    return new \App\Model\Manager\ArticleManager($app);
  }
 );


require_once APPROOT.'/routes.php';

//echo '<pre>';print_r($app['autoloader']);

return $app;
