<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GlacesRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;


#[Vich\Uploadable]
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
    private ?string $ingredientSpecial = 'aucun';

    #[ORM\ManyToOne(inversedBy: 'glace')]
    private ?TypeCone $typeCone = null;

    
    #[vich\UploadableField(mapping: 'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = Null;

    #[ORM\Column(nullable:true)]
    private ?string $imageName = null;

    // #[ORM\Column(nullable: true)]
    // private ?DateTimeImmutable $updateAt = null;
    
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
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            // si un fichier est chargé, met à jour la date
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile():  ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }
    public function getImageName(): ?string
    {
        return $this->imageName;
    }
}

