<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Kursac</title>
</head>

<body>
    <header>
        <div id='logo'>
            <a href="/kursac/"><span>K</span>ursač</a>
        </div>

        <div id="menuhead">
        <a href="\kursac\disciplina.php"><div>Disciplīnas</div></a><a href="\kursac\rezultati.php"><div>Rezultāti</div></a><a href="\kursac\kalendar.php"><div>Sacensību kalendārs</div></a>
        </div>

        <div id="regAus">
            <a href="\kursac\reg.php">Reģistrācija</a> | <a href="\kursac\aut.php">Autorizācija</a>
        </div>

    </header>
    <main>
        <div id="wrapper">
            <div id="leftCol">
                <h2>Ziņas</h2>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kursac";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM news ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>";
                        echo "<img src='uploads/" . $row['photo'] . "' alt='News Photo'>";
                        echo "<h2>" . $row['title'] . "</h2>";
                        echo "<p>" . $row['content'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No news found.";
                }

                $conn->close();
                ?>
        </div>
        <div id="rightCol">
                <img src="img\facebook.png" ><br>
                <img src="img\IZM.png" ><br>
                <img src="img\Karlis_Kreslins_baneris.jpg" ><br>
                <img src="img\LOK.png" ><br>
            </div>    
    </main>
</body>
</html>