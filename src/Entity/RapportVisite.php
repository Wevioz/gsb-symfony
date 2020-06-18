<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RapportVisite
 *
 * @ORM\Table(name="Rapport_Visite", uniqueConstraints={@ORM\UniqueConstraint(name="rap_num", columns={"rap_num", "vis_matricule"})})
 * @ORM\Entity
 */
class RapportVisite
{
    /**
     * @var int
     *
     * @ORM\Column(name="rap_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rapNum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="vis_matricule", type="string", length=20, nullable=false)
     */
    private $visMatricule = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="pra_num", type="integer", nullable=true)
     */
    private $praNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rap_bilan", type="string", length=510, nullable=true)
     */
    private $rapBilan = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rap_motif", type="string", length=255, nullable=true)
     */
    private $rapMotif = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="rap_coefConf", type="integer", nullable=true)
     */
    private $rapCoefconf = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="rap_statut", type="boolean", nullable=true)
     */
    private $rapStatut = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="rap_dateVisite", type="date", nullable=true)
     */
    private $rapDatevisite;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="rap_dateRapport", type="date", nullable=true)
     */
    private $rapDaterapport;

    public function getRapNum(): ?int
    {
        return $this->rapNum;
    }

    public function getVisMatricule(): ?string
    {
        return $this->visMatricule;
    }

    public function setVisMatricule(string $visMatricule): self
    {
        $this->visMatricule = $visMatricule;

        return $this;
    }

    public function getPraNum(): ?int
    {
        return $this->praNum;
    }

    public function setPraNum(?int $praNum): self
    {
        $this->praNum = $praNum;

        return $this;
    }

    public function getRapBilan(): ?string
    {
        return $this->rapBilan;
    }

    public function setRapBilan(?string $rapBilan): self
    {
        $this->rapBilan = $rapBilan;

        return $this;
    }

    public function getRapMotif(): ?string
    {
        return $this->rapMotif;
    }

    public function setRapMotif(?string $rapMotif): self
    {
        $this->rapMotif = $rapMotif;

        return $this;
    }

    public function getRapCoefconf(): ?int
    {
        return $this->rapCoefconf;
    }

    public function setRapCoefconf(?int $rapCoefconf): self
    {
        $this->rapCoefconf = $rapCoefconf;

        return $this;
    }

    public function getRapStatut(): ?bool
    {
        return $this->rapStatut;
    }

    public function setRapStatut(?bool $rapStatut): self
    {
        $this->rapStatut = $rapStatut;

        return $this;
    }

    public function getRapDatevisite(): ?\DateTimeInterface
    {
        return $this->rapDatevisite;
    }

    public function setRapDatevisite(?\DateTimeInterface $rapDatevisite): self
    {
        $this->rapDatevisite = $rapDatevisite;

        return $this;
    }

    public function getRapDaterapport(): ?\DateTimeInterface
    {
        return $this->rapDaterapport;
    }

    public function setRapDaterapport(?\DateTimeInterface $rapDaterapport): self
    {
        $this->rapDaterapport = $rapDaterapport;

        return $this;
    }


}
