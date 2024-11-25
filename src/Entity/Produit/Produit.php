<?php

declare(strict_types=1);

/**
 * Class Produit
 * @author Abderahmane Adjali 
 * @Date 25/11/2024
 */
class Produit {
    /**
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
     * Get the value of id
     */ 
    public function getId(): int|null 
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
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
     *
     * @return  self
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

$voiture = new Produit(id: 1, nom: "Voiture", description: "Une voiture", prix: 200.0, stock: 3);


echo $voiture->getPriceTTC( tva: 20); 
echo "<br>";
$isAvailable =  $voiture->verifierStock(quantite: 3);
if($isAvailable){
    echo "Produit disponible";
}
else{
    echo "Produit indisponible";
}
?>