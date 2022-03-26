<?php

namespace App\Entity;

use App\Repository\AbonnerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnerRepository::class)]
class Abonner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $actif;

    #[ORM\ManyToOne(targetEntity: TypeAbonnement::class, inversedBy: 'lesAbonner')]
    #[ORM\JoinColumn(nullable: false)]
    private $typeAbonnement;

    #[ORM\Column(type: 'date')]
    private $dateAbonnement;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbPlacesRestantes;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlacesRestantes(): ?int
    {
        return $this->nbPlacesRestantes;
    }

    public function setNbPlacesRestantes(int $nbPlacesRestantes): self
    {
        $this->nbPlacesRestantes = $nbPlacesRestantes;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getTypeAbonnement(): ?TypeAbonnement
    {
        return $this->typeAbonnement;
    }

    public function setTypeAbonnement(?TypeAbonnement $typeAbonnement): self
    {
        $this->typeAbonnement = $typeAbonnement;

        return $this;
    }

    public function getDateAbonnement(): ?\DateTimeInterface
    {
        return $this->dateAbonnement;
    }

    public function setDateAbonnement(\DateTimeInterface $dateAbonnement): self
    {
        $this->dateAbonnement = $dateAbonnement;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
}
