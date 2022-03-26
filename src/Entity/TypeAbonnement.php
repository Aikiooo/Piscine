<?php

namespace App\Entity;

use App\Repository\TypeAbonnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeAbonnementRepository::class)]
class TypeAbonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'typeAbonnement', targetEntity: Abonner::class)]
    private $lesAbonner;

    public function __construct()
    {
        $this->lesAbonner = new ArrayCollection();
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

    /**
     * @return Collection<int, Abonner>
     */
    public function getLesAbonner(): Collection
    {
        return $this->lesAbonner;
    }

    public function addLesAbonner(Abonner $lesAbonner): self
    {
        if (!$this->lesAbonner->contains($lesAbonner)) {
            $this->lesAbonner[] = $lesAbonner;
            $lesAbonner->setTypeAbonnement($this);
        }

        return $this;
    }

    public function removeLesAbonner(Abonner $lesAbonner): self
    {
        if ($this->lesAbonner->removeElement($lesAbonner)) {
            // set the owning side to null (unless already changed)
            if ($lesAbonner->getTypeAbonnement() === $this) {
                $lesAbonner->setTypeAbonnement(null);
            }
        }

        return $this;
    }
}
