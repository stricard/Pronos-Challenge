<?php
namespace Pronos\PronosticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organisations
 *
 * @ORM\Table(name="organisations")
 * @ORM\Entity(repositoryClass="Pronos\PronosticsBundle\Entity\Repository\OrganisationsRepository")
 */
class Organisations
{
    /**
     * @ORM\ManyToMany(targetEntity="Pronos\AuthBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Pronos\PronosticsBundle\Entity\Championnats")
     */
    private $championnats;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=80, nullable=false)
     */
    private $nom;


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
     *
     * @return Organisations
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
     * Set championnats
     *
     * @param \Pronos\PronosticsBundle\Entity\Championnats $championnats
     *
     * @return Organisations
     */
    public function setChampionnats(\Pronos\PronosticsBundle\Entity\Championnats $championnats = null)
    {
        $this->championnats = $championnats;

        return $this;
    }

    /**
     * Get championnats
     *
     * @return \Pronos\PronosticsBundle\Entity\Championnats
     */
    public function getChampionnats()
    {
        return $this->championnats;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Pronos\AuthBundle\Entity\User $user
     *
     * @return Organisations
     */
    public function addUser(\Pronos\AuthBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Pronos\AuthBundle\Entity\User $user
     */
    public function removeUser(\Pronos\AuthBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add championnat
     *
     * @param \Pronos\PronosticsBundle\Entity\Championnats $championnat
     *
     * @return Organisations
     */
    public function addChampionnat(\Pronos\PronosticsBundle\Entity\Championnats $championnat)
    {
        $this->championnats[] = $championnat;

        return $this;
    }

    /**
     * Remove championnat
     *
     * @param \Pronos\PronosticsBundle\Entity\Championnats $championnat
     */
    public function removeChampionnat(\Pronos\PronosticsBundle\Entity\Championnats $championnat)
    {
        $this->championnats->removeElement($championnat);
    }
}
