<?php
declare(strict_types=1);
namespace Tp\Livecampus\Entity\Utilisateur;
use Tp\Livecampus\Entity\Utilisateur\Utilisateur;
use Tp\Livecampus\Panier;
/**
 * Class Client
 * 
 * Représente un client avec une adresse de livraison, un panier, et un historique de commandes.
 */
class Client extends Utilisateur
{
    /**
     * @var string $adresseLivraison Adresse de livraison du client
     */
    private string $adresseLivraison;

    /**
     * @var Panier $panier Panier du client
     */
    private Panier $panier;


    /**
     * Constructeur de la classe Client
     * 
     * @param string $adresseLivraison Adresse de livraison du client
     * @param Panier|null $panier Instance de panier associée au client (par défaut, un nouveau panier)
     */
    public function __construct($nom,  $email, $motDePasse, $dateInscritpion, $roles, $id = null, string $adresseLivraison, ?Panier $panier = null)
    {
        parent::__construct(nom: $nom, email: $email,  motDePasse: $motDePasse, dateInscritpion: $dateInscritpion, roles: $roles, id: $id);
        $this->adresseLivraison = $adresseLivraison;
        $this->panier = $panier ?? new Panier(); 
    }
    public function afficherRoles(): array{
        $roles = $this->getRoles();

        return $roles;
    }

    /**
     * Crée une commande à partir des articles présents dans le panier.
     * 
     * Pour l'instant, cette méthode est vide.
     * 
     * @return void
     */
    public function passerCommande(): void
    {
        // Logique pour créer une commande à partir des articles du panier (vide pour l'instant)
        echo "Commande créée à partir du panier.\n";
       
    }
    /**
     * Consultation de l'historique des commandes
     * @return array
     */
    public function consulterHistorique(): array {
        return [];
    }
    /**
     * Récupère l'adresse de livraison du client.
     * 
     * @return string Adresse de livraison
     */
    public function getAdresseLivraison(): string
    {
        return $this->adresseLivraison;
    }

    /**
     * Définit l'adresse de livraison du client.
     * 
     * @param string $adresseLivraison Adresse de livraison
     * @return self Instance de l'objet pour le chaînage
     */
    public function setAdresseLivraison(string $adresseLivraison): self
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    /**
     * Récupère le panier du client.
     * 
     * @return Panier Panier du client
     */
    public function getPanier(): Panier
    {
        return $this->panier;
    }

    /**
     * Définit le panier du client.
     * 
     * @param Panier $panier Panier à associer au client
     * @return self Instance de l'objet pour le chaînage
     */
    public function setPanier(Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }
}
