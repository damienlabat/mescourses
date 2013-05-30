<?php

namespace App\Model\Entity;

use App\Model\Entity\Article;

class Rayon extends Base
{
    protected $id;
    protected $name;
    protected $articles;
    protected $position=0;
    protected $color=0;

    public function addArticle(Article $article)
    {
        if (NULL==$this->articles) $this->articles=array();
        $this->articles[]=$article;
    }

    public function getArticles()
    {
        $res=array();
        foreach ($this->articles as $article)
            $res[]=$article->toArray();
        return $res;
    }

    public function toCompressedArray()
    {
        $cArray=array(
            "n" => $this->name,
            "c" => $this->color,
            "p" => $this->position,
            "a" => array()
            );
        if (NULL!=$this->articles)
        foreach ($this->articles as $article)
            $cArray['a'][]= $article->toCompressedArray();

        return $cArray;
    }
}
