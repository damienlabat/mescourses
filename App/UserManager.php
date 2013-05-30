<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;
use \Silex\Application;

class UserManager
{

  protected $app;
  protected $username;

  public function __construct($app)
  {
    $this->app = $app;

  }


  public function getUser(Request $request)
  {
    $this->username= $request->cookies->get("mescourses_username");
    if ($this->username=='') $this->getNewUser();
    return $this->username;
  }

  public function getNewUser()
  {
    $this->setUser( $this->app['liste_manager']->getNewUserSlug() );
  }

  public function setUser($username)
  {
      $this->username=$username;
      $this->app['cookies_manager']->addCookie('mescourses.username', $this->username, '+1 year');
  }

}
