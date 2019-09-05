<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 */
class Periode
{

    /**
     * 
     */
    private $debut;

    /**
     * 
     */
    private $fin;

    public function __construct()
    {
        $this->fin=new \Datetime();
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(?\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }
}
