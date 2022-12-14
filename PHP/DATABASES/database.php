<?php
    class Database {
        private $pdo;
        private $err_msg;

        function __construct($host, $user, $pass, $name) {
            $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
        }

        function select($query) {
            try {
                $result = $this->pdo->query($query);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Database error: ", $e->getMessage());
            }
        }
        
        function insert($query, $params = []) {
            $result = $this->pdo->prepare($query)->execute($params);
            return $this->pdo->lastInsertId();
        }
        
        function update($query, $params = []) {
            $result = $this->pdo->prepare($query)->execute($params);
            return $this->pdo->rowCount();
        }

        function delete($query, $params = []) {
            $result = $this->pdo->prepare($query)->execute($params);
            return $this->pdo->rowCount();
        }
    }

?>