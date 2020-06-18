<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Praticien
 *
 * @ORM\Table(name="Praticien", indexes={@ORM\Index(name="FK_PRATICIEN_VISITEUR", columns={"vis_matricule"}), @ORM\Index(name="FK_PRATICIEN_TYPE_PRATICIEN", columns={"typ_code"})})
 * @ORM\Entity
 */
class Praticien
{
    /**
     * @var int
     *
     * @ORM\Column(name="pra_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $praNum = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_nom", type="string", length=50, nullable=true)
     */
    private $praNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_prenom", type="string", length=60, nullable=true)
     */
    private $praPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_adresse", type="string", length=100, nullable=true)
     */
    private $praAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_cp", type="string", length=10, nullable=true)
     */
    private $praCp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_ville", type="string", length=50, nullable=true)
     */
    private $praVille;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pra_coefNotoriete", type="float", precision=10, scale=0, nullable=true)
     */
    private $praCoefnotoriete;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vis_matricule", referencedColumnName="vis_matricule")
     * })
     */
    private $visMatricule;

    /**
     * @var \TypePraticien
     *
     * @ORM\ManyToOne(targetEntity="TypePraticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typ_code", referencedColumnName="typ_code")
     * })
     */
    private $typCode;

    public function getPraNum(): ?int
    {
        return $this->praNum;
    }

    public function getPraNom(): ?string
    {
        return $this->praNom;
    }

    public function setPraNom(?string $praNom): self
    {
        $this->praNom = $praNom;

        return $this;
    }

    public function getPraPrenom(): ?string
    {
        return $this->praPrenom;
    }

    public function setPraPrenom(?string $praPrenom): self
    {
        $this->praPrenom = $praPrenom;

        return $this;
    }

    public function getPraAdresse(): ?string
    {
        return $this->praAdresse;
    }

    public function setPraAdresse(?string $praAdresse): self
    {
        $this->praAdresse = $praAdresse;

        return $this;
    }

    public function getPraCp(): ?string
    {
        return $this->praCp;
    }

    public function setPraCp(?string $praCp): self
    {
        $this->praCp = $praCp;

        return $this;
    }

    public function getPraVille(): ?string
    {
        return $this->praVille;
    }

    public function setPraVille(?string $praVille): self
    {
        $this->praVille = $praVille;

        return $this;
    }

    public function getPraCoefnotoriete(): ?float
    {
        return $this->praCoefnotoriete;
    }

    public function setPraCoefnotoriete(?float $praCoefnotoriete): self
    {
        $this->praCoefnotoriete = $praCoefnotoriete;

        return $this;
    }

    public function getVisMatricule(): ?Visiteur
    {
        return $this->visMatricule;
    }

    public function setVisMatricule(?Visiteur $visMatricule): self
    {
        $this->visMatricule = $visMatricule;

        return $this;
    }

    public function getTypCode(): ?TypePraticien
    {
        return $this->typCode;
    }

    public function setTypCode(?TypePraticien $typCode): self
    {
        $this->typCode = $typCode;

        return $this;
    }


}
