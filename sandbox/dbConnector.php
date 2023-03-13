<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : dbConnector
 * Created  : 28.01.2019 - 20:13
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

/**
 * This function is designed to execute a query received as parameter
 * @param $query : must be correctly build for sql (synthaxis) but the protection against sql injection will be done there
 * @return array|null : get the query result (can be null)
 * Source : http://php.net/manual/en/pdo.prepare.php
 */
function executeQuerySelect($query){
    $queryResult = null;

    $dbConnexion = openDBConnexion();//open database connexion
    if ($dbConnexion != null)
    {
        $statement = $dbConnexion->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll();//prepare result for client
    }
    $dbConnexion = null;//close database connexion
    return $queryResult;
}

/**
 * This function is designed to manage the database connexion. Closing will be not proceeded there. The client is responsible of this.
 * @return PDO|null
 * Source : http://php.net/manual/en/pdo.construct.php
 */
function openDBConnexion (){
    $tempDbConnexion = null;

    $sqlDriver = 'MySQL';
    $hostname = '127.0.0.1';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'Snows';
    $userName = 'snows-connector';
    $userPwd = 'Spirion545';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try{
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);
    }
    catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage();
    }
    return $tempDbConnexion;
}
