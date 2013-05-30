<?php

namespace App\Model\Manager{

  use App\Model\Entity\Liste;
  use App\Utils;

  class ListeManager extends BaseManager
  {

    protected $table='liste';


    public function getUserLists($username)
    {
      $listes=$this->findAllWith( array('user'=>$username) );
      $res=array();
      foreach ($listes as $liste)
        $res[]=array('slug'=>$liste['slug'], 'name'=>$liste['name'] , 'created_at'=>$liste['created_at']);
      return $res;
    }


    public function getBySlug($slug)
    {
      if ($slug=='full') return $this->getFull();

      $data=$this->findBySlug($slug);
      if (FALSE !== $data) {
          $data['content']=json_decode($data['content']);
          $liste= new Liste($data);
          return $liste->toCompressedArray();
        }
        return NULL;
    }



    public function getFull()
    {
      $liste=new Liste();

      $liste->slug='full';
      $liste->name='liste complète';
      $liste->created_at=date('Y-m-d H:i:s');

      $pos=0;

      foreach ( $this->app['rayon_manager']->getAll() as $rayon) {
        foreach ($this->app['article_manager']->getAllByRayon($rayon) as $article)
          $rayon->addArticle($article);
        $rayon->position= $pos;
        $pos++;
        $liste->addContent($rayon);
      }

      return $liste->toCompressedArray();
    }



    public function check($liste)
    {
      //validate
      $validList=array();
      foreach ($liste as $rayon) {
        $validRayon= $this->app['rayon_manager']->checkedRayon( $rayon );
        if (FALSE!==$validRayon) {

          $validRayon['a']=array();
          foreach ($rayon['a'] as $article) {
            $validArticle= $this->app['article_manager']->checkedArticle( $article );
             if (FALSE!==$validArticle)  $validRayon['a'][]=$validArticle;
          }
          $validList[]=$validRayon;
        }
      }

      return $validList;
    }


  public function exist($name,$content,$user)
    {
      $liste= $this->findWith( array('user'=>(string) $user,'name'=>(string) $name,'content'=>(string) json_encode($content)) );
      if ($liste!==FALSE) $liste=new Liste($liste);
      return $liste;
    }


  public function newListe($name,$content,$user)
  {

    $liste=new Liste( array(
      'created_at'=> date('Y-m-d H:i:s'),
      'name'=> $name,
      'slug'=> $this->getNewSlug(),
      'user'=>$user,
      'IP'=> $this->app['request']->getClientIp(),
      'content'=> json_encode($content)
      ) );

    $this->save($liste);
    return $liste;
  }




    public function getNewSlug($nc=6)
    {
        $slug=Utils::gaxuxa($nc);
        $exist=$this->getBySlug($slug);

        if (NULL!=$exist) $slug= $this->getNewSlug($nc+1);
        return $slug;
    }





    public function getNewUserSlug($nc=12)
    {
        $user=Utils::gaxuxa($nc);
        $exist=$this->findWith( array('user'=>$user) );
        if (NULL!=$exist) $slug= $this->getNewUserSlug($nc+1);
        return $user;
    }



  }
}
