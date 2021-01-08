<?php
//ACCOUNTS MODEL

//Register new client
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'INSERT INTO
            clients (clientFirstname, clientLastname, clientEmail, clientPassword)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

    //Insert the data
    $stmt->execute();

    //Ask how many rows changed due to the insert
    $rowsChanged = $stmt->rowCount();

    //Close the database interaction
    $stmt->closeCursor();

    //Return the indication of success
    return $rowsChanged;
}

//Check for existing email address
function checkExistingEmail($clientEmail)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'SELECT clientEmail 
        FROM clients
        WHERE clientEmail = :email';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);

    //Execute the statement
    $stmt->execute();

    //Will return a numeric indexed array if a match is found
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    //Close the database interaction
    $stmt->closeCursor();

    if (empty($matchEmail)) {
        return 0;
    } else {
        return 1;
    }
}

//Get client by email address
function getClient($clientEmail)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword
        FROM clients
        WHERE clientEmail = :clientEmail';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);

    //Execute the statement
    $stmt->execute();

    //Will return an associative array if a match is found
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    //Close the database interaction
    $stmt->closeCursor();

    return $clientData;
}

//Get client by email address
function getClientById($clientId)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel
        FROM clients
        WHERE clientId = :clientId';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    //Execute the statement
    $stmt->execute();

    //Will return an associative array if a match is found
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    //Close the database interaction
    $stmt->closeCursor();

    return $clientData;
}

function updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'UPDATE clients 
        SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail
        WHERE clientId = :clientId';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    //Insert the data
    $stmt->execute();

    //Ask how many rows changed due to the insert
    $rowsChanged = $stmt->rowCount();

    //Close the database interaction
    $stmt->closeCursor();

    //Return the indication of success
    return $rowsChanged;
}

function updatePassword($hashedPassword, $clientId)
{
    $db = phpmotorsConnect();

    //The SQL statement
    $sql =
        'UPDATE clients 
        SET clientPassword = :clientPassword
        WHERE clientId = :clientId';

    //Create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);

    //These will replace the :placeholders in the sql and give the data type
    $stmt->bindValue(':clientPassword', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    //Insert the data
    $stmt->execute();

    //Ask how many rows changed due to the insert
    $rowsChanged = $stmt->rowCount();

    //Close the database interaction
    $stmt->closeCursor();

    //Return the indication of success
    return $rowsChanged;
}
