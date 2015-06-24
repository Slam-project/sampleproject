<?php

namespace Exo\SampleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Exo\SampleBundle\Entity\Auteur;

/**
 * Biographie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Biographie
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="bookCount", type="integer", nullable=true)
     */
    private $bookCount;

    /**
     * @var \Exo\SampleBundle\Entity\Auteur
     *
     * @ORM\OneToOne(targetEntity="Auteur", inversedBy="bio")
     */
    protected $author;

    /**
     * @ORM\OneToMany(targetEntity="Livre", mappedBy="bio")
     */
    protected $livres;


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
     * Set title
     *
     * @param string $title
     * @return Biographie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set bookCount
     *
     * @param integer $bookCount
     * @return Biographie
     */
    public function setBookCount($bookCount)
    {
        $this->bookCount = $bookCount;

        return $this;
    }

    /**
     * Get bookCount
     *
     * @return integer 
     */
    public function getBookCount()
    {
        return $this->bookCount;
    }

    /**
     * Get Livre
     *
     * @return Book
     */
    public function getBook()
    {
        return $this->livres;
    }

    /**
     * Get Author
     *
     * @return \Exo\SampleBundle\Entity\Auteur
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set Author ID
     *
     * @param \Exo\SampleBundle\Entity\Auteur $author
     * @return \Exo\SampleBundle\Entity\Biographie
     */
    public function setAuthor(Auteur $author = null)
    {
        $tempo = $this->author;

        $this->author = $author;

        if ($tempo != null) {
            if ($tempo->getBio() === $this) {
                $tempo->setBio(null);
            }
        }

        if ($author != null) {
            if ($author->getBio() != $this) {
                $author->setBio($this);
            }
        }

        return $this;
    }
}
