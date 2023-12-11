<?php
$connect = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8", "root", "");

function SQLQuery($q)
{
    global $connect;
    $statement = $connect->prepare($q);
    $statement->execute();
    return $statement->fetchAll();
}
function SQLWithData($query, $data)
{
    global $connect;

    try {
        $statement = $connect->prepare($query);

        // Print out the SQL query and the data for debugging
        echo "SQL Query: $query\n";
        echo "Data: " . print_r($data, true) . "\n";

        $statement->execute($data);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        // Handle errors (e.g., log the error, display a user-friendly message)
        echo "Error: " . $e->getMessage();
    }
}
// function SQLWithData($query, $data)
// {
//     global $connect;
//     $statement = $connect->prepare($query);
//     $statement->execute($data);
//     return $statement->fetchAll();
// }

?>