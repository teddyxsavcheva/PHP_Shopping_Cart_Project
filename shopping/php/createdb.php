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
                    product_name VARCHAR(40) NOT NULL,
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

    // Function to get product from the database
    public function displayTable() {
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}


// INSERT INTO shoppingcart_table (product_name, product_price, product_image) VALUES 
// ('Narciso Rodriguez All of me', 120, './upload/perfume1.1.jpg'),
// ('Dolce & Gabbana Italian Love', 160, './upload/perfume2.jpg'),
// ('Creed Wild Flowers', 140, './upload/perfume4.jpg'),
// ('Burberry Goddess', 180, './upload/perfume3.jpg')
?>