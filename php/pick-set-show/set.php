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
		<h1>Θεοχαρίδη Φαίδρα - ics22069</h1>
		<br>
    <?php
        // define variables and set to empty values
        $nameErr = $websiteErr = ""; //allaje analoga me thn efvnhsh
        $name = $id = $website = ""; //allaje analoga me thn efvnhsh
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

             $id = test_input($_POST["id"]);
    
        //check name field
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $nameErr = "";
         }
    
        //check website field
        if (empty($_POST["website"])) {
        
            $websiteErr = "Website is required";
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
            }
        }   
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
        $dbname = "iis21027";
        $tabname = "iis21027";


        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(!empty($website) && empty($websiteErr) && !empty($name) && empty($nameErr)){
        // Inserts user info to database
            $sql = "INSERT INTO $tabname (id, name, website) VALUES ('$id', '$name', '$website')"; //allaje analoga me thn ekfvnhsh

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully <br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
             } 
        }
        mysqli_close($conn);
    ?>

        <p><span class="error">* required field.</span></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            ID: <input type="text" name="id" value="<?php echo $id;?>">
            <br><br> 							                    	//id field

            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>	                                                //name field

            Website: <input type="text" name="website" value="<?php echo $website;?>">
            <span class="error">* <?php echo $websiteErr;?></span>
            <br><br>			                        				//website field

            <input type="submit" name="submit" value="Submit">
        </form>	                                                    //change fields analoga me thn ekfwnhsh

        <ul>
            <li><a href="index.php">Αρχική</a></li> //add analoga me ekfwnhsh
        </ul>

    </body>
</html>
