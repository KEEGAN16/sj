<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$page_title?></title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/assets/css/templatemo-leadership-event.css" rel="stylesheet">
    <?php if($Page->get_file_name() == "login"):?>
        <link href="/assets/css/login.css" rel="stylesheet">
    <?php elseif($Page->get_file_name() == "admin"):?>
        <link href="/assets/css/admin.css" rel="stylesheet">
    <?php endif; ?>

    <!--

    TemplateMo 575 Leadership Event

    https://templatemo.com/tm-575-leadership-event

    -->
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="/" class="navbar-brand mx-auto mx-lg-0">
            <i class="bi-bullseye brand-logo"></i>
            <span class="brand-text">Leadership <br> Event</span>
        </a>

        <a class="nav-link custom-btn btn d-lg-none" href="#section_5">Buy Tickets</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php foreach($top_menu_items as $title=>$url): ?>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="<?=$url?>"><?=$title?></a>
                    </li>
                <?php endforeach; ?>
                <?php if(!in_array($Page->get_file_name(),array("login","admin"))):?>
                <li class="nav-item">
                    <a class="nav-link custom-btn btn d-none d-lg-block" href="#section_5">Buy Tickets</a>
                </li>
                <?php endif; ?>
            </ul>
            <div>

            </div>
</nav>

<!-- "Tento kód predstavuje predvolenú štruktúru HTML šablóny stránky. Obsahuje metadáta, odkazy na CSS a JavaScript súbory a základnú štruktúru stránky.

Stručný popis funkcionality kódu:

1. Definícia metadát stránky, ako je kódovanie, viewport a popis.
2. Nastavenie titulku stránky pomocou premennej `$page_title`.
3. Odkazy na CSS súbory, vrátane fontových súborov a Bootstrap štýlov.
4. Podmienené pripojenie ďalších CSS súborov na základe názvu aktuálnej stránky (`$Page->get_file_name()`). Ak je názov stránky "login", pripojí sa súbor "login.css". Ak je názov stránky "admin", pripojí sa súbor "admin.css".
5. Začiatok hlavného obsahu stránky s použitím prvkov `<nav>`, `<div>` a ďalších HTML tagov.
6. Definícia navigačného menu pomocou prvkov `<ul>` a `<li>`. Odkazy v menu sú vytvorené na základe poľa `$top_menu_items`, kde kľúčom je názov odkazu a hodnotou je URL.
7. Podmienené pridanie tlačidla "Kúpiť vstupenky" na základe názvu aktuálnej stránky. Tlačidlo sa zobrazí iba ak aktuálna stránka nie je "login" alebo "admin".
8. Ukončenie hlavného obsahu stránky.

Hlavným cieľom tohto kódu je vytvoriť šablónovú štruktúru stránky s navigačným menu a rôznymi prvkami v závislosti od podmienok a nastavení."-->