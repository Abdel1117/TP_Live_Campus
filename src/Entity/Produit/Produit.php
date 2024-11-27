<?php
declare(strict_types=1);

namespace Tp\Livecampus\Entity\Produit;
use Tp\Livecampus\Config\ConfigurationManager;

/**
 * Class Produit
 * @author Abderahmane Adjali 
 * @Date 25/11/2024
 */
abstract class Produit {
    /**s
     * @var int | null 
     */
    private int $id;
    /**
     * @var string
     */
    private string $nom;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var float
     */
    private float $prix;
    /**
     * @var int
     */
    private int $stock;
    public function __construct( $nom, $description, $prix, $stock, $id = null){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
    }
    /**
     * Summary of calculerFraisLivraison
     * @return float
     */
    abstract public function  calculerFraisLivraison():float; 
    /**
     * Affiche les détails du produit
     * @return string 
     */
    abstract public function afficherDetails():string;
    
    /**
     * Get the value of id
     */ 
    public function getId(): int|null 
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id): void 
    {
        $this->id = $id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */ 
    public function setNom($nom): void
    {
        $this->nom = $nom;

    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */ 
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */ 
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */ 
    public function setStock($stock): void
    {
        $this->stock = $stock;

    }


    /**
     * @param float $tva 
     * @return float TTC price 
     */

    public function getPriceTTC( float $tva) : float 
    {
        try {
            $tva = ConfigurationManager::getInstance()->get("TVA");

            return $this->prix * (1 + $tva / 100);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param int $quantite 
     * @return bool 
     */
    public function verifierStock(int $quantite): bool
    {
        if($quantite <= $this->stock){
            return true;
        }else{
            return false;
        }
    }
     
}
