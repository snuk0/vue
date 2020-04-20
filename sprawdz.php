<?php
//Zwraca true jeśli można dodać podany klucz GET do bazy (to znaczy nie ma już takiego samego)


include "polacz.php";

$kategorie = $_GET["kategorie"];


if ($sql = $baza->prepare("SELECT kategorie FROM kategorie WHERE kategorie = ?"))
    {
        $sql->bind_param("s", $kategorie);
        $sql->execute();
        $sql->bind_result($kat);

       if($sql->fetch())
         echo "false";
          else
         echo "true"; //jeśli jest taki w bazie zwraca false - to znaczy nie można dodać
        $sql->close();
   
    }
    else die ("Błąd SQL - sprawdź zapytanie w MySQL");
$baza->close();

?>