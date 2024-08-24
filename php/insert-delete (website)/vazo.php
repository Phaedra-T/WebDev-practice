
<!DOCTYPE html>
<html>
    <head>
        <title>Νέα Δεδομένα - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>	
        <!--Δημιουργια κεφαλιδας-->
        <div style="color: green; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div><br>

        <?php
            //Μεταβλητες για το πεδιο του ονοματος
            $websiteErr = "";
            $website = "";
            

            //Ελεγχος website
            if (empty($_POST["website"])) {
                $websiteErr = "Υποχρεωτικό πεδίο";
            } 
            else {
                $website = test_input($_POST["website"]);
                //Ελεγχος εγκυροτητας μορφης website
                if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                    $websiteErr = "Μη έγκυρη μορφή website";
                }
            }
         

            //Συναρτηση δοκιμης δεδομενων
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            //Στοιχεια βασης 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";
            $tabname = "ics22115";

            //Δημιουργια συνδεσης με τον server της βασης
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Εισαγωγη website στην βαση
            if(!empty($website) && empty($websiteErr)){
                $sql = "INSERT INTO $tabname (website) VALUE ('$website')"; 

                if (mysqli_query($conn, $sql)) {
                    echo "Πλήθος καταχωρήσεων: " . mysqli_affected_rows($conn) . "<br>";
                } else {
                    echo "ΔΕΝ ΕΓΙΝΕ η εισαγωγή δεδομένων.<br>";
                } 
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

        <h2>Νέα Δεδομένα</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="website">Website:</label>
            <input type="text" name="website" value="<?php echo $website;?>">
            <span style="color:red;">* <?php echo $websiteErr;?></span>
            <br><br>	                                               

            <input type="submit" name="submit" value="Υποβολή">
        </form>	                                                    
        
        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="diagrafo.php"><button>Διαγραφή Δεδομένων</button></a>

    <center></body>
</html>
