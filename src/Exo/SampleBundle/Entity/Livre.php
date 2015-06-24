<?php

namespace Exo\SampleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paru", type="date")
     */
    private $dateParu;

    /**
     * @ORM\ManyToOne(targetEntity="Biographie", inversedBy="livres")
     */
    protected $bio;

    /**
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="books")
     */
    protected $themes;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateParu
     *
     * @param \DateTime $dateParu
     * @return Livre
     */
    public function setDateParu($dateParu)
    {
        $this->dateParu = $dateParu;

        return $this;
    }

    /**
     * Get dateParu
     *
     * @return \DateTime 
     */
    public function getDateParu()
    {
        return $this->dateParu;
    }

    /**
     * Get Themes
     *
     * @return Themes
     */
    public function getTheme()
    {
        return $this->themes;
    }

    /**
     * Get Bio
     *
     * @return Bio
     */
    public function getBio()
    {
        return $this->bio;
    }
}
