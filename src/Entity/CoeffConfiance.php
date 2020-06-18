<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoeffConfiance
 *
 * @ORM\Table(name="Coeff_Confiance")
 * @ORM\Entity
 */
class CoeffConfiance
{
    /**
     * @var int
     *
     * @ORM\Column(name="coefConf_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coefconfNum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="coefConf_libelle", type="string", length=20, nullable=false)
     */
    private $coefconfLibelle = '';

    public function getCoefconfNum(): ?int
    {
        return $this->coefconfNum;
    }

    public function getCoefconfLibelle(): ?string
    {
        return $this->coefconfLibelle;
    }

    public function setCoefconfLibelle(string $coefconfLibelle): self
    {
        $this->coefconfLibelle = $coefconfLibelle;

        return $this;
    }


}
