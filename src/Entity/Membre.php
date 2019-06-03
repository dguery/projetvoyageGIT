<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 */
class Membre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="unMembre", orphanRemoval=true)
     */
    private $MesAvis;

    public function __toString(){
      return "Membre :".$this->getNom();
    }

    public function __construct()
    {
        $this->MesAvis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getMesAvis(): Collection
    {
        return $this->MesAvis;
    }

    public function addMesAvi(Avis $mesAvi): self
    {
        if (!$this->MesAvis->contains($mesAvi)) {
            $this->MesAvis[] = $mesAvi;
            $mesAvi->setUnMembre($this);
        }

        return $this;
    }

    public function removeMesAvi(Avis $mesAvi): self
    {
        if ($this->MesAvis->contains($mesAvi)) {
            $this->MesAvis->removeElement($mesAvi);
            // set the owning side to null (unless already changed)
            if ($mesAvi->getUnMembre() === $this) {
                $mesAvi->setUnMembre(null);
            }
        }

        return $this;
    }
}
