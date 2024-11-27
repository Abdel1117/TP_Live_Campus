<?php

namespace Tp\Livecampus\Factory;
use Tp\Livecampus\Entity\Produit\Produit;
use Exception;
use Tp\Livecampus\Entity\Produit\ProduitPhysique;
use Tp\Livecampus\Entity\Produit\ProduitPerissable;
use Tp\Livecampus\Entity\Produit\ProduitNumerique;
/**
 * Classe ProduitFactory
 * Crée des instances de Produit en fonction du type spécifié.
 */
class ProduitFactory
{
    /**
     * Crée un produit en fonction du type spécifié.
     *
     * @param string $type Le type de produit ("physique", "numerique", "perissable").
     * @param array $data Les données nécessaires à la création du produit.
     * @return Produit L'instance de produit créée.
     * @throws Exception Si le type ou les données sont invalides.
     */
    public function creerProduit(string $type, array $data): Produit
    {
        switch (strtolower($type)) {
            case 'physique':
                return $this->creerProduitPhysique($data);
            case 'numerique':
                return $this->creerProduitNumerique($data);
            case 'perissable':
                return $this->creerProduitPerissable($data);
            default:
                throw new Exception("Type de produit invalide : $type");
        }
    }

    /**
     * Crée un produit physique.
     *
     * @param array $data Les données pour le produit physique.
     * @return ProduitPhysique L'instance de produit physique.
     * @throws Exception Si les données sont invalides.
     */
    private function creerProduitPhysique(array $data): ProduitPhysique
    {
        $this->validerDonnees(data: $data, champsRequis: ['nom', 'description', 'prix', 'stock', "poids",
        "longueur",
        "largeur",
        "hauteur"]);

        return new ProduitPhysique(
            nom: $data['nom'],
            description: $data['description'],
            prix: (float)$data['prix'],
            stock: (int)$data['stock'],
            poids: $data["poids"],
            longueur: $data["longueur"],
            largeur: $data["largeur"],
            hauteur: $data["hauteur"],
            id: 23
        );
    }

    /**
     * Crée un produit numérique.
     *
     * @param array $data Les données pour le produit numérique.
     * @return ProduitNumerique L'instance de produit numérique.
     * @throws Exception Si les données sont invalides.
     */
    private function creerProduitNumerique(array $data): ProduitNumerique
    {
        $this->validerDonnees($data, ['nom', 'description', 'prix',"lienTelechargement",
        "tailleFichier",
        "formatFichier"]);

        // Un produit numérique a toujours un stock illimité (par exemple, stock = -1).
        return new ProduitNumerique(
            nom: $data['nom'],
            description: $data['description'],
            prix: (float)$data['prix'],
            stock: -1 ,
            lienTelechargement: $data["lienTelechargement"],
            tailleFichier: $data["tailleFichier"],
            formatFichier: $data["formatFichier"],
            id: 1999
        );
    }

    /**
     * Crée un produit périssable.
     *
     * @param array $data Les données pour le produit périssable.
     * @return ProduitPerissable L'instance de produit périssable.
     * @throws Exception Si les données sont invalides.
     */
    private function creerProduitPerissable(array $data): ProduitPerissable
    {
        $this->validerDonnees($data, ['nom', 'description', 'prix', 'stock', 'date_expiration',"temperatureStockage"]);

        $produit = new ProduitPerissable(
            nom: $data['nom'],
            description: $data['description'],
            prix: (float)$data['prix'],
            stock: (int)$data['stock'],
            dateExpiration: $data["dateExpiration"],
            temperatureStockage: $data["temperatureStockage"],
            id: 199
        );

        // Ajouter une logique spécifique au produit périssable
        $dateExp = $produit->getDateExpiration() ;
        $dateExp = $data['date_expiration']; 
        return $produit;
    }

    /**
     * Valide les données en fonction des champs requis.
     *
     * @param array $data Les données à valider.
     * @param array $champsRequis Les champs requis pour ce type de produit.
     * @throws Exception Si un champ est manquant ou invalide.
     */
    private function validerDonnees(array $data, array $champsRequis): void
    {
        foreach ($champsRequis as $champ) {
            if (!isset($data[$champ])) {
                throw new Exception("Donnée manquante : $champ");
            }

            if (empty($data[$champ]) && $data[$champ] !== 0) {
                throw new Exception("Donnée vide ou invalide pour le champ : $champ");
            }
        }
    }
}
