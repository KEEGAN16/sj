<?php
session_start();
require('inc/config.php');
require('inc/Admin.php');
if (!isset($_SESSION['username'])) {
    http_response_code(403);
    exit();
}

/*1. session_start(); - Spustí reláciu PHP. Je to potrebné na spracovanie premenných relácie, ktoré uchovávajú údaje medzi rôznymi požiadavkami.

2. require('inc/config.php'); - Pripojí súbor config.php, ktorý  obsahuje nastavenia a konfigurácie aplikácie.

3. require('inc/Admin.php'); - Pripojí súbor Admin.php, ktorý  obsahuje triedu Admin alebo funkcie súvisiace s administratívnou časťou aplikácie.

4. if!isset($_SESSION['username']) { ... } - Skontroluje, či existuje premenná $_SESSION['username'], čo spravidla znamená, že používateľ je autentifikovaný. 
Ak premenná $_SESSION['username'] neexistuje, kód nastaví kód odpovede HTTP 403 (Forbidden) a ukončí skript. 
To znamená, že používateľ musí byť autentifikovaný, aby mal prístup k tejto časti kódu.

Táto časť kódu je teda určená na zabezpečenie a kontrolu prístupu k administratívnej časti aplikácie. 
Ak používateľ nie je overený, prístup bude zamietnutý a vráti sa kód chyby 403.
*/

$page_title = "Admin rozhranie";
$events = $Admin->getEvents();
$conferences = $Admin->getConfereces();
$speakers = $Admin->getSpeakers();
$halls = $Admin->getHalls();
$top_menu_items = $header_admin_menu->get_menu();
$bottom_menu_items = $footer_admin_menu->get_menu();

/*

1. `$page_title = "Admin rozhranie";` - Nastaví hodnotu premennej `$page_title` na reťazec "Admin rozhranie". táto premenná sa používa na definovanie názvu stránky administrátorského rozhrania.

2. `$events = $Admin->getEvents();` - Zavolá metódu `getEvents()` objektu `$Admin` a jej výsledok priradí premennej `$events`. metóda `getEvents()` vráti zoznam udalostí alebo informácie o udalostiach týkajúcich sa administratívnej časti aplikácie.

3. `$conferences = $Admin->getConfereces();` - Volá metódu `getConfereces()` objektu `$Admin` a jej výsledok priradí do premennej `$conferences`. Táto metóda vracia zoznam konferencií alebo informácie o konferenciách spojených s administratívnou časťou aplikácie.

4. `$speakers = $Admin->getSpeakers();` - Volá metódu `getSpeakers()` objektu `$Admin` a jej výsledok priradí do premennej `$speakers`. Táto metóda vráti zoznam reproduktorov alebo informácie o reproduktoroch spojených s administratívnou časťou aplikácie.

5. `$halls = $Admin->getHalls();` - Volá metódu `getHalls()` objektu `$Admin` a priraďuje jej výsledok do premennej `$halls`. Táto metóda vráti zoznam hál alebo informácie o halách spojených s administratívnou časťou aplikácie.

6. `$top_menu_items = $header_admin_menu->get_menu();` - Volá metódu `get_menu()` objektu `$header_admin_menu` a priraďuje jej výsledok vykonania do premennej `$top_menu_items`. táto metóda vracia zoznam položiek horného menu administratívneho rozhrania.

7. `$bottom_menu_items = $footer_admin_menu->get_menu();` - Zavolá metódu `get_menu()` objektu `$footer_admin_menu` a jej výsledok vykonania priradí do premennej `$bottom_menu_items`. táto metóda vráti zoznam položiek spodného menu administratívneho rozhrania.

Táto časť kódu je určená na inicializáciu premenných, ktoré sa majú použiť na stránke administratívneho rozhrania. Získava informácie o udalostiach, konferenciách, prednášajúcich, miestnostiach a menu, ktoré sa potom môžu použiť na zobrazenie údajov na stránke.
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['action'])) {
        switch($_POST['action']) {
            case 'apply':
                if (!empty($_POST['event_id'])) {
                    $Admin->updateEvent($_POST['event_id'],$_POST['conference_id'],$_POST['name'],$_POST['description'],$_POST['image'],$_POST['speaker_id'],$_POST['start_time'],$_POST['end_time'],$_POST['day_number'],$_POST['hall_id']);
                }
                header('Location: /admin.php');
                die();
                break;
            case 'delete':
                if (!empty($_POST['event_id'])) {
                    $Admin->deleteEvent($_POST['event_id']);
                }
                header('Location: /admin.php');
                die();
                break;
            case 'insert':
                $Admin->insertEvent($_POST['conference_id'], $_POST['name'],$_POST['description'],$_POST['image'],$_POST['speaker_id'],$_POST['start_time'],$_POST['end_time'],$_POST['day_number'],$_POST['hall_id']);
                header('Location: /admin.php');
                die();
                break;
        }
    }
}

/*


1. `` ($_SERVER['REQUEST_METHOD'] === 'POST') {`` - Skontroluje, či bola požiadavka HTTP odoslaná metódou POST. Táto podmienka zabezpečuje, že kód sa vykoná len vtedy, ak boli údaje formulára odoslané pomocou metódy POST.

2. `(!empty($_POST['action'])) {` - Kontroluje, či hodnota 'action' existuje v poli `$_POST` a nie je prázdna. Hodnota 'action' predstavuje názov formulárového poľa, ktoré sa používa na definovanie akcie, ktorá sa má vykonať.

3. `switch($_POST['action']) {` - Na základe hodnoty 'action' sa vykoná prepínanie medzi rôznymi možnosťami akcie.

4. `case 'apply':` - Ak je hodnota 'action' 'apply', vykoná sa kód vnútri tohto bloku.

   - `if (!empty($_POST['event_id'])) {` - Kontroluje sa, či hodnota 'event_id' existuje v poli `$_POST` a nie je prázdna.

   - `$Admin->updateEvent($_POST['event_id'], $_POST['conference_id'], $_POST['name'], $_POST['description'], $_POST['image'], $_POST['speaker_id'], $_POST['start_time'], $_POST['end_time'], $_POST['day_number'], $_POST['hall_id']) ` - Volá metódu `updateEvent()` objektu `$Admin`, pričom jej odovzdá parametre získané z poľa `$_POST`. Táto metóda pravdepodobne aktualizuje informácie o udalosti v databáze.

   - Header('Location: /admin.php');` - Presmeruje používateľa na stránku '/admin.php'.

   - `die();` - Ukončí skript.

5. `case 'delete':` - Ak je hodnota 'action' 'delete', vykoná sa kód v tomto bloku.

   - `if (!empty($_POST['event_id'])) {` - Kontroluje, či hodnota 'event_id' existuje v poli `$_POST` a nie je prázdna.

   - `$Admin->deleteEvent($_POST['event_id']);` - Zavolá metódu `deleteEvent()` objektu `$Admin' a odovzdá jej hodnotu 'event_id'. Táto metóda pravdepodobne odstráni udalosť z databázy.

   - Header('Location: /admin.php');` - Presmeruje používateľa na stránku '/admin.php'.

   - `die();` - Zastaví spustenie skriptu.

6. `case 'insert':` - Ak je hodnota 'action' 'insert', vykoná sa kód v tomto bloku.

   - `$Admin->insertEvent($_POST['conference_id'], $_POST['name'], $_POST['description'], $_POST['image'], $_POST['speaker_id'], $_POST['start_time'], $_POST['end_time'], $_POST['day_number'], $_POST['hall_id']);
- `header('Location: /admin.php');` - Presmeruje používateľa na stránku '/admin.php'.

   - `die();` - Zastaví vykonávanie skriptu.

Inými slovami, tento úryvok kódu spracúva odoslané údaje formulára POST na základe hodnoty 'action'. V závislosti od hodnoty 'action' sa prostredníctvom príslušných metód objektu `$Admin` vykonávajú rôzne akcie, napríklad aktualizácia, vymazanie alebo vloženie údajov do databázy. Po každej akcii je používateľ presmerovaný na stránku '/admin.php'.
*/

include('template/header.php');
?>
    <main>
        <section class="container">
            <h1>Admin rozhranie</h1>
            <p>Vítaj admin <?php echo($_SESSION['username']); ?></p><br>
        </section>
        <section class="container">
            <h2>Events</h2>
            <table class="table">
                <form action="/admin.php" method="post">
                    <tr>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z"/>
                            </svg></td>
                        <td><input class="form-control" type="text" value="" name="name"></td>
                        <td><textarea class="form-control" name="description" rows="1"></textarea></td>
                        <td><input class="form-control" type="text" value="" name="image"></td>
                        <td>
                            <select class="form-select" name="conference_id">
                                <?php foreach ($conferences as $key => $conf): ?>
                                    <option value="<?= $conf['conference_id'] ?>"<?= ($key == 0 ? " selected" : "") ?>><?= $conf['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="hall_id">
                                <?php foreach ($halls as $key => $hall): ?>
                                    <option value="<?= $hall['hall_id'] ?>"<?= ($key == 0 ? " selected" : "") ?>><?= $hall['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="speaker_id">
                                <option value="" selected></option>
                                <?php foreach ($speakers as $key => $speaker): ?>
                                    <option value="<?= $speaker['speaker_id'] ?>"><?= $speaker['first_name'] . (!empty($speaker['last_name']) ? " " . $speaker['last_name'] : "") ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input class="form-control" type="number" value="" name="day_number"></td>
                        <td><input class="form-control" type="time" value="" name="start_time"></td>
                        <td><input class="form-control" type="time" value="" name="end_time"></td>
                        <td>
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </td>
                        <td>
                            <button class="btn btn-outline-secondary" type="reset">Reset</button>
                        </td>
                    </tr>
                    <input type="hidden" name="action" value="insert">
                </form>
<!--Tento kód zobrazí formulár na pridanie novej udalosti v rozhraní správy. Formulár obsahuje rôzne polia na zadanie údajov o udalosti, ako je názov, opis, obrázok, konferencia, miestnosť, prednášajúci, dátum a čas začiatku a konca.

Keď používateľ vyplní formulár a klikne na tlačidlo "Pridať", údaje z formulára sa odošlú na server metódou POST. Server potom spracuje údaje a vykoná príslušné akcie v závislosti od hodnoty "action". V tomto prípade je hodnota "action" nastavená na "insert" (vložiť), čo znamená, že do databázy je potrebné vložiť novú udalosť.

Po odoslaní údajov z formulára je používateľ presmerovaný na stránku "/admin.php" s action="/admin.php". To umožňuje používateľovi vidieť aktualizovaný zoznam udalostí po pridaní novej udalosti.

V súhrne tento kód poskytuje správcovi možnosť pridávať nové udalosti prostredníctvom administrátorského rozhrania a ukladať ich do databázy.-->
            </table>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Conference</th>
                    <th>Hall</th>
                    <th>Speaker</th>
                    <th>Day</th>
                    <th>Start</th>
                    <th>End</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($events as $evt): ?>
                    <form action="/admin.php" method="post">
                        <tr>
                            <td><?= $evt['event_id'] ?></td>
                            <td><input class="form-control" type="text" value="<?= $evt['name'] ?>" name="name"></td>
                            <td><textarea class="form-control" name="description"
                                          rows="1"><?= $evt['description'] ?></textarea></td>
                            <td><input class="form-control" type="text" value="<?= $evt['image'] ?>" name="image"></td>
                            <td>
                                <select class="form-select" name="conference_id">
                                    <?php foreach ($conferences as $conf): ?>
                                        <option value="<?= $conf['conference_id'] ?>"<?= ($evt["conference_id"] == $conf["conference_id"] ? " selected" : "") ?>><?= $conf['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="hall_id">
                                    <?php foreach ($halls as $hall): ?>
                                        <option value="<?= $hall['hall_id'] ?>"<?= ($evt["hall_id"] == $hall["hall_id"] ? " selected" : "") ?>><?= $hall['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" name="speaker_id">
                                    <option value=""></option>
                                    <?php foreach ($speakers as $speaker): ?>
                                        <option value="<?= $speaker['speaker_id'] ?>"<?= ($evt["speaker_id"] == $speaker["speaker_id"] ? " selected" : "") ?>><?= $speaker['first_name'] . (!empty($speaker['last_name']) ? " " . $speaker['last_name'] : "") ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input class="form-control" type="number" value="<?= $evt['day_number'] ?>"
                                       name="day_number"></td>
                            <td><input class="form-control" type="time" value="<?= $evt['start_time'] ?>"
                                       name="start_time"></td>
                            <td><input class="form-control" type="time" value="<?= $evt['end_time'] ?>" name="end_time">
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary" type="submit">Apply</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary delete-button" type="button">Delete</button>
                            </td>
                            <input type="hidden" name="event_id" value="<?= $evt['event_id'] ?>">
                            <input type="hidden" name="action" value="apply">
                        </tr>
                    </form>
                <?php endforeach; ?>
<!-- Tento kód vykonáva nasledujúce akcie:

1. Cyklus `foreach` prechádza cez pole `$events`, ktoré  obsahuje informácie o udalostiach.

2. Pre každý prvok v poli `$events` sa vytvára formulár na úpravu udalosti.

3. V rámci formulára sa zobrazujú rôzne polia, ktoré sú vyplnené údajmi o udalosti, ktoré sa extrahujú z príslušných kľúčov v poli `$evt`.

   - Pole "name" (`<input type="text" value="<?= $evt['name'] ?>" name="name">`) obsahuje názov udalosti.
   - Pole "description" (`<textarea name="description" rows="1"><?= $evt['description'] ?></textarea>`) obsahuje popis udalosti.
   - Pole "image" (`<input type="text" value="<?= $evt['image'] ?>" name="image">`) obsahuje odkaz na obrázok udalosti.
   - Pole "conference_id" (`<select name="conference_id">...</select>`) umožňuje vybrať konferenciu, ktorá je spojená s udalosťou.
   - Pole "hall_id" (`<select name="hall_id">...</select>`) umožňuje vybrať si sál spojený s udalosťou.
   - Pole "speaker_id" (`<select name="speaker_id">...</select>`) umožňuje vybrať rečníka spojeného s udalosťou.
   - Pole "day_number" (`<input type="number" value="<?= $evt['day_number'] ?>" name="day_number">`) obsahuje číslo dňa udalosti.
   - Polia "start_time" a "end_time" (`<input type="time" value="<?= $evt['start_time'] ?>" name="start_time">`, `<input type="time" value="<?= $evt['end_time'] ?>" name="end_time">`) obsahujú čas začiatku a konca udalosti.

4. Tlačidlo "Apply" (`<button type="submit">Apply</button>`) umožňuje odoslať formulár na aplikovanie zmien v udalosti.

5. Tlačidlo "Delete" (`<button type="button">Delete</button>`)  slúži na odstránenie udalosti.

6. V rámci každého formulára sú skryté polia:
   - `<input type="hidden" name="event_id" value="<?= $evt['event_id'] ?>">` obsahuje identifikátor udalosti, ktorý sa používa na určenie konkrétnej udalosti pri aktualizácii.
   - `<input type="hidden" name="action" value="apply">` obsahuje hodnotu "apply", ktorá označuje akciu, ktorá sa má vykonať pri odoslaní formulára.

Výsledkom je, že tento kód zobrazuje zoznam udalostí s možnosťou ich úpravy a odstránenia prostredníctvom formulárov v rozhraní správy.-->
            </table>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-button').forEach((item) => {
                item.addEventListener('click', (evt) => {
                    const tr = evt.target.closest("tr");
                    const inp = tr.querySelector('[name="action"]');
                    inp.value = "delete";
                    evt.target.form.submit()
                });
            });
        });
    </script>
<?php
include('template/footer.php');
/* 
1. Udalosť DOMContentLoaded udáva, že skript by mal byť vykonaný, keď je načítaná celá HTML stránka a všetky jej zdroje (ako obrázky) boli úplne načítané a spracované.

2. Funkcia spätného volania, odovzdaná do addEventListener, sa vykoná, keď nastane udalosť DOMContentLoaded.

3. document.querySelectorAll('.delete-button') vyberie všetky elementy s triedou "delete-button". Táto trieda je  použitá pre tlačidlá "Zmazať" v každom formulári udalosti.

4. forEach prejde všetky vybrané prvky a aplikuje funkciu spätného volania na každý z nich.

5. Pre každé tlačidlo "Zmazať" sa pridá poslucháč udalosti click.

6. Pri kliknutí na tlačidlo "Zmazať" sa vykoná funkcia spätného volania. Vnútri tejto funkcie:

    - evt.target.closest("tr") nájde najbližší rodičovský prvok <tr> (riadok tabuľky), ktorý obsahuje tlačidlo "Zmazať".
    - tr.querySelector('[name="action"]') nájde element <input> s atribútom name="action" vo vnútri vybraného riadku tabuľky.
    - inp.value = "delete" nastaví hodnotu tohto prvku na "delete", čo označuje akciu mazania pri odoslaní formulára.
    - evt.target.form.submit() odosiela formulár, v ktorom sa nachádza tlačidlo "Zmazať".
Tento kód spracuje kliknutie na tlačidlo "Delete" a pred odoslaním formulára zmení hodnotu skrytého pole `action` na "delete". 
Po odoslaní formulára sa teda správcovi oznámi, aby vybranú udalosť vymazal. 
Po vykonaní kódu JavaScript je zahrnutý kód PHP, ktorý aktivuje šablónu päty stránky `footer.php`.
*/