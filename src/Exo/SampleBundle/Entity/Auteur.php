<?php

namespace Exo\SampleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Auteur
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
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="born", type="date")
     */
    private $born;

    /**
     * @var \Exo\SampleBundle\Entity\Biographie
     *
     * @ORM\OneToOne(targetEntity="Biographie", mappedBy="author")
     */
    protected $bio;


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
     * Set nom
     *
     * @param string $nom
     * @return Auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     * @return Auteur
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime 
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Get Bio
     *
     * @return \Exo\SampleBundle\Entity\Biographie
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param \Exo\SampleBundle\Entity\Biographie $bio
     */
    public function setBio(Biographie $bio = null)
    {
        $tempo = $this->bio;

        $this->bio = $bio;

        if ($tempo != null) {
            if ($tempo === $this) {
                $tempo->setAuthor(null);
            }
        }

        if ($bio != null) {
            if ($bio->getAuthor() != $this) {
                $bio->setAuthor($this);
            }
        }
    }
}
