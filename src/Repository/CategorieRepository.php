<?php
namespace Tp\Livecampus\Repository;

use Tp\Livecampus\Database\DatabaseConnection;
use Tp\Livecampus\Entity\Category\Category;
use Tp\Livecampus\Factory\CategoryFactory;
use PDO;
class CategorieRepository{

    private PDO $db;

    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }


    public function create(Category $category): int{
        $query = "INSERT INTO Categorie (nom, description) VALUES (:nom, :description)";

        $stmt = $this->db->prepare($query);

        $params = [
            "nom" => $category->getCategoryName(),
            'description' => $category->getDescription(),
        ];
        $stmt->execute($params);

        return (int) $this->db->lastInsertId();

    }

    public function read(int $id): ?Category
    {
        $query = "SELECT * FROM Categorie WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        if (!$result) {
            return null;
        }
    
        // Créer l'instance via la factory
        return CategoryFactory::create($result);
    }
    public function update(Category $category): void{

        $query = "UPDATE Categorie SET nom = :nom,  description = :description WHERE id = :id";
        
        $stmt = $this->db->prepare($query);

        $params = [
            "id" => $category->getId(),
            "nom" => $category->getCategoryName(),
            'description' => $category->getDescription(),
        ];
        $stmt->execute($params);

    }

    public function delete(int $id): void
    {
        var_dump($id);

        $query = "DELETE FROM Categorie WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM Categorie";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll();
    
        // Utilisation de la factory pour créer chaque produit
        return array_map(fn($result) => CategoryFactory::create( $result), $results);
    }


}

