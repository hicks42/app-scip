<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soc_gest;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capital;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thematique;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $cretated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capitalisation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_assoc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSocGest(): ?string
    {
        return $this->soc_gest;
    }

    public function setSocGest(string $soc_gest): self
    {
        $this->soc_gest = $soc_gest;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getThematique(): ?string
    {
        return $this->thematique;
    }

    public function setThematique(string $thematique): self
    {
        $this->thematique = $thematique;

        return $this;
    }

    public function getCretatedAt(): ?\DateTimeImmutable
    {
        return $this->cretated_at;
    }

    public function setCretatedAt(\DateTimeImmutable $cretated_at): self
    {
        $this->cretated_at = $cretated_at;

        return $this;
    }

    public function getCapitalisation(): ?string
    {
        return $this->capitalisation;
    }

    public function setCapitalisation(string $capitalisation): self
    {
        $this->capitalisation = $capitalisation;

        return $this;
    }

    public function getNbAssoc(): ?int
    {
        return $this->nb_assoc;
    }

    public function setNbAssoc(int $nb_assoc): self
    {
        $this->nb_assoc = $nb_assoc;

        return $this;
    }
}
