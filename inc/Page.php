<?php

class Page
{
    public $url;

    function get_url()
    {
        $this->url = $_SERVER['SCRIPT_NAME'];
        return $this->url;
    }

    function get_file_name()
    {
        return basename($_SERVER['SCRIPT_NAME'], ".php");
    }
}

$Page = new Page();

?>

<!-- Tento kód definuje triedu `Page`, ktorá obsahuje dve metódy a jednu verejnú vlastnosť:

- Vlastnosť `$url` - uchováva URL aktuálnej stránky.
- Metóda `get_url()` - získava URL aktuálnej stránky a ukladá ho do vlastnosti `$url`. Potom vráti hodnotu tohto URL.
- Metóda `get_file_name()` - získava názov súboru aktuálnej stránky (bez prípony `.php`) a vráti ho.

Po definovaní triedy sa vytvára inštancia triedy `Page` pomocou `$Page = new Page()`. To umožňuje používať metódy a vlastnosti triedy `Page` na získanie informácií o aktuálnej stránke.

Tento kód teda poskytuje pohodlné metódy na získanie URL aktuálnej stránky a názvu súboru aktuálnej stránky v jazyku PHP.-->