<?php

namespace App\Model\Manager{

  use App\Model\Entity\Article;
  use App\Model\Entity\Rayon;

  class ArticleManager extends BaseManager
  {

   /* protected $table='article';

    public function getByName($rayonId, $name)
    {

      $data=$this->findByName($name); //change add rayon id
      if (NULL != $data) return new Article($data);
        return null;
    }

     public function getAllByRayon(Rayon $rayon)
     {
      $res=array();
      $data=$this->findAllWith(array('rayon_id'=>$rayon->id), array('name'=>'ASC'));
      foreach ($data as $value)
        $res[]=new Article($value);

      return $res;
     }*/


    public function checkedArticle(Array $article)
    {
      if (!isset($article['n'])) return FALSE;
      if (!isset($article['v'])) $article['v']=0;
      if (!isset($article['i'])) $article['i']=NULL;


      $articleObj= New Article( array('name'=>$article['n'], 'quantite'=>$article['v'], 'info'=>$article['i']) );
      return $articleObj->toCompressedArray();


    }



  }
}
