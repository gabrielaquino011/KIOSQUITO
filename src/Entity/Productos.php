<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductosRepository::class)
 */
class Productos
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
    private $Producto;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Marca;

    /**
     * @ORM\Column(type="float")
     */
    private $Precio;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=Rubros::class, inversedBy="Relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rubros;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducto(): ?string
    {
        return $this->Producto;
    }

    public function setProducto(string $Producto): self
    {
        $this->Producto = $Producto;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->Marca;
    }

    public function setMarca(string $Marca): self
    {
        $this->Marca = $Marca;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->Precio;
    }

    public function setPrecio(float $Precio): self
    {
        $this->Precio = $Precio;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->Descripcion;
    }

    public function setDescripcion(string $Descripcion): self
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    public function getRubros(): ?Rubros
    {
        return $this->rubros;
    }

    public function setRubros(?Rubros $rubros): self
    {
        $this->rubros = $rubros;

        return $this;
    }
}
