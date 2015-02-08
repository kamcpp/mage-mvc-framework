<?php


    class MySQLDatabaseConnection extends DatabaseConnection {
        private $connection;

        public function open($host, $port, $dbname, $username, $password) {
            $this->connection = mysqli_connect("$host:$port", $username, $password, $dbname);
            if (!$this->connection) {
                // TO DO Use appropriate Exception class.
                throw new Exception("Connection failed.");
            }
        }

        public function close() {
            mysqli_close($this->connection);
        }

        public function execute($sqlQuery) {
            $result = mysqli_query($this->connection, $sqlQuery);
            if (mysqli_connect_errno()) {
                die("ERROR: " . mysqli_error($this->connection));
            }
            return $result;
        }

        public function executeWithResult($sqlQuery) {
            $result = $this->execute($sqlQuery);
            $counter = 0;
            $toReturn = array();
            while ($row = mysqli_fetch_array($result)) {
                $toReturn[$counter++] = $row;
            }
            return $toReturn;
        }
    }
