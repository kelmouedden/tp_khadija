<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $note;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $coefficient;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=Eleve::class, mappedBy="note", cascade={"persist", "remove"})
     */
    private $eleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        // unset the owning side of the relation if necessary
        if ($eleve === null && $this->eleve !== null) {
            $this->eleve->setNote(null);
        }

        // set the owning side of the relation if necessary
        if ($eleve !== null && $eleve->getNote() !== $this) {
            $eleve->setNote($this);
        }

        $this->eleve = $eleve;

        return $this;
    }
}
