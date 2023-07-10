<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[Vich\Uploadable()]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[Vich\UploadableField(mapping: 'document', fileNameProperty: 'documentName')]
    private ?\Symfony\Component\HttpFoundation\File\File $documentFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $documentName = null;

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

    public function setDocumentFile(?\Symfony\Component\HttpFoundation\File\File $documentFile = null): static
    {
        $this->documentFile = $documentFile;
        return $this;
    }

    public function getDocumentFile(): ?\Symfony\Component\HttpFoundation\File\File
    {
        return $this->documentFile;
    }

    public function setDocumentName(?string $documentName): static
    {
        $this->documentName = $documentName;
        return $this;
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function getDocumentPath(): ?string
    {
        return 'documents/' . $this->getDocumentName();
    }
}
