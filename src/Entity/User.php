<?php
# Autor: Marek Bobrowski
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields="name", message="Taki użytkownik już istnieje.")
 * @UniqueEntity(fields="email", message="Ten e-mail jest już zajęty.")
 */
class User implements UserInterface
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
     *      minMessage = "Nazwa użytkownika musi mieć co najmniej {{ limit }} znaki.",
     *      maxMessage = "Nazwa użytkownika może mieć maksymalnie {{ limit }} znaków.",
     *      allowEmptyString = false
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 6,
     *      max = 50,
     *      minMessage = "E-mail musi mieć conajmniej {{ limit }} znaków.",
     *      maxMessage = "E-mail moze mieć maksymalnie {{ limit }} znaków.",
     *      allowEmptyString = false
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Length(
     *      min = 5,
     *      max = 30,
     *      minMessage = "Hasło musi mieć co najmniej {{ limit }} znaków.",
     *      maxMessage = "Hasło może mieć maksymalnie {{ limit }} znaków.",
     *      allowEmptyString = false
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $banned;

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

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): self
    {
        $this->banned = $banned;

        return $this;
    }
}
