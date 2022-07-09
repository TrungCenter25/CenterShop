<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $product_name;

    /**
     * @ORM\Column(type="bigint")
     */
    private $price;

    /**
     * @ORM\Column(type="bigint")
     */
    private $old_price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $small_desc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail_desc;


    /**
     * @ORM\Column(type="integer")
     */
    private $pro_qty;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOldPrice(): ?string
    {
        return $this->old_price;
    }

    public function setOldPrice(string $old_price): self
    {
        $this->old_price = $old_price;

        return $this;
    }

    public function getSmallDesc(): ?string
    {
        return $this->small_desc;
    }

    public function setSmallDesc(string $small_desc): self
    {
        $this->small_desc = $small_desc;

        return $this;
    }

    public function getDetailDesc(): ?string
    {
        return $this->detail_desc;
    }

    public function setDetailDesc(string $detail_desc): self
    {
        $this->detail_desc = $detail_desc;

        return $this;
    }

    public function getProQty(): ?int
    {
        return $this->pro_qty;
    }

    public function setProQty(int $pro_qty): self
    {
        $this->pro_qty = $pro_qty;

        return $this;
    }

    public function getCat(): ?Category
    {
        return $this->cat;
    }

    public function setCat(?Category $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    
}
