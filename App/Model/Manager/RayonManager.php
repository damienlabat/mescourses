<?php

namespace App\Model\Manager{

  use App\Model\Entity\Rayon;

  class RayonManager extends BaseManager
  {

    protected $table='rayon';

    public function getByName($name)
    {

      $data=$this->findByName($name);
      if (NULL != $data) return new Rayon($data);
        return null;
    }

    public function getAll()
    {

      $res=array();
      $data=$this->all(array('name'=>'ASC')); // todo add order by
      foreach ($data as $value)
          $res[]=new Rayon($value);

      return $res;
    }


    public function checkedRayon($rayon)
    {
      if (!isset($rayon['n'])) return FALSE;

      $rayonObj= New Rayon( array('name'=>$rayon['n'], 'color'=>$rayon['c'], 'position'=>$rayon['p']) );
      return $rayonObj->toCompressedArray();
    }


  }
}
