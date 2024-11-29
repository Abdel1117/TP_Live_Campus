<?php
namespace Tp\Livecampus\Entity\Produit;
use Tp\Livecampus\Entity\Produit\Produit;


class ProduitNumerique extends Produit{

    private string $lienTelechargement;
    private float $tailleFichier ;
    private string $formatFichier;
    protected string $type = "numerique";


    public function __construct(
        string $nom,
        string $description,
        float $prix,
        int $stock,
        string $lienTelechargement,
        float $tailleFichier,
        string $formatFichier,
        ?int $id = null
    ){
        parent::__construct($nom, $description, $prix, $stock,  $id);

        // Initialisation des propriétés spécifiques à la classe enfant
        $this->lienTelechargement = $lienTelechargement;
        $this->tailleFichier = $tailleFichier;
        $this->formatFichier = $formatFichier;
    }
    

    public function afficherDetails(): string{
        return $this->lienTelechargement ;
    }
    public function calculerFraisLivraison(): float{
        return 0.0;
    }



    /**
     * Get the value of lienTelechargement
     */ 
    public function getLienTelechargement()
    {
        return $this->lienTelechargement;
    }

    /**
     * Set the value of lienTelechargement
     *
     * @return  self
     */ 
    public function setLienTelechargement($lienTelechargement)
    {
        $this->lienTelechargement = $lienTelechargement;

        return $this;
    }

    /**
     * Get the value of tailleFichier
     */ 
    public function getTailleFichier()
    {
        return $this->tailleFichier;
    }

    /**
     * Set the value of tailleFichier
     *
     * @return  self
     */ 
    public function setTailleFichier($tailleFichier)
    {
        $this->tailleFichier = $tailleFichier;

        return $this;
    }

    /**
     * Get the value of formatFichier
     */ 
    public function getFormatFichier()
    {
        return $this->formatFichier;
    }

    /**
     * Set the value of formatFichier
     *
     * @return  self
     */ 
    public function setFormatFichier($formatFichier)
    {
        $this->formatFichier = $formatFichier;

        return $this;
    }
}