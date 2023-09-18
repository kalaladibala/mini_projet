<?php

namespace App\Entity;

use App\Repository\EmpruntsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntsRepository::class)]
class Emprunts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEmprunt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateRetour = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?Personne $personne = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?Objets $objet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $dateEmprunt): static
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(\DateTimeInterface $dateRetour): static
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getPersonne(): ?personne
    {
        return $this->personne;
    }

    public function setPersonne(?personne $personne): static
    {
        $this->personne = $personne;

        return $this;
    }

    public function getObjet(): ?objets
    {
        return $this->objet;
    }

    public function setObjet(?objets $objet): static
    {
        $this->objet = $objet;

        return $this;
    }
}
