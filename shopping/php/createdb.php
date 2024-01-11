<?php

class CreateDB {
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $connection;

    // Creating constructor for DB
    public function __construct(
        $dbname = "ShoppingCart_DB",
        $tablename = "shoppingcart_table",
        $servername = "localhost:3307",
        $username = "root",
        $password = ""
    ) 
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        //Creating connection
        $this->connection = mysqli_connect($servername, $username, $password);

        //Checking connection
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //Query, used to create a new database
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //Executing query
        if(mysqli_query($this->connection, $sql)) {
            $this->connection = mysqli_connect($servername, $username, $password, $dbname);

            //Query, used to create a new table
            $sql = "CREATE TABLE IF NOT EXISTS $tablename
                    (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(25) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100)
                    );";

            //Executing query
            if(!mysqli_query($this->connection, $sql)) {
                echo "Error creating table: " . mysqli_error($this->connection);
            }
        } 
        // If connection is not established
        else {
            return false;
        }
    }
}

?>