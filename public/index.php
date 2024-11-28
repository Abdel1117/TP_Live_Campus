<?php 
    
    require_once '../vendor/autoload.php';

    use Tp\Livecampus\Config\ConfigurationManager;
    use Tp\Livecampus\Entity\Produit\ProduitNumerique;
    use Tp\Livecampus\Entity\Produit\ProduitPerissable;
    use Tp\Livecampus\Entity\Produit\ProduitPhysique;

    use Tp\Livecampus\Factory\ProduitFactory;

    use Tp\Livecampus\Database\DatabaseConnection;
    use Tp\Livecampus\Repository\ProduitRepository;

    ProduitFactory::register('physique', ProduitPhysique::class);
    ProduitFactory::register('numerique', ProduitNumerique::class);
    ProduitFactory::register('perissable', ProduitPerissable::class);
try {
    $db = DatabaseConnection::getInstance()->getConnection();
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$produitNumerique = new ProduitNumerique("Livre Audio", "Une description", 5.99, 5,"https://via.placeholder.com/250", 19.9, "PDF", 1);
$createProduit = new ProduitRepository();
$createProduit->read(1);

var_dump($createProduit);

$produitNumerique = new ProduitNumerique("Livre Audio", "Une description", 5.99, 5,"https://via.placeholder.com/250", 19.9, "JPEG", 1);
$createProduit->update($produitNumerique);


$createProduit->read(1);
    
?>