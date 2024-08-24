<!DOCTYPE html>
<html>
	<head>
        <title>Θεοχαρίδη Φαίδρα - ics22069</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ics22069";  
                $tabname = "ics22069"; 

                // Create connection
                $conn = mysqli_connect($servername, $username, $password);
                
                // Check connection
                if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                }
                
                // Attempt create database query execution
                $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

                if (mysqli_query($conn, $sql)) {
                    echo "Database created successfully <br>";
                } else {
                    echo "Error creating database: " . mysqli_error($conn) . "<br>";

                }

                mysqli_close($conn);
            
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                // sql to create table
                    $sql = "CREATE TABLE IF NOT EXISTS $tabname (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(50) NOT NULL
                    )";  


                // table creation message
                if (mysqli_query($conn, $sql)) {
                        echo "Table $tabname created successfully <br>";
                    } else {
                        echo "Error creating table: " . mysqli_error($conn) . "<br>";
                    }

                mysqli_close($conn);
        ?>

		<br>
        <ul>
            <li><a href="kataxorisi.php">Καταχώρηση</a></li> 
            <li><a href="diorthosi.php">Διόρθωση</a></li> 
        </ul>
        <div style="color: red; font-size: 24px; text-align: center; margin-top: 50px;">Θεοχαρίδη Φαίδρα - ics22069</div>
    </body>

    
    </html>
