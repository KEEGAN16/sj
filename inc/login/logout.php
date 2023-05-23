<?php
session_start();
session_destroy();
header("Location: ../../login.php");
die();
/*
Tento kód vykonáva nasledovné úkony:

1. Začína novú reláciu alebo obnovuje existujúcu reláciu pomocou funkcie `session_start()`.

2. Volá funkciu `session_destroy()`, ktorá odstraňuje všetky údaje spojené s aktuálnou reláciou. Toto zahŕňa všetky premenné relácie a ich hodnoty.

3. Presmerováva používateľa na stránku `login.php` pomocou funkcie `header("Location: ../../login.php")`. Predpokladá sa, že v aplikácii existuje stránka pre prihlásenie používateľa.

4. Ukončuje vykonávanie skriptu pomocou funkcie `die()`, aby sa zabezpečilo, že po presmerovaní sa nevykonávajú ďalšie činnosti.

Týmto spôsobom tento kód zruší aktuálnu reláciu používateľa, vyčistí všetky údaje relácie a presmeruje používateľa na prihlasovaciu stránku. To sa môže použiť na odhlásenie používateľa zo systému alebo ukončenie relácie.
*/