<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billet
 *
 * @ORM\Table(name="billet", indexes={@ORM\Index(name="client", columns={"client"})})
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")

 */
class Billet
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
     * @ORM\Column(name="depart", type="string", length=255, nullable=false)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255, nullable=false)
     */
    private $destination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datealler", type="date", nullable=false)
     */
    private $datealler;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateretour", type="date", nullable=true)
     */
    private $dateretour;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255, nullable=false)
     */
    private $classe;

    /**
     * @var int
     *
     * @ORM\Column(name="adulte", type="integer", nullable=false)
     */
    private $adulte;

    /**
     * @var int
     *
     * @ORM\Column(name="jeune", type="integer", nullable=false)
     */
    private $jeune;

    /**
     * @var int
     *
     * @ORM\Column(name="enfant", type="integer", nullable=false)
     */
    private $enfant;

    /**
     * @var int
     *
     * @ORM\Column(name="bebe", type="integer", nullable=false)
     */
    private $bebe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateachat", type="date", nullable=false)
     */
    private $dateachat;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

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

    public function getDepart(): ?string
    {
        return $this->depart;
    }

    public function setDepart(string $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDatealler(): ?\DateTimeInterface
    {
        return $this->datealler;
    }

    public function setDatealler(\DateTimeInterface $datealler): self
    {
        $this->datealler = $datealler;

        return $this;
    }

    public function getDateretour(): ?\DateTimeInterface
    {
        return $this->dateretour;
    }

    public function setDateretour(?\DateTimeInterface $dateretour): self
    {
        $this->dateretour = $dateretour;

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

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getAdulte(): ?int
    {
        return $this->adulte;
    }

    public function setAdulte(int $adulte): self
    {
        $this->adulte = $adulte;

        return $this;
    }

    public function getJeune(): ?int
    {
        return $this->jeune;
    }

    public function setJeune(int $jeune): self
    {
        $this->jeune = $jeune;

        return $this;
    }

    public function getEnfant(): ?int
    {
        return $this->enfant;
    }

    public function setEnfant(int $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getBebe(): ?int
    {
        return $this->bebe;
    }

    public function setBebe(int $bebe): self
    {
        $this->bebe = $bebe;

        return $this;
    }

    public function getDateachat(): ?\DateTimeInterface
    {
        return $this->dateachat;
    }

    public function setDateachat(\DateTimeInterface $dateachat): self
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

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
