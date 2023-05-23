<!-- Tento kód teda spracováva požiadavky POST odoslané pri zadaní novej objednávky konferencie. 
Ak je objednávka úspešne pridaná, používateľ je presmerovaný na stránku so správou o úspešnom nákupe a v prípade neúspechu je presmerovaný na stránku bez správy.-->

<?php
include('inc/config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($data->addNewOrder($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['quantity'], $_POST['conference_id'], $_POST['plan_id'])) {
        header("Location: /?buy_status=1#section_7");
        die();
    }
}
header("Location: /#section_7");
die();
?>

<!--1. Pripojte súbor "config.php" z adresára "inc", ktorý obsahuje nastavenia a konfiguračné parametre aplikácie.

2. Skontrolujte metódu dopytu ($_SERVER['REQUEST_METHOD']) pre aktuálny dopyt. Ak je metóda požiadavky "POST", vykoná sa nasledujúci blok kódu:

    Použije sa objekt $data na volanie metódy addNewOrder(), pričom sa odovzdajú hodnoty z poľa $_POST.  táto metóda pridá do systému novú objednávku so zadanými údajmi, ako sú meno, priezvisko, e-mail, množstvo, ID konferencie a ID plánu.
    Ak je objednávka úspešne pridaná (funkcia addNewOrder() vráti true), používateľ je presmerovaný na hlavnú stránku s parametrom buy_status=1 a kotvou #section_7. Na presmerovanie sa používa funkcia header().
    Po vykonaní presmerovania sa vykoná príkaz die() na ukončenie kódu.
3. Ak metóda požiadavky nie je "POST" alebo objednávka nebola úspešne pridaná, používateľ je presmerovaný na domovskú stránku s kotvou #section_7. Môže ísť o bežné presmerovanie alebo presmerovanie po neúspešnom vykonaní objednávky.

4. Po vykonaní presmerovania sa vykoná operátor die() na ukončenie kódu.

Kód teda spracuje požiadavky POST, pridá novú objednávku, ak je požiadavka platná, a presmeruje používateľa na príslušné stránky v závislosti od výsledku operácie.-->