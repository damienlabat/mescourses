<?php

namespace App\Model\Entity;

use App\Model\Entity\Rayon;

class Liste extends Base
{
    protected $created_at;
    protected $id;
    protected $name;
    protected $slug;
    protected $user;
    protected $IP;
    protected $content;

    public function addContent(Rayon $rayon)
    {
        if (NULL==$this->content) $this->content=array();
        $this->content[]=$rayon;
    }

    public function getContent()
    {
        $res=array();
        foreach ($this->content as $rayon)
            $res[]=$rayon->toArray();
        return $res;
    }

    public function toCompressedArray()
    {
        $cArray=array(
            "liste" => array(
                "created_at" => $this->created_at,
                "name" => $this->name,
                "slug" => $this->slug),
            "content" => array()
            );

        if (NULL==$this->content) $this->content=array();


        foreach ($this->content as $rayon) {
            if ('stdClass'==get_class($rayon))   $cArray['content'][]=$rayon;
            else $cArray['content'][]= $rayon->toCompressedArray();
        }

        return $cArray;
    }

}
