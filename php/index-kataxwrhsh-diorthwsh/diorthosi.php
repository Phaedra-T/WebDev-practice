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

                // Check connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Έλεγχος σύνδεσης
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }

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
                mysqli_close($conn);
            ?>

            <h2>Φόρμα Διόρθωσης </h2>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="id">ID:</label>
                <input type="text" name="id" id="id" required>
                <br><br>

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <br><br>

                <input type="submit" value="Υποβολή">
            </form>
            <ul>
                <li><a href="index.php">Αρχική</a></li> 
                <li><a href="kataxorisi.php">Καταχώρηση</a></li>
            </ul>
            <div style="color: red; font-size: 24px; text-align: center; margin-top: 50px;">Θεοχαρίδη Φαίδρα - ics22069</div>
        </body>
    </html>
