<?php


use App\Controller;
//use Symfony\Component\HttpFoundation\Request;

$app->mount("/",        new App\Controller\IndexController());
$app->mount("/liste",   new App\Controller\ListeController());

/*
function setUserCookie(Request $request)
{
    $username=$request->cookies->get('mescourses.user');
    if (null==$username) $username='toto';

    $dt = new \DateTime();
    $dt->modify("+1 year");
    $cookie = new Cookie("mescourses.user", $username, $dt);

    return $cookie;
}*/
