<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipementRepository")
 */
class Equipement
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
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Etablissement", mappedBy="lesEquipements")
     */
    private $LesEtablissements;


    public function __toString(){
      return $this->libelle;
    }

    public function __construct()
    {
        $this->LesEtablissements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Etablissement[]
     */
    public function getLesEtablissements(): Collection
    {
        return $this->LesEtablissements;
    }

    public function addLesEtablissement(Etablissement $lesEtablissement): self
    {
        if (!$this->LesEtablissements->contains($lesEtablissement)) {
            $this->LesEtablissements[] = $lesEtablissement;
            $lesEtablissement->addLesEquipement($this);
        }

        return $this;
    }

    public function removeLesEtablissement(Etablissement $lesEtablissement): self
    {
        if ($this->LesEtablissements->contains($lesEtablissement)) {
            $this->LesEtablissements->removeElement($lesEtablissement);
            $lesEtablissement->removeLesEquipement($this);
        }

        return $this;
    }

}
