
<!DOCTYPE html>
<html>
    <head>
        <title>Εισάγω - ics22115</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    </head>
    <body><center>	
        <?php
            //Μεταβλητες για το πεδιο του ονοματος
            $emailErr = "";
            $email = "";
            
            //Ελεγχος οτι εισηχθει ονομα
            if (empty($_POST["name"])) {
                $nameErr = "Υποχρεωτικό πεδίο";
            } else {
                $name = test_input($_POST["name"]);
                $nameErr = "";
            }

            //Ελεγχος email
            if (empty($_POST["email"])) {
                $emailErr = "Υποχρεωτικό πεδίο";
            } 
            else {
                $email = test_input($_POST["email"]);
                //Ελεγχος εγκυροτητας μορφης email
                if (!preg_match("/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]+$/", $email)) {
                    $emailErr = "Μη έγκυρη μορφή email";
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
            $dbname = "iis22115";
            $tabname = "iis22115";

            //Δημιουργια συνδεσης με τον server της βασης
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //Εισαγωγη ονοματος και email στην βαση
            if(!empty($email) && empty($emailErr) && !empty($name) && empty($namelErr)){
                $sql = "INSERT INTO $tabname (name, email) VALUES ('$name', '$email')"; 

                if (mysqli_query($conn, $sql)) {
                    echo "Πλήθος νέων εγγραφών: " . mysqli_affected_rows($conn) . "<br>";
                } else {
                    echo "ΠΡΟΒΛΗΜΑ στην εισαγωγή δεδομένων.<br>";
                } 
            }

            //Κλεισιμο συνδεσης
            mysqli_close($conn);
        ?>

        <h2>Εισαγωγή δεδομένων</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Όνομα:</label>    
            <input type="text" name="name" value="<?php echo $name;?>">
            <span style="color:red;">* <?php echo $nameErr;?></span>
            <br><br>	            
        
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $email;?>">
            <span style="color:red;">* <?php echo $emailErr;?></span>
            <br><br>	                                               

            <input type="submit" name="submit" value="Υποβολή">
        </form>	                                                    
        
        <br><br><br>
        <!--Δημιουργια κουμπιων-συνδεσμων για τις υπολοιπες σελιδες-->
        <a href="index.php"><button>Αρχική</button></a>
        <a href="emfanizo.php"><button>Eμφανίζω</button></a>
        <!--Δημιουργια υποσέλιδου-->
        <div style="color: brown; font-size: 25px; text-align: center; margin-top: 20px;">Βραζάλης Κωνσταντίνος - ics22115@uom.edu.gr</div><br><br>

    <center></body>
</html>
