<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mouvement
 *
 * @ORM\Table(name="mouvement", indexes={@ORM\Index(name="client", columns={"client"})})
 * @ORM\Entity
 */
class Mouvement
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
     * @var int
     *
     * @ORM\Column(name="milesprime", type="integer", nullable=false)
     */
    private $milesprime;

    /**
     * @var int
     *
     * @ORM\Column(name="milesstatut", type="integer", nullable=false)
     */
    private $milesstatut = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="plafond", type="integer", nullable=false, options={"default"="15000"})
     */
    private $plafond = 15000;

    /**
     * @var int
     *
     * @ORM\Column(name="soldecummule", type="integer", nullable=false)
     */
    private $soldecummule = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_niveau", type="date", nullable=false)
     */
    private $dateNiveau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="date", nullable=false)
     */
    private $dateExpiration;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=10, nullable=false)
     */
    private $statut;

    /**
     * @var int
     *
     * @ORM\Column(name="seuil", type="integer", nullable=false)
     */
    private $seuil = '0';

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMilesprime(): ?int
    {
        return $this->milesprime;
    }

    public function setMilesprime(int $milesprime): self
    {
        $this->milesprime = $milesprime;

        return $this;
    }

    public function getMilesstatut(): ?int
    {
        return $this->milesstatut;
    }

    public function setMilesstatut(int $milesstatut): self
    {
        $this->milesstatut = $milesstatut;

        return $this;
    }

    public function getPlafond(): ?int
    {
        return $this->plafond;
    }

    public function setPlafond(int $plafond): self
    {
        $this->plafond = $plafond;

        return $this;
    }

    public function getSoldecummule(): ?int
    {
        return $this->soldecummule;
    }

    public function setSoldecummule(int $soldecummule): self
    {
        $this->soldecummule = $soldecummule;

        return $this;
    }

    public function getDateNiveau(): ?\DateTimeInterface
    {
        return $this->dateNiveau;
    }

    public function setDateNiveau(\DateTimeInterface $dateNiveau): self
    {
        $this->dateNiveau = $dateNiveau;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->dateExpiration;
    }

    public function setDateExpiration(\DateTimeInterface $dateExpiration): self
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSeuil(): ?int
    {
        return $this->seuil;
    }

    public function setSeuil(int $seuil): self
    {
        $this->seuil = $seuil;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }


}
