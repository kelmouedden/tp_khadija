<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
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
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\OneToOne(targetEntity=Classe::class, mappedBy="eleves", cascade={"persist", "remove"})
     */
    private $classe;

    /**
     * @ORM\OneToOne(targetEntity=Note::class, inversedBy="eleve", cascade={"persist", "remove"})
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity=Classe::class, mappedBy="eleve")
     */
    private $Classe;

    public function __construct()
    {
        $this->Classe = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(Classe $classe): self
    {
        // set the owning side of the relation if necessary
        if ($classe->getEleves() !== $this) {
            $classe->setEleves($this);
        }

        $this->classe = $classe;

        return $this;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function addClasse(Classe $classe): self
    {
        if (!$this->Classe->contains($classe)) {
            $this->Classe[] = $classe;
            $classe->setEleve($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): self
    {
        if ($this->Classe->removeElement($classe)) {
            // set the owning side to null (unless already changed)
            if ($classe->getEleve() === $this) {
                $classe->setEleve(null);
            }
        }

        return $this;
    }
}
