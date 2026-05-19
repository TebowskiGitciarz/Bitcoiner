<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
     font-family: Arial, Helvetica, sans-serif;
     font-size:large;
    }

    img {
        display: flex;
    }

    #wymiana1, #wymiana2, #wymiana3 {
        width: 250px;
        height: 150px;
        border: 2px solid black;
        flex-direction: column;
    }

    #btcbutton {
        float: left;
        height: 462px;
        border: 2px solid black;
    }

    #btcbutton:hover {
        background-color: gray;
    }

    h1{
        font-size:xx-large;
    }
        </style>
</head>
<body>
    <form method="POST">
        <button type="submit" name="dodaj" id="btcbutton"><img src="btcnobg.png"></button>
          <button type submit name="wym1"><img src="wymiana1.jpg" id="wymiana1"></button>
        <button type submit name="wym2"><img src="wymiana2.jpg" id="wymiana2"></button>
         <button type submit name="wym3"><img src="wymiana3.png" id="wymiana3"></button>
    </form>

    <br>
<?php 
$polaczenie = mysqli_connect("localhost", "root", "", "bitcoin");

if (isset($_POST['dodaj'])){
    $zapytanie2 = "UPDATE waluta SET ilosc = ilosc + 1 WHERE id = 1";
    mysqli_query($polaczenie, $zapytanie2);
}

if (isset($_POST['wym1'])){
    $sprawdz = mysqli_query($polaczenie, "SELECT ilosc FROM waluta WHERE id = 1");
    $stan = mysqli_fetch_array($sprawdz);
 if ($stan['ilosc'] >= 100) {
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc - 100 WHERE id = 1");
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc + 1 WHERE id = 2");
    }
}
if (isset($_POST['wym2'])){
    $sprawdz = mysqli_query($polaczenie, "SELECT ilosc FROM waluta WHERE id = 2");
    $stan = mysqli_fetch_array($sprawdz);
 if ($stan['ilosc'] >= 10) {
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc - 10 WHERE id = 2");
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc + 1 WHERE id = 3");
    }
}
if (isset($_POST['wym3'])){
    $sprawdz = mysqli_query($polaczenie, "SELECT ilosc FROM waluta WHERE id = 3");
    $stan = mysqli_fetch_array($sprawdz);
 if ($stan['ilosc'] >= 10) {
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc - 10 WHERE id = 3");
        mysqli_query($polaczenie, "UPDATE waluta SET ilosc = ilosc + 1 WHERE id = 4");
    }
}

$zapytanie = 'SELECT id, nazwa, ilosc FROM waluta';
$wynik = mysqli_query($polaczenie, $zapytanie);

echo "<table>";
while($wiersz = mysqli_fetch_array($wynik)) {
    echo "<tr>";
    echo "<td>".$wiersz['nazwa']."</td>";
    echo "<td>".$wiersz['ilosc']."</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($polaczenie);
?>
</body>
<script>
    var btc = 0;
    function zarabiaj(){
btc ++;
    };
    </script>
</html>
