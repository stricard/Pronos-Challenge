<?php

namespace Pronos\PronosticsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Championnats
 *
 * @ORM\Table(name="championnats")
 * @ORM\Entity(repositoryClass="Pronos\PronosticsBundle\Entity\Repository\ChampionnatsRepository")
 */
class Championnats
{
	/**
	 * @ORM\ManyToMany(targetEntity="Pronos\PronosticsBundle\Entity\Equipes")
	 */
	private $equipes;
	
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

	// Comme la propriété $equipes doit être un ArrayCollection,
	// On doit la définir dans un constructeur :
	public function __construct()
	{
		$this->equipes = new ArrayCollection();
	}

	// Notez le singulier, on ajoute une seule catégorie à la fois
	public function addEquipe(Equipes $equipe)
	{
		// Ici, on utilise l'ArrayCollection vraiment comme un tableau
		$this->equipes[] = $equipe;

		return $this;
	}

	public function removeEquipe(Equipes $equipe)
	{
		// Ici on utilise une méthode de l'ArrayCollection, pour supprimer l'équipe en argument
		$this->equipes->removeElement($equipe);
	}

	// Notez le pluriel, on récupère une liste d'equipes ici !
	public function getEquipes()
	{
		return $this->equipes;
	}


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
     * @return Championnats
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
}