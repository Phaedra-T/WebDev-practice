<!DOCTYPE html>
<html>
    <head>
        <title>Διαγραφή Δεδομένων - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>
         <!--Δημιουργια κεφαλιδας-->
         <div style="color: green; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div><br>

        <?php
            //Στοιχεια βασης fdefe
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";
            $tabname = "ics22115";

            // Check connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Ελεγχος σύνδεσης
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //Διαγραφη στοιχειου με βαση το id
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"];
                $sql = "DELETE FROM $tabname WHERE id=$id";
                if (mysqli_query($conn, $sql)) {
                    echo "Διαγράφηκαν " . mysqli_affected_rows($conn) . " εγγραφές.<br>";
                } 
                else {
                    echo "Απέτυχε η διαγραφή δεδομένων.<br>";
                }
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

        <h2>Διαγραφή Δεδομένων</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" required>
            <br><br>

            <input type="submit" value="Υποβολή">
        </form>

        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="vazo.php"><button>Νέα Δεδομένα</button></a>

    </center></body>
</html>
