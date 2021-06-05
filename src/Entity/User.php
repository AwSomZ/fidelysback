<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=false)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaiss", type="date", nullable=false)
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="adressedomicile", type="string", length=255, nullable=false)
     */
    private $adressedomicile;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="string", length=255, nullable=false)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="teldomicile", type="string", length=255, nullable=true)
     */
    private $teldomicile;

    /**
     * @var string
     *
     * @ORM\Column(name="telmobile", type="string", length=255, nullable=false)
     */
    private $telmobile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=true)
     */
    private $fonction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telprofessionnel", type="string", length=255, nullable=true)
     */
    private $telprofessionnel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255, nullable=false)
     */
    private $langue;

    /**
     * @var string
     *
     * @ORM\Column(name="preference", type="string", length=255, nullable=false)
     */
    private $preference;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="string", length=255, nullable=false)
     */
    private $paiement;

    /**
     * @var string
     *
     * @ORM\Column(name="habitude", type="string", length=255, nullable=false)
     */
    private $habitude;

    /**
     * @var string
     *
     * @ORM\Column(name="classeh", type="string", length=255, nullable=false)
     */
    private $classeh;

    /**
     * @var string
     *
     * @ORM\Column(name="assistance", type="string", length=255, nullable=false)
     */
    private $assistance;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="vkey", type="string", length=255, nullable=false)
     */
    private $vkey;

    /**
     * @var int
     *
     * @ORM\Column(name="verified", type="integer", nullable=false)
     */
    private $verified = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaiss(): ?\DateTimeInterface
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(\DateTimeInterface $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

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

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getAdressedomicile(): ?string
    {
        return $this->adressedomicile;
    }

    public function setAdressedomicile(string $adressedomicile): self
    {
        $this->adressedomicile = $adressedomicile;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTeldomicile(): ?string
    {
        return $this->teldomicile;
    }

    public function setTeldomicile(?string $teldomicile): self
    {
        $this->teldomicile = $teldomicile;

        return $this;
    }

    public function getTelmobile(): ?string
    {
        return $this->telmobile;
    }

    public function setTelmobile(string $telmobile): self
    {
        $this->telmobile = $telmobile;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(?string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getTelprofessionnel(): ?string
    {
        return $this->telprofessionnel;
    }

    public function setTelprofessionnel(?string $telprofessionnel): self
    {
        $this->telprofessionnel = $telprofessionnel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getPreference(): ?string
    {
        return $this->preference;
    }

    public function setPreference(string $preference): self
    {
        $this->preference = $preference;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(string $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getHabitude(): ?string
    {
        return $this->habitude;
    }

    public function setHabitude(string $habitude): self
    {
        $this->habitude = $habitude;

        return $this;
    }

    public function getClasseh(): ?string
    {
        return $this->classeh;
    }

    public function setClasseh(string $classeh): self
    {
        $this->classeh = $classeh;

        return $this;
    }

    public function getAssistance(): ?string
    {
        return $this->assistance;
    }

    public function setAssistance(string $assistance): self
    {
        $this->assistance = $assistance;

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

    public function getVkey(): ?string
    {
        return $this->vkey;
    }

    public function setVkey(string $vkey): self
    {
        $this->vkey = $vkey;

        return $this;
    }

    public function getVerified(): ?int
    {
        return $this->verified;
    }

    public function setVerified(int $verified): self
    {
        $this->verified = $verified;

        return $this;
    }


}
