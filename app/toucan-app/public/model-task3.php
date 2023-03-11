<?php
class ProfileModel {
    private $conn;

    function __construct() {
        //hard code credentials for demo purposes normally passed via ENV
        try {
            $this->conn = new PDO("mysql:host=docker-db-1;dbname=toucan", 'root', 'docker');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    function search($name) {
        try {
            //Use PDO for making our mysql safe
            $sql = "SELECT p.UserRefID, p.Firstname, p.Surname, e.emailaddress FROM profiles AS p
                    INNER JOIN emails AS e ON p.UserRefID = e.UserRefID
                    WHERE p.Firstname LIKE :name OR p.Surname LIKE :name";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            // Check if any rows were returned
            if ($stmt->rowCount() > 0) {
                // Output data of each row
                $results = [];
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result = array(
                        "FirstName" => $row["Firstname"],
                        "LastName" => $row["Surname"],
                        "Email" => $row["emailaddress"]
                    );
                    array_push($results, $result);
                }
                return $results;
            } else {
                return null;
            }
        } catch(PDOException $e) {
            throw new Exception("Query failed: " . $e->getMessage());
        }
    }

    function close() {
        $this->conn = null;
    }
}

