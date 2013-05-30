<?php

namespace App\Model\Entity;


class Article extends Base
{
    protected $id;
    protected $name;
    protected $rayon_id;

    protected $quantite;
    protected $info;

    public function toCompressedArray()
    {
        $cArray=array( "n" => $this->name );
        if (0<$this->quantite) $cArray['v']=$this->quantite;
        if (NULL!==$this->info) $cArray['i']=$this->info;

        return $cArray;
    }
}
