<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
class Supplier
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
    private $sup_name;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupName(): ?string
    {
        return $this->sup_name;
    }

    public function setSupName(string $sup_name): self
    {
        $this->sup_name = $sup_name;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }
}
