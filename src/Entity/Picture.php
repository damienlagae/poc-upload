<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
#[Vich\Uploadable()]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[Vich\UploadableField(mapping: 'picture', fileNameProperty: 'pictureName')]
    private ?\Symfony\Component\HttpFoundation\File\File $pictureFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $pictureName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setPictureFile(?\Symfony\Component\HttpFoundation\File\File $pictureFile = null): static
    {
        $this->pictureFile = $pictureFile;
        return $this;
    }

    public function getPictureFile(): ?\Symfony\Component\HttpFoundation\File\File
    {
        return $this->pictureFile;
    }

    public function setPictureName(?string $pictureName): static
    {
        $this->pictureName = $pictureName;
        return $this;
    }

    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    public function getPicturePath(): ?string
    {
        return 'pictures/' . $this->getPictureName();
    }
}
