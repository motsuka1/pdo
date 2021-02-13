<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'pdoports';
    
    try {
        $dbh = new PDO(
            'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8',
            $user,
            $password,
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            )
        );
        $price = 200;
        $prepare = $dbh->prepare('SELECT * FROM fruits WHERE price = ?');
        $prepare->bindValue(1, (int)$price, PDO::PARAM_INT);
        $prepare->execute();

        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        print_r($result);
    } catch(PDOException $e) {
        $error = $e->getMessage();
        print_r($error);
    }
    
?>