<!DOCTYPE html>
<html>
	<head>
        <title>Βραζάλης Κωνσταντίνος - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>
        <?php
            //Στοιχεια βασης 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ics22115";  
            $tabname = "ics22115"; 

            //Δημιουργια συνδεσης με τον server της βασης
            $conn = mysqli_connect($servername, $username, $password);
            
            //Ελεγχος συνδεσης
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }
            
            //Δημιουργια βασης
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

            if (mysqli_query($conn, $sql)) {
                echo "Η βάση $dbname δημιουργήθηκε με επιτυχία.<br>";
            } else {
                echo "ΔΕΝ δημιουργήθηκε βάση.";

            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        
            //Νεα συνδεση με την βαση για δημιουργια πινακα
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Ελεγχος συνδεσης
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

            //Δημιουργια πινακα
                $sql = "CREATE TABLE IF NOT EXISTS $tabname (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(50) NOT NULL
                )";  


            //Ελεγχος οτι ο πινακας δημιουρηθηκε σωστα
            if (mysqli_query($conn, $sql)) {
                    echo "Ο πίνακας $tabname δημιουργήθηκε με επιτυχία.<br>";
                } else {
                    echo "ΔΕΝ δημιουργήθηκε πίνακας";
                }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

		<br>    
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="kataxorisi.php"><button>Καταχώρηση</button></a>
        <a href="diorthosi.php"><button>Διόρθωση</button></a>
        <!--Δημιουργια υποσελιδου-->
        <div style="color: red; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div>
    </center></body>
</html>
