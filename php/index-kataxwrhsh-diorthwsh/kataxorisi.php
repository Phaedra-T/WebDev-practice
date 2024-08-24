
<!DOCTYPE html>
<html>
    <head>
        <title>Θεοχαρίδη Φαίδρα - ics22069</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
        <style>
            .error {
                color: #FF0000;
                }
        </style>

    </head>
    <body>
		<br>
    <?php
        // define variables and set to empty values
        $nameErr = ""; //allaje analoga me thn efvnhsh
        $name = ""; //allaje analoga me thn efvnhsh
        
        //check name field
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $nameErr = "";
         }
    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Insert to table 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ics22069";
        $tabname = "ics22069";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

       

        if(!empty($name) && empty($nameErr)){
        // Inserts user info to database
            $sql = "INSERT INTO $tabname (name) VALUE ('$name')"; 

            if (mysqli_query($conn, $sql)) {
                echo "Προστέθηκαν " . mysqli_affected_rows($conn) . " εγγραφές <br>";
            } else {
                echo "Απέτυχε η εισαγωγή δεδομένων <br>";
             } 
        }
        mysqli_close($conn);
    ?>

        <p><span class="error">* required field.</span></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>	                                               

            <input type="submit" name="submit" value="Submit">
        </form>	                                                    

        <ul>
            <li><a href="index.php">Αρχική</a></li> 
            <li><a href="diorthosi.php">Διόρθωση</a></li>
        </ul>
        <div style="color: red; font-size: 24px; text-align: center; margin-top: 50px;">Θεοχαρίδη Φαίδρα - ics22069</div>
    </body>
</html>
