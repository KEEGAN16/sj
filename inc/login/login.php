<?php
session_start();
include("../Database.php");
include("../User.php");
if (isset($_POST['user_name'])) {
    $data = [
        'username' => $_POST["user_name"],
        'password' => md5($_POST["user_password"]),
    ];
    $user = $User->getUserByName($data['username']);
    if (count($user) == 1 && $user[0]['role'] == 1 && $user[0]['password'] == $data['password']) {
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $data['username'];
        //print_r($_SESSION);
        header("Location: ../../admin.php");
        die();
    }
}
header("Location: ../../login.php");

/* UPDATE user SET password=MD5('1234') WHERE id=1*/


/*
Tento kód vykonáva nasledovné akcie:

1. Začína novú reláciu pomocou funkcie `session_start()`. Relácia umožňuje ukladať údaje medzi požiadavkami a identifikovať používateľa.

2. Vkladá súbory `Database.php` a `User.php`, ktoré obsahujú definície tried `Database` a `User` zodpovedajúcich.

3. Overuje, či existuje POST parameter `user_name` (používateľské meno) v požiadavke.

4. Ak parameter existuje, vytvára sa pole `$data`, ktoré obsahuje používateľské meno (`username`) a zašifrované heslo (`password`) získané z POST parametrov `user_name` a `user_password` v tom poradí.

5. Volá sa metóda `getUserByName()` z triedy `User`, ktorá získava informácie o používateľovi z databázy na základe používateľského mena.

6. Kontroluje sa, či je nájdený práve jeden používateľ (`count($user) == 1`), jeho rola je 1 (`$user[0]['role'] == 1`) a zašifrované heslo používateľa sa zhoduje so zašifrovaným heslom z POST parametrov (`$user[0]['password'] == $data['password']`).

7. Ak sú splnené všetky podmienky, nastavia sa hodnoty relačných premenných `valid` (určuje úspešnú autentifikáciu) a `username` (obsahuje používateľské meno).

8. Používateľ je presmerovaný na stránku `admin.php` pomocou funkcie `header("Location: ../../admin.php")`. To predpokladá, že v aplikácii existuje stránka pre administrátora.

9. Ak podmienky zo šiesteho bodu neplatia, používateľ je presmerovaný na stránku `login.php` pomocou funkcie `header("Location: ../../login.php")`. To predpokladá, že v aplikácii existuje stránka pre prihlásenie používateľa.

Týmto spôsobom tento kód riadi proces autentifikácie používateľa na základe odoslaných údajov, overuje ich správnosť v databáze a nastavuje relačné premenné pre autentifikovaného používateľa.
*/