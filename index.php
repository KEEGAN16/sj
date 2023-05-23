<!-- Tento kód sa používa na vytvorenie webovej stránky s informáciami o konferencii vrátane názvu, menu, videí, rečníkov, plánu a plánov vstupeniek
Kód spôsobí, že webová stránka zobrazí obsah spojený s aktuálnou konferenciou (ak existuje) alebo chybovú správu, ak sa aktuálna konferencia nenašla.-->

<?php
include('inc/config.php');
$page_title = "Leadership";
$top_menu_items = $header_menu->get_menu();
$bottom_menu_items = $footer_menu->get_menu();
$year = date("Y");
$conference = $data->getConferenceByYear($year);
if (is_array($conference) && count($conference) > 0) {
    $conference_id = $conference[0]['conference_id'];
    $videos = $data->getVideosByPreviewsConferences();
    $speakers = $data->getSpeakersByConference($conference_id);
    $schedule = $data->getScheduleByConference($conference_id);
    $ticket_plans = $data->getTicketPlans();
    $timestamp_from = strtotime($conference[0]['start_date']);
    $timestamp_to = strtotime($conference[0]['end_date']);
    $period = ucfirst(date('F', $timestamp_from)) . " " . date('d', $timestamp_from) . " to " . date('d', $timestamp_to) . ", " . date('Y', $timestamp_from);
    $timestamp_from = strtotime($conference[0]['start_date']);
    $timestamp_to = strtotime($conference[0]['end_date']);
    $diff_in_seconds = $timestamp_to - $timestamp_from;
    $diff_in_days = floor($diff_in_seconds / (60 * 60 * 24)) + 1;
    include('template/header.php');
    include('template/main.php');
    include('template/footer.php');
} else {
    $error_message = "Current conference not found!";
    include('template/header.php');
    include('template/error.php');
    include('template/footer.php');
}
?>

<!--1. Prvý riadok spája súbor "config.php" z adresára "inc", ktorý pravdepodobne obsahuje nastavenia a konfiguračné parametre aplikácie.

2. Vytvorí sa premenná $page_title, ktorá nastaví názov stránky na "Leadership".

3. Potom sa pomocou metód get_menu() z objektov $header_menu a $footer_menu načítajú položky horného menu ($top_menu_items) a dolného menu ($bottom_menu_items). Predpokladá sa, že tieto metódy získavajú informácie o položkách menu z príslušných objektov.

4. Aktuálny rok sa získava pomocou date("Y") a ukladá sa do premennej $year.

5. Metóda $data->getConferenceByYear($year) sa volá pravdepodobne na získanie informácií o konferenciách spojených s aktuálnym rokom. Výsledok sa uloží do premennej $conference.

6. Kontroluje sa, či je $conference pole a či obsahuje aspoň jeden prvok. Ak je podmienka splnená, vykoná sa blok kódu, ktorý súvisí s aktuálnou konferenciou.

    Identifikátor konferencie sa získa z prvého prvku poľa $conference a uloží sa do premennej $conference_id.
    Videá ($videos), rečníci ($speakers), rozvrh ($schedule) a plány vstupeniek ($ticket_plans) sa získavajú pomocou metód $data->getVideosByPreviewsConferences(), $data->getSpeakersByConference($conference_id), $data->getScheduleByConference($conference_id) a $data->getTicketPlans().
    Vypočíta obdobie konferencie pomocou dátumov začiatku a konca uložených v premenných $timestamp_from a $timestamp_to.
    Vypočíta rozdiel v dňoch medzi dátumom začiatku a konca konferencie.
    Sú pripojené súbory "header.php", "main.php" a "footer.php" z adresára "template".
7. Ak nie je splnená podmienka v kroku 6 (aktuálna konferencia sa nenašla), vykoná sa blok kódu, ktorý odkazuje na chybu.

    Vytvorí sa premenná $error_message, ktorá obsahuje správu "Aktuálna konferencia nebola nájdená!
    Sú pripojené súbory "header.php", "error.php" a "footer.php" z adresára "template".
8. V oboch prípadoch sa po pripojení príslušných súborov hlavičky a päty (header.php a footer.php) zobrazí na webovej stránke príslušný obsah.

    Ak sa nájde aktuálna konferencia, pripojí sa súbor main.php, ktorý pravdepodobne obsahuje hlavný obsah stránky s informáciami o konferencii, videami, prednášajúcimi a programom.
    Ak sa aktuálna konferencia nenachádza, je zahrnutý súbor error.php, ktorý pravdepodobne obsahuje chybovú správu.
Celkový skript vykonávania kódu je nasledovný:
    1. Pripojte konfiguračný súbor a nastavte hlavičku stránky.
    2. Získanie položiek horného a dolného menu.
    3. Získanie aktuálnej konferencie podľa rokov.
    4. Ak sa nájde aktuálna konferencia:
        Získanie videa, rečníkov, rozvrhu a plánov vstupeniek pre aktuálnu konferenciu.
        Výpočet obdobia konferencie a rozdielu dní.
        Výstup záhlavia, hlavného obsahu a päty informačnej stránky konferencie.
    5. Ak sa aktuálna konferencia nenájde:
        Zobrazenie hlavičky, chybového hlásenia a päty stránky.
Kód spôsobí, že webová stránka zobrazí obsah spojený s aktuálnou konferenciou (ak existuje) alebo chybovú správu, ak sa aktuálna konferencia nenašla.-->