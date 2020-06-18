<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePraticien
 *
 * @ORM\Table(name="Type_Praticien")
 * @ORM\Entity
 */
class TypePraticien
{
    /**
     * @var string
     *
     * @ORM\Column(name="typ_code", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typCode = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="typ_libelle", type="string", length=50, nullable=true)
     */
    private $typLibelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typ_lieu", type="string", length=70, nullable=true)
     */
    private $typLieu;

    public function getTypCode(): ?string
    {
        return $this->typCode;
    }

    public function getTypLibelle(): ?string
    {
        return $this->typLibelle;
    }

    public function setTypLibelle(?string $typLibelle): self
    {
        $this->typLibelle = $typLibelle;

        return $this;
    }

    public function getTypLieu(): ?string
    {
        return $this->typLieu;
    }

    public function setTypLieu(?string $typLieu): self
    {
        $this->typLieu = $typLieu;

        return $this;
    }


}
