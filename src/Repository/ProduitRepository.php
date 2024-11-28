<?php

namespace Tp\Livecampus\Repository;

use Tp\Livecampus\Database\DatabaseConnection;
use Tp\Livecampus\Factory\ProduitFactory;
use Tp\Livecampus\Entity\Produit\Produit;
use Tp\Livecampus\Entity\Produit\ProduitPhysique;
use Tp\Livecampus\Entity\Produit\ProduitNumerique;
use Tp\Livecampus\Entity\Produit\ProduitPerissable;

use PDO;

class ProduitRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function create(Produit $produit): int
    {
        $query = "INSERT INTO Produit (nom, description, prix, stock, type, poids, longueur, largeur, hauteur, lienTelechargement, tailleFichier, dateExpiration, temperatureStockage) 
                  VALUES (:nom, :description, :prix, :stock, :type, :poids, :longueur, :largeur, :hauteur, :lienTelechargement, :tailleFichier, :dateExpiration, :temperatureStockage)";

        $stmt = $this->db->prepare($query);

        $params = [
            'nom' => $produit->getNom(),
            'description' => $produit->getDescription(),
            'prix' => $produit->getPrix(),
            'stock' => $produit->getStock(),
            'type' => strtolower((new \ReflectionClass($produit))->getShortName()),            
            'poids' => $produit instanceof ProduitPhysique ? $produit->getPoids() : null,
            'longueur' => $produit instanceof ProduitPhysique ? $produit->getLongueur() : null,
            'largeur' => $produit instanceof ProduitPhysique ? $produit->getLargeur() : null,
            'hauteur' => $produit instanceof ProduitPhysique ? $produit->getHauteur() : null,
            'lienTelechargement' => $produit instanceof ProduitNumerique ? $produit->getLienTelechargement() : null,
            'tailleFichier' => $produit instanceof ProduitNumerique ? $produit->getTailleFichier() : null,
            'formatFichier' => $produit instanceof ProduitNumerique ? $produit->getFormatFichier() : null ,
            'dateExpiration' => $produit instanceof ProduitPerissable ? $produit->getDateExpiration() : null,
            'temperatureStockage' => $produit instanceof ProduitPerissable ? $produit->getTemperatureStockage() : null,
        ];

        $stmt->execute($params);

        return (int) $this->db->lastInsertId();
    }

    public function read(int $id): ?Produit
{
    $query = "SELECT * FROM Produit WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch();
    var_dump($result);
    if (!$result) {
        return null;
    }

    // Créer l'instance via la factory
    var_dump($result["type"]);
    return ProduitFactory::create($result['type'], $result);
}


    public function update(Produit $produit): void
    {
        $query = "UPDATE Produit SET nom = :nom, description = :description, prix = :prix, stock = :stock, type = :type, poids = :poids, longueur = :longueur, largeur = :largeur, hauteur = :hauteur, 
                  lienTelechargement = :lienTelechargement, tailleFichier = :tailleFichier, formatFichier = :formatFichier, dateExpiration = :dateExpiration, temperatureStockage = :temperatureStockage
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $params = [
            'id' => $produit->getId(),
            'nom' => $produit->getNom(),
            'description' => $produit->getDescription(),
            'prix' => $produit->getPrix(),
            'stock' => $produit->getStock(),
            'type' => strtolower((new \ReflectionClass($produit))->getShortName()), 
            'poids' => $produit instanceof ProduitPhysique ? $produit->getPoids() : null,
            'longueur' => $produit instanceof ProduitPhysique ? $produit->getLongueur() : null,
            'largeur' => $produit instanceof ProduitPhysique ? $produit->getLargeur() : null,
            'hauteur' => $produit instanceof ProduitPhysique ? $produit->getHauteur() : null,
            'lienTelechargement' => $produit instanceof ProduitNumerique ? $produit->getLienTelechargement() : null,
            'tailleFichier' => $produit instanceof ProduitNumerique ? $produit->getTailleFichier() : null,
            'formatFichier' => $produit instanceof ProduitNumerique ? $produit->getFormatFichier() : null ,
            'dateExpiration' => $produit instanceof ProduitPerissable ? $produit->getDateExpiration() : null,
            'temperatureStockage' => $produit instanceof ProduitPerissable ? $produit->getTemperatureStockage() : null,
        ];

        var_dump($params);
        $stmt->execute($params);
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM Produit WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM Produit";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll();
    
        // Utilisation de la factory pour créer chaque produit
        return array_map(fn($result) => ProduitFactory::create($result['type'], $result), $results);
    }
    
    public function findBy(array $criteria): array
{
    $query = "SELECT * FROM Produit WHERE ";
    $params = [];
    $conditions = [];

    foreach ($criteria as $key => $value) {
        $conditions[] = "$key = :$key";
        $params[$key] = $value;
    }

    $query .= implode(' AND ', $conditions);

    $stmt = $this->db->prepare($query);
    $stmt->execute($params);
    $results = $stmt->fetchAll();

    // Créer une instance pour chaque résultat
    return array_map(fn($result) => ProduitFactory::create($result['type'], $result), $results);
}
}
