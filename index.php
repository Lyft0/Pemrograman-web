<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Tugas Modul 6 Praktikum Web</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto';
    }

    #color {
        background-color: red;
        color: white;
        text-align: center;
    }

    h1 {
        background-color: rgb(0, 191, 191);
        color: white;
        padding: 20px;
    }

    .wrapper {
        margin-top: 10px;
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        margin-top: 50px;
    }

    .input {
        background-color: whitesmoke;
        padding: 20px;
    }

    .input h2 {
        margin-bottom: 10px;
    }

    .input form input {
        margin-bottom: 20px;
        width: 100%;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #submit {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid;
        padding: 10px;
    }

    table {
        border-collapse: collapse;
    }
</style>


<body>
    <h1>DAFTAR BARANG</h1>

    <?php
    if (!empty($_POST)) {
        $nama = $_POST['nama'];
        $berat = $_POST['berat'];
        $stok = $_POST['stok'];
        $data_barang = array();

        include('barang.php');
        $Barang1 = new Barang($nama, $berat, $stok);
        $Barang1->convertBeratG($Barang1->getBeratKG());
        $Barang1->convertBeratMG($Barang1->getBeratKG());

        array_push($data_barang, $Barang1);
    }
    ?>

    <div class="wrapper">
        <div class="input">
            <h2>Input Data Barang</h2>
            <form method="POST">
                <p>Nama :</p>
                <input type="text" name="nama" required>
                <p>Berat :</p>
                <input type="number" name="berat" required>
                <p>Stok :</p>
                <input type="number" name="stok" required><br>
                <div class="button"><input id="submit" type="submit" value="Submit" style="padding:5px;"></div>
            </form>
        </div>
        <div class="tabel">
            <table>
                <?php
                $header = ["Nama Barang", "Berat (Kilogram)", "Berat (Gram)", "Berat (Miligram)", "Stok Barang"];
                foreach ($header as $i) {
                    echo "<th>$i</th>";
                }

                foreach ($data_barang as $i) {
                    echo "<tr>";
                    echo "<td>" . $i->getNama() . "</td>";
                    echo "<td>" . $i->getBeratKG() . "</td>";
                    echo "<td>" . $i->getBeratG() . "</td>";
                    echo "<td>" . $i->getBeratMG() . "</td>";
                    if ($i->getStok() == 0) {
                        echo '<td id="color">Kosong</td>';
                    } else {
                        echo "<td>" . $i->getStok() . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>