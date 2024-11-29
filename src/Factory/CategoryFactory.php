<?php

declare(strict_types=1);

namespace Tp\Livecampus\Factory;

use Exception;
use Tp\Livecampus\Entity\Category\Category;

class CategoryFactory
{
    /**
     * Crée une instance de Category.
     *
     * @param string $type Type de catégorie (non utilisé ici mais conservé pour homogénéité avec ProduitFactory).
     * @param array $data Données nécessaires pour créer la catégorie.
     * @return Category Instance de la catégorie.
     * @throws Exception Si les données sont invalides ou manquantes.
     */
    public static function create(array $data): Category
    {
        // Vérification des données obligatoires
        if (!isset($data['nom'], $data['description'])) {
            throw new Exception("Les clés 'nom' et 'description' sont requises pour créer une catégorie.");
        }

        // Crée et retourne une instance de Category
        return new Category(
            categoryName: $data['nom'],
            description: $data['description'],
            id: $data["id"],
        );
    }
}
