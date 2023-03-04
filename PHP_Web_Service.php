<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>PHP Web Services</title>
    <style media="screen">
        th {
            background-color: #9c9c9c;
            color: #000000;
            padding: 5px;
            font-weight: 100;
        }

        td {
            background-color: #6180cf;
            color: #ffffff;
            border: 1px solid black;
            font-weight: 100;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 40px;
        }

        table {
            margin: auto;
            border-radius: 5px;
            padding: 30px;
            font-weight: 800;
            background-color: #e0e0e0;

        }

        div {
            margin: 30px;
            text-align: center;
            font-size: 20px;
        }

        span {
            font-family: sans-serif;
            font-weight: lighter;
            font-size: 35px;
            text-decoration: underline;
        }

        select {
            margin-right: 20px;
        }

        .column {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php

        $urlM = "https://wwwlab.webug.se/examples/XML/vehiclesservice/manufacturer/";
        $jsontextM = file_get_contents($urlM);
        $arrM = json_decode($jsontextM);

        // KOLLA OCH JÄMFÖR MED DUGGA 2. DEM BÖR LIKNA VARANDRA

        echo "Select a country in the drop down menu:";
        echo "<form action='PHP_Web_Service.php' method='post'>";
        echo "<select name='country'>";
        echo '<option>Choose a manufacturer</option>';
        foreach ($arrM as $manufacturer) {
            echo "<option value='" . $manufacturer[1] . "'>$manufacturer[0]</option>";
        }
        echo "</select>";
        echo "<button>Submit</button>";
        echo "</form>";


        if (isset($_POST['country'])) {
            $selectedcountry = $_POST['country'];
        } else {
            $selectedcountry = "Ukraine";
        }

        if ($selectedcountry != "Choose a country") {

            $urlC = "https://wwwlab.webug.se/examples/XML/vehiclesservice/manufacturer/";
            $jsontextC = file_get_contents($urlC);
            $arrC = json_decode($jsontextC);
        }

        echo "This is the selectedcountry:" . " " . $selectedcountry . " " . "<-- there it is";

        // echo "<span>$selectedcountry</span>";

        if ($selectedcountry != "Choose a country") {

            echo '<table>';
            echo "<tr>
                            <th>Origin country</th>
                            <th>Model</th>
                            <th>WD</th>
                            <th>Power</th>
                        </tr>";

            foreach ($arrC as $producer) {
                foreach ($producer as $producer2) {

                    echo '<div>';
                    echo "<tr>";
                    echo "<td>" . $selectedcountry . "</td>";
                    echo "<td>" . $producer2[0][0] . "</td>";
                    echo "<td>" . $producer2[1] . "</td>";
                    echo "<td>" . $producer2[2] . "</td>";
                    echo "</tr>";
                    echo '</div>';
                }
            }
            echo '</table>';
        }
        ?>
    </div>
</body>

</html>







// Starten på utkommenteringen.

// $trucks=Array(
// Array("KrAZ","Kremenchuk","Ukraine",
// Array(
// Array("KrAZ-65055","6x6","330Hp"),
// Array("KrAZ-6130C4","6x6","330Hp"),
// Array("KrAZ-5133H2","4x2","330Hp"),
// Array("KrAZ-7140H6","8x6","400Hp")
// )),
// Array("EBIAM","Thessaloniki","Greece",
// Array(
// Array("EBIAM MVM","4x4","86Hp")
// )),
// Array("KaMAZ","Naberezhnye Chelny","Tatarstan",
// Array(
// Array("KAMAZ 54115","6x4","240Hp"),
// Array("KAMAZ 6560","8x8","400Hp"),
// Array("KAMAZ 5460","8x8","340Hp")
// )),
// Array("LIAZ","Rynovice","Czechoslovakia",Array(
// Array("LIAZ 706 RT","2x4","160Hp")
// )),
// Array("IRUM","Brasov","Romania",
// Array(
// Array("TAF 690","2x4","90Hp")
// )),
// Array("MAZ","Minsk","Belarus",
// Array(
// Array("MAZ 535","8x8","375Hp"),
// Array("MAZ 7310","8x8","525Hp"),
// Array("MAZ 7907","4x12","1250Hp"),
// Array("MAZ 6317","6x6","425Hp"),
// Array("MAZ 6430","6x6","360Hp"),
// Array("MAZ 5551","4x2","160Hp")
// )),
// Array("BelAz","Zohodino","Belarus",
// Array(
// Array("Belaz 75600","4x4","3400Hp")
// )),
// Array("Oshkosh","Oshkosh","USA",
// Array(
// Array("Oshkosh P-15","8x8","840Hp"),
// Array("Oshkosh MK-36","6x6","425Hp")
// )),
// Array("Tatra","Koprivnice","Czechoslovakia",
// Array(
// Array("Tatra T 813","4x4","266Hp"),
// Array("Tatra T 815","10x10","436Hp"),
// ))
// );

// Slutet på utkommenteringen.