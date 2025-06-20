<?php

namespace App\Entity;

use App\Repository\TypeConeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeConeRepository::class)]
class TypeCone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Glaces>
     */
    #[ORM\OneToMany(targetEntity: Glaces::class, mappedBy: 'typeCone')]
    private Collection $glace;

    public function __construct()
    {
        $this->glace = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Glaces>
     */
    public function getGlace(): Collection
    {
        return $this->glace;
    }

    public function addGlace(Glaces $glace): static
    {
        if (!$this->glace->contains($glace)) {
            $this->glace->add($glace);
            $glace->setTypeCone($this);
        }

        return $this;
    }

    public function removeGlace(Glaces $glace): static
    {
        if ($this->glace->removeElement($glace)) {
            // set the owning side to null (unless already changed)
            if ($glace->getTypeCone() === $this) {
                $glace->setTypeCone(null);
            }
        }

        return $this;
    }
}
