<?php 
    
    require_once '../vendor/autoload.php';

  

    use Tp\Livecampus\Database\DatabaseConnection;
    use Tp\Livecampus\Entity\Category\Category;
    use Tp\Livecampus\Factory\CategoryFactory;
    use Tp\Livecampus\Repository\CategorieRepository;
    use Tp\Livecampus\Entity\Utilisateur\Admin;
    use Tp\Livecampus\Entity\Utilisateur\Client;
    use Tp\Livecampus\Entity\Utilisateur\Vendeur;
    use Tp\Livecampus\Factory\UserFactory;
    use Tp\Livecampus\Panier;
    use Tp\Livecampus\Repository\UtilisateurRepository;


try {
    $db = DatabaseConnection::getInstance()->getConnection();
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


try{


    UserFactory::register(type: "client", class: Client::class);
    UserFactory::register(type: "admin", class: Admin::class);
    UserFactory::register(type: "vendeur", class: Vendeur::class);
    $data = [
        "nom" => "Abdel",
        "email" => "Abdel.pp@gmail.com",
        "motDePasse" => "Tp_LiveCampus2024",
        "dateInscritpion" => new DateTime("now"),
        "roles" => ["client"],
        "adresseLivraison" => "1 avenue jean jaures",
        "panier" => new Panier(),
        "id" => 1,
        "TYPE" => "client",
    ];
    
    $user = UserFactory::create( $data["TYPE"],data: $data);
    $creationUser = new UtilisateurRepository();
    $creationUser->create($user);
    $result = $creationUser->findAll();
    var_dump($result);

}catch(Exception $e){
    echo $e ;
}




?>