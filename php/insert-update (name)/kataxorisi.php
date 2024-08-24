
<!DOCTYPE html>
<html>
    <head>
        <title>Καταχώρηση - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>	
        <?php
            //Μεταβλητες για το πεδιο του ονοματος
            $nameErr = "";
            $name = "";
            
            //Ελεγχος οτι εισηχθει ονομα
            if (empty($_POST["name"])) {
                $nameErr = "Υποχρεωτικό πεδίο";
            } else {
                $name = test_input($_POST["name"]);
                $nameErr = "";
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
            $dbname = "ics22115";
            $tabname = "ics22115";

            //Δημιουργια συνδεσης με τον server της βασης
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Εισαγωγη ονοματος στην βαση
            if(!empty($name) && empty($nameErr)){
                $sql = "INSERT INTO $tabname (name) VALUE ('$name')"; 

                if (mysqli_query($conn, $sql)) {
                    echo "Προστέθηκαν " . mysqli_affected_rows($conn) . " εγγραφές <br>";
                } else {
                    echo "Απέτυχε η εισαγωγή δεδομένων <br>";
                } 
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

        <h2>Φόρμα Καταχώρησης</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<label for="name">Όνομα:</label> 
            <input type="text" name="name" value="<?php echo $name;?>">
            <span style="color:red;">* <?php echo $nameErr;?></span>
            <br><br>	                                               

            <input type="submit" name="submit" value="Υποβολή">
        </form>	                                                    
        
        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="diorthosi.php"><button>Διόρθωση</button></a>
        <!--Δημιουργια υποσελιδου-->
        <div style="color: red; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div>

    <center></body>
</html>
