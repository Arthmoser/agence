<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogementRepository::class)]
class Logement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $surface = null;

    #[ORM\Column]
    private ?int $numberOfRoom = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?bool $isExterior = null;

    #[ORM\Column(nullable: true)]
    private ?int $exteriorSurface = null;

    #[ORM\Column]
    private ?bool $isGarage = null;

    #[ORM\Column(length: 255)]
    private ?string $modality = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?bool $isSwimmingPool = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNumberOfRoom(): ?int
    {
        return $this->numberOfRoom;
    }

    public function setNumberOfRoom(int $numberOfRoom): self
    {
        $this->numberOfRoom = $numberOfRoom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function isIsExterior(): ?bool
    {
        return $this->isExterior;
    }

    public function setIsExterior(bool $isExterior): self
    {
        $this->isExterior = $isExterior;

        return $this;
    }

    public function getExteriorSurface(): ?int
    {
        return $this->exteriorSurface;
    }

    public function setExteriorSurface(?int $exteriorSurface): self
    {
        $this->exteriorSurface = $exteriorSurface;

        return $this;
    }

    public function isIsGarage(): ?bool
    {
        return $this->isGarage;
    }

    public function setIsGarage(bool $isGarage): self
    {
        $this->isGarage = $isGarage;

        return $this;
    }

    public function getModality(): ?string
    {
        return $this->modality;
    }

    public function setModality(string $modality): self
    {
        $this->modality = $modality;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function isIsSwimmingPool(): ?bool
    {
        return $this->isSwimmingPool;
    }

    public function setIsSwimmingPool(bool $isSwimmingPool): self
    {
        $this->isSwimmingPool = $isSwimmingPool;

        return $this;
    }
}
