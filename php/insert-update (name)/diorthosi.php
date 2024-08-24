<!DOCTYPE html>
<html>
    <head>
        <title>Διόρθωση - ics22115</title>
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

            // Check connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Ελεγχος σύνδεσης
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //Ληψη δεδομενων απο την φορμα
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $id = $_POST["id"];
                $name = $_POST["name"];

                // Τροποποίηση δεδομένων στον πίνακα
                $sql = "UPDATE $tabname SET name='$name' WHERE id='$id'"; 

                if (mysqli_query($conn, $sql)) {
                    echo "Τροποποίηση ". mysqli_affected_rows($conn) .  " δεδομένων επιτυχής! <br>";
                } else {
                    echo "Απέτυχε η τροποποίηση δεδομένων.<br>";
                }
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

        <h2>Φόρμα Διόρθωσης </h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" required>
            <br><br>

            <label for="name">Όνομα:</label>
            <input type="text" name="name" id="name" required>
            <br><br>

            <input type="submit" value="Υποβολή">
        </form>

        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="kataxorisi.php"><button>Καταχώρηση</button></a>
        <!--Δημιουργια υποσελιδου-->
        <div style="color: red; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div>

    </center></body>
</html>
