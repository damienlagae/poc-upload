<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: FileRepository::class)]
#[Vich\Uploadable()]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[Vich\UploadableField(mapping: 'file', fileNameProperty: 'fileName')]
    private ?\Symfony\Component\HttpFoundation\File\File $fileFile;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $fileName = null;

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

    public function setFileFile(?\Symfony\Component\HttpFoundation\File\File $fileFile = null): static
    {
        $this->fileFile = $fileFile;
        return $this;
    }

    public function getFileFile(): ?\Symfony\Component\HttpFoundation\File\File
    {
        return $this->fileFile;
    }

    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function getFilePath(): ?string
    {
        return 'files/' . $this->getFileName();
    }
}
