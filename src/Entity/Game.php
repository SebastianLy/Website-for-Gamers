<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository", repositoryClass=GameRepository::class)
 * @UniqueEntity(fields="title", message="Taka gra juz istnieje.")
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
     * @Assert\Length(
     *      min = 2,
     *      max = 120,
     *      minMessage = "Tytul musi miec conajmniej {{ limit }} znaki.",
     *      maxMessage = "Tytul moze miec maksymalnie {{ limit }} znakow.",
     *      allowEmptyString = false
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="json", length=255)
     */
    private $platform;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $average_rating;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *      max = 500,
     *      maxMessage = "Recenzja moze miec maksymalnie {{ limit }} znakow.",
     *      allowEmptyString = true
     * )
     */
    private $review;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $number_of_votes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sum_of_votes;

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

    public function getPlatform(): ?array
    {
        return $this->platform;
    }

    public function setPlatform(array $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getAverageRating(): ?float
    {
        return $this->average_rating;
    }

    public function setAverageRating(?float $average_rating): self
    {
        $this->average_rating = $average_rating;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): self
    {
        $this->review = $review;

        return $this;
    }

    public function getNumberOfVotes(): ?float
    {
        return $this->number_of_votes;
    }

    public function setNumberOfVotes(?float $number_of_votes): self
    {
        $this->number_of_votes = $number_of_votes;

        return $this;
    }

    public function getSumOfVotes(): ?int
    {
        return $this->sum_of_votes;
    }

    public function setSumOfVotes(?int $sum_of_votes): self
    {
        $this->sum_of_votes = $sum_of_votes;

        return $this;
    }
}
