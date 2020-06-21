<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields="name", message="Taki uzytkownik juz istnieje.")
 * @UniqueEntity(fields="email", message="Ten e-mail jest juz zajety.")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Nazwa uzytkownika musi miec conajmniej {{ limit }} znaki.",
     *      maxMessage = "Nazwa uzytkownika moze miec maksymalnie {{ limit }} znakow.",
     *      allowEmptyString = false
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 6,
     *      max = 50,
     *      minMessage = "E-mail musi miec conajmniej {{ limit }} znakow.",
     *      maxMessage = "E-mail moze miec maksymalnie {{ limit }} znakow.",
     *      allowEmptyString = false
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(
     *      min = 5,
     *      max = 30,
     *      minMessage = "Haslo musi miec conajmniej {{ limit }} znakow.",
     *      maxMessage = "Haslo moze miec maksymalnie {{ limit }} znakow.",
     *      allowEmptyString = false
     * )
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
