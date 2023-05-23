<?php

class Menu
{
    public $menu;

    function __construct($menu)
    {
        $this->menu = $menu;
    }

    function get_menu()
    {
        return $this->menu;
    }
}

$header_menu = new Menu(array("Home" => "#section_1",
    "About" => "#section_2",
    "Speakers" => "#section_3",
    "Schedules" => "#section_4",
    "Pricing" => "#section_5",
    "Venue" => "#section_6",
));
$header_login_menu = new Menu(array("Home" => "/",));
$header_admin_menu = new Menu(array("Logout" => "/inc/login/logout.php",));
$footer_menu = new Menu(array("Our Story" => "#section_2", "Login" => "/login.php",));
$footer_login_menu = new Menu(array("Home" => "/",));
$footer_admin_menu = new Menu(array("Logout" => "/inc/login/logout.php",));

?>

<!-- Tento kód vytvorí objekty triedy Menu a inicializuje ich konkrétnymi hodnotami. Trieda Menu sa používa na zobrazenie menu na webovej stránke.

Hlavným účelom tohto kódu je vytvoriť rôzne menu pre rôzne časti webovej stránky, ako napríklad horné menu hlavičky, menu hlavičky prihlásenia, menu hlavičky administrátora, menu päty atď.

V kóde sú vytvorené nasledujúce objekty Menu:

`$header_menu` - objekt menu predstavujúci horné menu hlavičky. Obsahuje položky menu a príslušné odkazy na sekcie webovej stránky, napríklad "Home" => "#section_1" atď.
2. `$header_login_menu` - Objekt menu predstavujúci menu prihlásenia v záhlaví. Obsahuje iba jednu položku "Home" => "/", ktorá je odkazom na domovskú stránku.
3. `$header_admin_menu` - objekt Menu predstavujúci menu hlavičky administrátora. Obsahuje iba jednu položku "Logout" => "/inc/login/logout.php", ktorá je odkazom na stránku odhlásenia.
4. `$footer_menu` - objekt Menu predstavujúci menu pätičky. Obsahuje položky menu a príslušné odkazy, napríklad "Our Story" => "#section_2" atď.
5. `$footer_login_menu` - Objekt menu predstavujúci menu prihlásenia v pätičke. Obsahuje iba jednu položku "Home" => "/", ktorá je odkazom na domovskú stránku.
6. `$footer_admin_menu` - Objekt menu predstavujúci menu administrátora v pätičke. Obsahuje iba jednu položku "Logout" => "/inc/login/logout.php", ktorá je odkazom na stránku odhlásenia.

Každý objekt Menu má metódu `get_menu()`, ktorá vracia pole položiek menu a ich odkazov.

Týmto spôsobom tento kód poskytuje štruktúru a údaje pre rôzne ponuky na webovej stránke, ktoré možno použiť na navigáciu a poskytovanie určitých funkcií používateľom.-->