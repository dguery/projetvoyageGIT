<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(type="string", length=70)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="unEtablissement", orphanRemoval=true)
     */
    private $LesAvis;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipement", inversedBy="LesEtablissements")
     */
    private $lesEquipements;


    public function __toString(){
      return "Etablissement : ".$this->getNom()." ".$this->getAdresse();
    }

    public function __construct()
    {
        $this->LesAvis = new ArrayCollection();
        $this->LesEquipements = new ArrayCollection();
        $this->lesEquipements = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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
    public function getLesAvis(): Collection {
        return $this->LesAvis;
    }

    public function addLesAvi(Avis $lesAvi): self {
        if (!$this->LesAvis->contains($lesAvi)) {
            $this->LesAvis[] = $lesAvi;
            $lesAvi->setUnEtablissement($this);
        }

        return $this;
    }

    public function removeLesAvi(Avis $lesAvi): self {
        if ($this->LesAvis->contains($lesAvi)) {
            $this->LesAvis->removeElement($lesAvi);
            // set the owning side to null (unless already changed)
            if ($lesAvi->getUnEtablissement() === $this) {
                $lesAvi->setUnEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Equipement[]
     */
    public function getLesEquipements(): Collection
    {
        return $this->lesEquipements;
    }

    public function addLesEquipement(Equipement $lesEquipement): self
    {
        if (!$this->lesEquipements->contains($lesEquipement)) {
            $this->lesEquipements[] = $lesEquipement;
        }

        return $this;
    }

    public function removeLesEquipement(Equipement $lesEquipement): self
    {
        if ($this->lesEquipements->contains($lesEquipement)) {
            $this->lesEquipements->removeElement($lesEquipement);
        }

        return $this;
    }

}
