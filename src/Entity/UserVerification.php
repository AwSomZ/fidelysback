<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserVerification
 *
 * @ORM\Table(name="user_verification", indexes={@ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class UserVerification
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=5, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateconfirmation", type="date", nullable=true)
     */
    private $dateconfirmation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation", type="date", nullable=false)
     */
    private $datecreation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getDateconfirmation(): ?\DateTimeInterface
    {
        return $this->dateconfirmation;
    }

    public function setDateconfirmation(?\DateTimeInterface $dateconfirmation): self
    {
        $this->dateconfirmation = $dateconfirmation;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
