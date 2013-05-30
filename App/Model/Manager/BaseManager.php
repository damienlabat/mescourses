<?php
namespace App\Model\Manager;

use \Silex\Application;

class BaseManager
{

  protected $app;





  public function __construct($app)
  {
    $this->app = $app;
  }



  public function find($id)
  {
    return $this->findWith( array('id'=> (int) $id) );
  }

  public function findBySlug($slug)
  {
    return $this->findWith( array('slug'=> (string) $slug) );
  }

    public function findByName($name)
  {
    return $this->findWith( array('name'=> (string) $name) );
  }









public function findWith($array)
  {
    $req= "SELECT * FROM " . $this->table . " WHERE ";
    foreach (array_keys($array) as $k => $field) {
      if ($k>0) $req.=" AND ";
      $req.=$field." = ?";
    }
    $res=$this->app['db']->fetchAssoc( $req, array_values($array) );

    return  $res;
  }








  public function all($orderBy=null)
  {
    return $this->findAllWith(array(),$orderBy);
  }





  public function findAllWith($array,$orderBy=NULL)
  {
    $req= "SELECT * FROM " . $this->table;
    if (count($array)) $req.= " WHERE ";
    foreach (array_keys($array) as $k => $field) {
      if ($k>0) $req.=" AND ";
      $req.=$field." = ?";
    }

    if (NULL!=$orderBy) $req.=" ORDER BY `".array_shift(array_keys($orderBy))."` COLLATE utf8_general_ci ".array_shift(array_values($orderBy));



    $res=$this->app['db']->fetchAll( $req, array_values($array) );
    return (NULL!==$res) ? $res : array();
  }








  public function save($obj)
  {
   $array=$obj->toArray();

    if (isset($array['id'])) $this->app['db']->update($this->table, $array, array('id' => $array['id']));
      else {
       $this->app['db']->insert($this->table, $array);
       $obj->id=$this->app['db']->lastInsertId();
        }
  }


}
