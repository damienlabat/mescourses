<?php
namespace App;

use \Silex\Application;
use Symfony\Component\HttpFoundation\Cookie;

class CookiesManager
{

  protected $app;
  protected $cookies=array();

  public function __construct(Application $app)
  {
    $this->app = $app;
  }


  public function sendCookies($response)
  {
    foreach ($this->cookies as $cookie ) {
        $dt = new \DateTime();
        $dt->modify($cookie['time']);
        $c = new Cookie($cookie['name'], $cookie['value'], $dt);
        $response->headers->setCookie($c);
     }
  }


  public function addCookie($name, $value, $time="+1 week")
  {
      $this->cookies[]=array( 'name'=>$name, 'value'=>$value, 'time'=>$time, );
  }

}
