<?php

//Rappel
//1. bien vérifier que le php.ini permet l'utilisation de l'extension "ext_pdo_mysql"
//2. valider que le service mysql est bien en fonction (services.msc sous windows)
//3. intégrer à composer.json l'extension pdo "ext-pdo"
//4. tenter de se connecter depuis un client sql (HeidiSql ou alors "DataBase" intégré à PhpStorm)
//5. lancer ce script et à l'aide du debug (en ligne 20 on observe déjà que l'objet pdo a bien été instancié, en ligne 29, $queryResult contient les snowboards


//paramètres permettant de se connecter à la base de donnnées
$dbConnector = null;
$dsn = "mysql:host=localhost;port=3306;dbname=snows";//exemple de dsn avec la mention explicite du port de communication. Si on est en 3306 ceci est facultatif.
$usr = "snows-connector";
$pwd = "Lu5Ihi";//coder un pwd dans le code source n'est jamais une bonne idée... mais on y va pas étape ;)

try{
    $dbConnector = new PDO($dsn, $usr, $pwd);//instanciation d'un object de type "PDO"

    //try to fetch snows boards data
    $query = "SELECT * FROM snows";
    $queryResult = null;

    $statement = $dbConnector->prepare($query);//prepare query
    $statement->execute();//execute query
    $queryResult = $statement->fetchAll();//prepare result for client

    $dbConnexion = null;//close database connexion
    return $queryResult;
}
catch (PDOException $ex){
    print($ex);
}
