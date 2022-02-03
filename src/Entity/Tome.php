<?php

namespace App\Entity;

use App\Repository\TomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TomeRepository::class)
 * @ORM\Table(name="Tome")
 */
class Tome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_tome;

    /**
     * @ORM\Column(type="integer")
     */
    private $idManga;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroTome;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $editeur;


    /**
    * @ORM\Column(type="string", length=50)
    */
    private $sideStory;

    /**
     * @ORM\Column(type="integer")
     */
    private $idSideS;


    /**
     * @ORM\Column(type="boolean")
     */
    private $lu;


    public function getid_tome(): ?int
    {
        return $this->id;
    }

    public function getIdManga(): ?int
    {
        return $this->idManga;
    }

    public function setIdManga(int $idManga): self
    {
        $this->idManga = $idManga;

        return $this;
    }

    public function getNumeroTome(): ?int
    {
        return $this->numeroTome;
    }

    public function setNumeroTome(int $numeroTome): self
    {
        $this->numeroTome = $numeroTome;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getSideStory(): ?string
    {
        return $this->sideStory;
    }

    public function setSideStory(string $sideStory): self
    {
        $this->sideStory = $sideStory;

        return $this;
    }

    public function getIdSideS(): ?int
    {
        return $this->idSideS;
    }

    public function setIdSideS(int $idSideS): self
    {
        $this->idSideS = $idSideS;

        return $this;
    }

    public function getLu(): ?bool
    {
        return $this->lu;
    }

    public function setLu(bool $lu): self
    {
        $this->lu = $lu;

        return $this;
    }

}
