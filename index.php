<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 6 Praktikum Web</title>
</head>

<body>
    <h1>KONVERSI BARANG PAK KOY</h1>

    <table border="1">
        <?php
        $data = array(
            array("Tepung", 1, 0, 0, 20),
            array("Gula", 5, 0, 0, 25),
            array("Pisang", 2, 0, 0, 20),
            array("Terigu", 7, 0, 0, 30),
            array("Santan", 1, 0, 0, 0)
        );


        $header = ["Nama Barang", "Berat (Kilogram)", "Berat (Gram)", "Berat (Miligram)", "Stok Barang"];

        for ($i = 0; $i < 5; $i++) {
            $data[$i][2] += $data[$i][1] * 1000;
            $data[$i][3] += $data[$i][1] * 1000000;
        }

        echo "<tr>";
        for ($i = 0; $i < 5; $i++) {
            echo "<th>$header[$i]</th>";
        }
        echo "</tr>";

        for ($i = 0; $i < 5; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                echo "<td>";
                echo $data[$i][$j];
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <p>Sort berdasarkan :</p>

    <form action="index.php" method="post">
        <select name="sort">
            <option value="tinggi">Tertinggi</option>
            <option value="rendah">Terendah</option>
            <option value="abjad">Abjad</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_POST["sort"] == "tinggi") {
        $columns = array(1, 5, 2, 7, 1);
        $data = array_multisort($columns, SORT_ASC, $data);
    } elseif ($_POST["sort"] == "rendah") {
        $columns = array(1, 5, 2, 7, 1);
        $data = array_multisort($columns, SORT_DESC, $data);
    }
    ?>


</body>

</html>