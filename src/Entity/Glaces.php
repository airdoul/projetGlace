<?php

namespace App\Entity;

use App\Repository\GlacesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlacesRepository::class)]
class Glaces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredientSpecial = null;

    #[ORM\ManyToOne(inversedBy: 'glace')]
    private ?TypeCone $typeCone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIngredientSpecial(): ?string
    {
        return $this->ingredientSpecial;
    }

    public function setIngredientSpecial(string $ingredientSpecial): static
    {
        $this->ingredientSpecial = $ingredientSpecial;

        return $this;
    }

    public function getTypeCone(): ?typeCone
    {
        return $this->typeCone;
    }

    public function setTypeCone(?typeCone $typeCone): static
    {
        $this->typeCone = $typeCone;

        return $this;
    }
}
