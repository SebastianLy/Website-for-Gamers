<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $platform;

    /**
     * @ORM\Column(type="float")
     */
    private $average_rating;

    /**
     * @ORM\Column(type="text")
     */
    private $review1;

    /**
     * @ORM\Column(type="text")
     */
    private $review2;

    /**
     * @ORM\Column(type="text")
     */
    private $review3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getAverageRating(): ?float
    {
        return $this->average_rating;
    }

    public function setAverageRating(float $average_rating): self
    {
        $this->average_rating = $average_rating;

        return $this;
    }

    public function getReview1(): ?string
    {
        return $this->review1;
    }

    public function setReview1(string $review1): self
    {
        $this->review1 = $review1;

        return $this;
    }

    public function getReview2(): ?string
    {
        return $this->review2;
    }

    public function setReview2(string $review2): self
    {
        $this->review2 = $review2;

        return $this;
    }

    public function getReview3(): ?string
    {
        return $this->review3;
    }

    public function setReview3(string $review3): self
    {
        $this->review3 = $review3;

        return $this;
    }
}
