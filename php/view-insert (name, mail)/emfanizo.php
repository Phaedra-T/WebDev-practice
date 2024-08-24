<!DOCTYPE html>
<html>
    <head>
        <title>Εμφανίζω - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>
        <h2>Εμφάνιση Δεδομένων</h2>
        <?php   
            //Στοιχεια βασης fdefe
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "iis22115";
            $tabname = "iis22115";

            //Δημιουργια συνδεσης με τον server της βασης
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Ελεγχος σύνδεσης
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //Επιλογη πεδιων που θα εμφανιστουν
            $sql = "SELECT email FROM $tabname";
            $result = mysqli_query($conn, $sql);
            echo "<br>";
            $counter = 1;
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo $counter . ": " . $row["email"]. "<br>";
                    $counter++;
                }
            } 
            else {
                echo "Δεν υπάρχουν εγγραφές στον πίνακα.<br>";
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>
        
        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="eisago.php"><button>Εισάγω</button></a>
        <!--Δημιουργια υποσέλιδου-->
        <div style="color: brown; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div><br><br>

    </center></body>
</html>
