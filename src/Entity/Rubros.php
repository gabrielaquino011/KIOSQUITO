<?php

namespace App\Entity;

use App\Repository\RubrosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RubrosRepository::class)
 */
class Rubros
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Rubro;

    /**
     * @ORM\OneToMany(targetEntity=Productos::class, mappedBy="rubros", orphanRemoval=true)
     */
    private $Relation;

    public function __toString()
    {
        return $this->Rubro;
    }

    public function __construct()
    {
        $this->Relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubro(): ?string
    {
        return $this->Rubro;
    }

    public function setRubro(string $Rubro): self
    {
        $this->Rubro = $Rubro;

        return $this;
    }

    /**
     * @return Collection|Productos[]
     */
    public function getRelation(): Collection
    {
        return $this->Relation;
    }

    public function addRelation(Productos $relation): self
    {
        if (!$this->Relation->contains($relation)) {
            $this->Relation[] = $relation;
            $relation->setRubros($this);
        }

        return $this;
    }

    public function removeRelation(Productos $relation): self
    {
        if ($this->Relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getRubros() === $this) {
                $relation->setRubros(null);
            }
        }

        return $this;
    }
}
