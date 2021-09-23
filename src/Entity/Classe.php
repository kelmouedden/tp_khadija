<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\OneToOne(targetEntity=Eleve::class, inversedBy="classe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleves;

    /**
     * @ORM\OneToOne(targetEntity=Prof::class, mappedBy="classe", cascade={"persist", "remove"})
     */
    private $prof;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="Classe")
     */
    private $eleve;

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

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEleves(): ?Eleve
    {
        return $this->eleves;
    }

    public function setEleves(Eleve $eleves): self
    {
        $this->eleves = $eleves;

        return $this;
    }

    public function getProf(): ?Prof
    {
        return $this->prof;
    }

    public function setProf(?Prof $prof): self
    {
        // unset the owning side of the relation if necessary
        if ($prof === null && $this->prof !== null) {
            $this->prof->setClasse(null);
        }

        // set the owning side of the relation if necessary
        if ($prof !== null && $prof->getClasse() !== $this) {
            $prof->setClasse($this);
        }

        $this->prof = $prof;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }
}
