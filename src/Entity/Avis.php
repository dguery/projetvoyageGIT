<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
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
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre", inversedBy="MesAvis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unMembre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etablissement", inversedBy="LesAvis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unEtablissement;

    public function __toString() {
      return "Avis : ".$this->getTitre()." ".$this->getNote();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getUnMembre(): ?Membre
    {
        return $this->unMembre;
    }

    public function setUnMembre(?Membre $unMembre): self
    {
        $this->unMembre = $unMembre;

        return $this;
    }

    public function getUnEtablissement(): ?Etablissement
    {
        return $this->unEtablissement;
    }

    public function setUnEtablissement(?Etablissement $unEtablissement): self
    {
        $this->unEtablissement = $unEtablissement;

        return $this;
    }
}
