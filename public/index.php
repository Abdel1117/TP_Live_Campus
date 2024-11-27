<?php 
    
    require_once '../vendor/autoload.php';

    use Tp\Livecampus\Config\ConfigurationManager;
    use Tp\Livecampus\Entity\Produit\ProduitNumerique;
    
    try {
        // Récupérer l'instance unique
        $configManager = ConfigurationManager::getInstance();
    
        // Charger une configuration personnalisée
        $configManager->chargerConfiguration([
            'TVA' => 19.6,
            'Devise' => 'USD',
            'FraisLivraison' => 7.5,
            'EmailContact' => 'support@example.com',
        ]);
    
        // Récupérer des paramètres
        echo "TVA : " . $configManager->get('TVA') . "%\n";
        echo "Devise : " . $configManager->get('Devise') . "\n";
        echo "Frais de livraison : " . $configManager->get('FraisLivraison') . " €\n";
        echo "Email de contact : " . $configManager->get('EmailContact') . "\n";
    
        // Mettre à jour un paramètre
        $configManager->set('FraisLivraison', 10.0);
        echo "Nouveaux frais de livraison : " . $configManager->get('FraisLivraison') . " €\n";
    
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
    
use Tp\Livecampus\Entity\Produit\Produit;
    
$produit = new ProduitNumerique(nom: "Voiture", description: "Une belle voiture", prix: 20000.0, stock: 3, lienTelechargement: "fdfsdfsdfsdfsdf",tailleFichier: 39999, formatFichier: "PDF", id: 1);
echo "<h1>Test</h1>";

echo $produit->getNom();
    
    
    
    
?>