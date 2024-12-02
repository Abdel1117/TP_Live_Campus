<?php
namespace Tp\Livecampus\Repository;

use Tp\Livecampus\Database\DatabaseConnection;
use Tp\Livecampus\Entity\Utilisateur\Admin;
use Tp\Livecampus\Entity\Utilisateur\Vendeur;
use Tp\Livecampus\Entity\Utilisateur\Client;
use Tp\Livecampus\Entity\Utilisateur\Utilisateur;
use Tp\Livecampus\Factory\UserFactory;
use PDO;
class UtilisateurRepository{

    private PDO $db;

    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }


    public function create(Utilisateur $utilisateur): int{

        
        $query = "INSERT INTO utilisateur (nom, email, motDePasse, dateInscription, TYPE, adresseLivraison, boutique, commission, niveauAcces, derniereConnexion) VALUES (:nom, :email, :motDePasse, :dateInscription, :TYPE, :adresseLivraison, :boutique, :commission, :niveauAcces, :derniereConnexion)"; 
        $stmt = $this->db->prepare($query);

        $params = [
            "nom" => $utilisateur->getNom() ,
            "email" => $utilisateur->getEmail(),
            "motDePasse" => password_hash($utilisateur->getMotDePasse(),PASSWORD_DEFAULT),
            "dateInscription" => $utilisateur->getDateInscritpion()->format("Y-m-d H:i:s"),
            "TYPE" => $utilisateur->getType(),
            "adresseLivraison" => $utilisateur instanceof Client ?  $utilisateur->getAdresseLivraison() : null,
            "boutique" => $utilisateur instanceof Vendeur ? $utilisateur->getBoutique() : null,
            "commission" =>$utilisateur instanceof Vendeur ? $utilisateur->getCommission() : null ,
            "niveauAcces" => $utilisateur instanceof Admin ? $utilisateur->getNiveauAcces() : null,
            "derniereConnexion" => $utilisateur instanceof Admin ? $utilisateur->getDerniereConnexion() : null,
        ];
        $stmt->execute($params);

        return (int) $this->db->lastInsertId();

    }

    public function read(int $id): ?Utilisateur
    {
        $query = "SELECT * FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        if (!$result) {
            return null;
        }
    
        // Créer l'instance via la factory
        return UserFactory::create(type: $result["type"], data: $result);
    }
    public function update(Utilisateur $utilisateur): void{

        $query = "UPDATE utilisateur SET nom = :nom, email = :email, motDePasse = :motDePasse, dateInscription = :dateInscription, TYPE = :TYPE, adresseLivraison = :adresseLivraison, boutique = :boutique, commission = :commission, niveauAcces = :niveauAcces, derniereConnexion = :derniereConnexion"; 
        $stmt = $this->db->prepare($query);
        
        $params = [
            "nom" => $utilisateur->getNom() ,
            "email" => $utilisateur->getEmail(),
            "motDePasse" => password_hash($utilisateur->getMotDePasse(),PASSWORD_DEFAULT),
            "dateInscription" => $utilisateur->getDateInscritpion()->format("Y-m-d H:i:s"),
            "TYPE" => $utilisateur->getType(),
            "adresseLivraison" => $utilisateur instanceof Client ?  $utilisateur->getAdresseLivraison() : null,
            "boutique" => $utilisateur instanceof Vendeur ? $utilisateur->getBoutique() : null,
            "commission" =>$utilisateur instanceof Vendeur ? $utilisateur->getCommission() : null ,
            "niveauAcces" => $utilisateur instanceof Admin ? $utilisateur->getNiveauAcces() : null,
            "derniereConnexion" => $utilisateur instanceof Admin ? $utilisateur->getDerniereConnexion() : null,
        ];
        $stmt->execute(params: $params);

    }

    public function delete(int $id): void
    {

        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM utilisateur";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll();
        
        // Utilisation de la factory pour créer chaque produit
        return array_map(fn($result) => UserFactory::create( $result['TYPE'], $result), $results);
    }


}

